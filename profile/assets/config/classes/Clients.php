<?php

class Clients {


    function getAll(PDO $con)
    {
        $req = $con->query('SELECT * FROM clients ');
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getOne(PDO $con, $id)
    {
        $req = $con->query('SELECT * FROM clients WHERE id_client ='.$id);
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function add(PDO $con) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        if(empty($name) OR empty($phone) OR empty($email)) {
            echo 'error';
        } else {

          if(!is_numeric($phone)) {
              echo 'Le numéro de téléphone ne doit pas contenir de lettres';
          } else {
              $req = $con->prepare('INSERT INTO clients (name, phone, email) 
            VALUES ( :name, :phone, :email)');
              $req->bindParam(':name', $name);
              $req->bindParam(':phone', $phone);
              $req->bindParam(':email', $email);
              $req->execute();
              echo 'Client ajouté.';
          }
        }
    }

    function update(PDO $con, $id)
    {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $charte_file = $_FILES['charte_file']['name'];


        if($_FILES['charte_file']['error'] == 4) {

            if(!empty($name) AND !empty($phone) AND !empty($email)) {
                $req = $con->prepare('
                UPDATE clients
                SET name = :name, phone = :phone, email = :email WHERE id_client =' . $id);
                $req->bindParam(':name', $name);
                $req->bindParam(':phone', $phone);
                $req->bindParam(':email', $email);
                $req->execute();
                echo"Client modifié";
            } else {
                echo 'Veuillez remplir tout les champs';
            }

        } elseif(!empty($_FILES['charte_file'])) { // si le fichier charte_file n'est pas vide
            echo '2';

            if(!empty($name) AND !empty($phone) AND !empty($email)) {

                // ajout du fichier
                $this->uploadCharte();
                $req = $con->prepare('
                UPDATE chartes
                SET link = :charte_file WHERE id_client =' . $id);
                $req->bindParam(':charte_file', $charte_file);
                $req->execute();

                // ajout des infos
                $reqTwo = $con->prepare('
                UPDATE clients
                SET name = :name, phone = :phone, email = :email WHERE id_client =' . $id);
                $reqTwo->bindParam(':name', $name);
                $reqTwo->bindParam(':phone', $phone);
                $reqTwo->bindParam(':email', $email);
                $reqTwo->execute();
                echo"Client modifié";
            } else {
                echo 'Veuillez remplir tout les champs';
            }
        }

    }


    // charte graphique

    public function getCharte(PDO $con, $id)
    {
        $req = $con->query('SELECT * FROM chartes WHERE id_client ='.$id);
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function uploadCharte() {

           if($_SERVER["REQUEST_METHOD"] == "POST"){
               // Vérifie si le fichier a été uploadé sans erreur.
               if(isset($_FILES["charte_file"]) && $_FILES["charte_file"]["error"] == 0){
                   $allowed = array("pdf" => "application/pdf");
                   $filename = $_FILES["charte_file"]["name"];
                   $filetype = $_FILES["charte_file"]["type"];
                   $filesize = $_FILES["charte_file"]["size"];

                   // Vérifie l'extension du fichier
                   $ext = pathinfo($filename, PATHINFO_EXTENSION);
                   if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

                   // Vérifie la taille du fichier - 5Mo maximum
                   $maxsize = 5 * 1024 * 1024;
                   if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

                   // Vérifie le type MIME du fichier
                   if(in_array($filetype, $allowed)){
                       // Vérifie si le fichier existe avant de le télécharger.
                       if(file_exists("../assets/upload/chartes/" . $_FILES["charte_file"]["name"])){
                           echo($_FILES["charte_file"]["name"] . " existe déjà.");
                           die();
                       } else{
                           move_uploaded_file($_FILES["charte_file"]["tmp_name"], "../assets/upload/chartes/" . $_FILES["charte_file"]["name"]);
                           // echo('Votre fichier a été téléchargé avec succès.');
                       }
                   } else{
                       echo("Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.");

                   }
               } else{
                   echo "Error: " . $_FILES["charte_file"]["error"];
               }
           }
    }

    //tutoriel

    public function uploadTutoriel() {

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // Vérifie si le fichier a été uploadé sans erreur.
            if(isset($_FILES["charte_file"]) && $_FILES["charte_file"]["error"] == 0){
                $allowed = array("pdf" => "application/pdf");
                $filename = $_FILES["charte_file"]["name"];
                $filetype = $_FILES["charte_file"]["type"];
                $filesize = $_FILES["charte_file"]["size"];

                // Vérifie l'extension du fichier
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

                // Vérifie la taille du fichier - 5Mo maximum
                $maxsize = 5 * 1024 * 1024;
                if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

                // Vérifie le type MIME du fichier
                if(in_array($filetype, $allowed)){
                    // Vérifie si le fichier existe avant de le télécharger.
                    if(file_exists("../assets/upload/chartes/" . $_FILES["charte_file"]["name"])){
                        echo($_FILES["charte_file"]["name"] . " existe déjà.");
                        die();
                    } else{
                        move_uploaded_file($_FILES["charte_file"]["tmp_name"], "../assets/upload/chartes/" . $_FILES["charte_file"]["name"]);
                        // echo('Votre fichier a été téléchargé avec succès.');
                    }
                } else{
                    echo("Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.");

                }
            } else{
                echo "Error: " . $_FILES["charte_file"]["error"];
            }
        }
    }

}