<?php
class News {

    public function __construct()
    {
        $this->message = new Alert();
    }
    public function add(PDO $con)
    {
        $title = $_POST['title'];
        $image = $_FILES['image']['name'];
        $content = $_POST['content'];
        $category = $_POST['category'];

        if(empty($title) OR empty($content) OR empty($category)) {
            $this->message->createAlert("Erreur, veuillez recommencer", 'red');
        } else {

            $req = $con->prepare('INSERT INTO news (title, image, content, category) 
            VALUES ( :title, :image, :content, :category)');
            $req->bindParam(':title', $title);
            $req->bindParam(':image', $image);
            $req->bindParam(':content', $content);
            $req->bindParam(':category', $category);
            $req->execute();
            $this->message->createAlert("Article ajouté", 'green');

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
                            $this->message->createAlert("Désolé, le fichier existe déjà", 'red');

                            die('<a href="index.php">[RETOUR]</a>');
                        } else{
                            move_uploaded_file($_FILES["image"]["tmp_name"], "../assets/upload/news/" . $_FILES["image"]["name"]);
                            $this->message->createAlert("Veuillez remplir tout les champs", 'red');


                        }
                    } else{
                        $this->message->createAlert("Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.", 'red');

                    }
                } else{
                    $this->message->createAlert("Error: " . $_FILES["image"]["error"], 'red');
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
        $req = $con->query('SELECT * FROM news order by date DESC LIMIT 0,4');
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function filter(PDO $con, $filtre) {
        if($filtre == "Agence" OR $filtre == "Actualités" OR $filtre == "Projets") {
            $req = $con->query("SELECT * FROM news WHERE category ='$filtre' order by date DESC");
            return $req->fetchAll(PDO::FETCH_ASSOC);
        }
        else {
            die();
            $this->message->createAlert("Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.", 'red');

        }

    }

    public function search(PDO $con, $search)
    {

        $req = $con->query("SELECT * FROM news WHERE title LIKE '$search' order by date DESC");
        return $req->fetchAll(PDO::FETCH_ASSOC);

    }

    public function count(PDO $con, $search) {
        $req = $con->query("SELECT count(*) as nb FROM news WHERE title LIKE '$search'");
        return $req->fetch(PDO::FETCH_ASSOC);
    }


}