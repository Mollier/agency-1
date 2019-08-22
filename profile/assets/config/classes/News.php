<?php
class News {

    public function add(PDO $con)
    {
        $title = $_POST['title'];
        $image = $_FILES['image']['name'];
        $content = $_POST['content'];
        $category = $_POST['category'];

        if(empty($title) OR empty($content) OR empty($category)) {
            echo 'error';
        } else {

            $req = $con->prepare('INSERT INTO news (title, image, content, category) 
            VALUES ( :title, :image, :content, :category)');
            $req->bindParam(':title', $title);
            $req->bindParam(':image', $image);
            $req->bindParam(':content', $content);
            $req->bindParam(':category', $category);
            $req->execute();
            echo $_FILES['image']['name'];

            // if all is good => upload

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                // Vérifie si le fichier a été uploadé sans erreur.
                if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){
                    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                    $filename = $_FILES["image"]["name"];
                    $filetype = $_FILES["image"]["type"];
                    $filesize = $_FILES["image"]["size"];

                    // Vérifie l'extension du fichier
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

                    // Vérifie la taille du fichier - 5Mo maximum
                    $maxsize = 5 * 1024 * 1024;
                    if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

                    // Vérifie le type MIME du fichier
                    if(in_array($filetype, $allowed)){
                        // Vérifie si le fichier existe avant de le télécharger.
                        if(file_exists("../assets/upload/news/" . $_FILES["image"]["name"])){
                            addFlash('danger', $_FILES["image"]["name"] . " existe déjà.");
                            die(viewFlashes() . '<a href="add_picture.php">[RETOUR]</a>');
                        } else{
                            move_uploaded_file($_FILES["image"]["tmp_name"], "../assets/upload/news/" . $_FILES["image"]["name"]);
                            addFlash('success', 'Votre fichier a été téléchargé avec succès.');
                        }
                    } else{
                        addFlash('danger', "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.");

                    }
                } else{
                    echo "Error: " . $_FILES["image"]["error"];
                }
            }
        }
    }

    function getAll(PDO $con)
    {
            $req = $con->query('SELECT * FROM news order by date DESC');
            return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne(PDO $con, $id)
    {
        $req =  $con->query('SELECT * FROM news WHERE id_news=' . $id);
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllLessFive(PDO $con) {
        $req = $con->query('SELECT * FROM news order by date DESC');
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}