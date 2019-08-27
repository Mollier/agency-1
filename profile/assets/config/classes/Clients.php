<?php

class Clients {
        public $pdo;

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
        $customer_name = $_POST['customer_name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_ARGON2I);
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email_admin = $_POST['email_admin'];
        $password_admin = $_POST['password_admin'];

        if(empty($customer_name) OR empty($phone) OR empty($email)) {
            echo 'error';
        } else {

          if(!is_numeric($phone)) {
              echo 'Le numéro de téléphone ne doit pas contenir de lettres';
          } else {
              $req = $con->prepare('INSERT INTO clients (customer_name, phone, email, email_admin, password_admin) 
            VALUES ( :customer_name, :phone, :email, :email_admin, :password_admin)');
              $req->bindParam(':customer_name', $customer_name);
              $req->bindParam(':phone', $phone);
              $req->bindParam(':email', $email);
              $req->bindParam(':email_admin', $email_admin);
              $req->bindParam(':password_admin', $password_admin);
              $req->execute();

              $customer_name = $_POST['customer_name'];

              $req = $con->prepare('INSERT INTO users (first_name, last_name, password, email, customer_name) 
            VALUES ( :first_name, :last_name, :password, :email, :customer_name)');
              $req->bindParam(':first_name', $first_name);
              $req->bindParam(':last_name', $last_name);
              $req->bindParam(':password', $password);
              $req->bindParam(':email', $email);
              $req->bindParam(':customer_name', $customer_name);
              $req->execute();

              $req = $con->prepare('INSERT INTO chartes (customer_name) VALUES (:customer_name)');
              $req->bindParam(':customer_name', $customer_name);
              $req->execute();

              $req = $con->prepare('INSERT INTO tutoriels (customer_name) VALUES (:customer_name)');
              $req->bindParam(':customer_name', $customer_name);
              $req->execute();

              $req = $con->prepare('INSERT INTO devis (customer_name) VALUES (:customer_name)');
              $req->bindParam(':customer_name', $customer_name);
              $req->execute();

            echo 'Client ajouté';
          }
        }
    }


    function update(PDO $con, $id)
    {
        $customer_name = $_POST['customer_name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $email_admin = $_POST['email_admin'];
        $password_admin = $_POST['password_admin'];


        if(empty($customer_name) OR empty($phone) OR empty($email)  ) {
           die('Vide');


        } else {
            $req = $con->prepare('UPDATE clients 
            SET customer_name = :customer_name, phone = :phone, email = :email, email_admin = :email_admin, password_admin = :password_admin
             WHERE id_client =' . $id);
            $req->bindParam(':customer_name', $customer_name);
            $req->bindParam(':phone', $phone);
            $req->bindParam(':email', $email);
            $req->bindParam(':email_admin', $email_admin);
            $req->bindParam(':password_admin', $password_admin);
            $req->execute();
            echo"Client modifié";
        }
    }


    // charte graphique

    public function getCharte(PDO $con, $id)
    {
        $req = $con->query('SELECT * FROM chartes WHERE id_client ='.$id);
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function uploadCharte(PDO $con, $id) {
        $charte_file = $_POST['customer_name'] .'.pdf';


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
                       if(file_exists("../assets/upload/chartes/" . $_POST['customer_name'])){
                           echo($_FILES["charte_file"]["name"] . " existe déjà.");
                           die();
                       } else{
                           move_uploaded_file($_FILES["charte_file"]["tmp_name"], "../assets/upload/chartes/" . $charte_file);

                           $req = $con->prepare('UPDATE chartes SET link = :charte_file WHERE id_client =' . $id);
                           $req->bindParam(':charte_file', $charte_file);
                           $req->execute();
                       }
                   } else{
                       echo("Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.");

                   }
               } //else{
                  // echo "Error: " . $_FILES["charte_file"]["error"];
              // }
           }
    }

    //tutoriel



    public function getTutoriel(PDO $con, $id)
    {
        $req = $con->query('SELECT * FROM tutoriels WHERE id_client ='.$id);
        return $req->fetch(PDO::FETCH_ASSOC);
    }


    public function uploadTutoriel(PDO $con, $id) {
        $tuto_file = $_POST['customer_name'] .'.pdf';


        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // Vérifie si le fichier a été uploadé sans erreur.
            if(isset($_FILES["tutoriel"]) && $_FILES["tutoriel"]["error"] == 0){
                $allowed = array("pdf" => "application/pdf");
                $filename = $_FILES["tutoriel"]["name"];
                $filetype = $_FILES["tutoriel"]["type"];
                $filesize = $_FILES["tutoriel"]["size"];

                // Vérifie l'extension du fichier
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

                // Vérifie la taille du fichier - 5Mo maximum
                $maxsize = 5 * 1024 * 1024;
                if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

                // Vérifie le type MIME du fichier
                if(in_array($filetype, $allowed)){
                    // Vérifie si le fichier existe avant de le télécharger.
                    if(file_exists("../assets/upload/tutoriels/" . $_POST['customer_name'])){
                        echo($_FILES["tutoriel"]["name"] . " existe déjà.");
                        die();
                    } else{
                        move_uploaded_file($_FILES["tutoriel"]["tmp_name"], "../assets/upload/tutoriels/" . $tuto_file);

                        $req = $con->prepare('UPDATE tutoriels SET link = :tutoriel WHERE id_client =' . $id);
                        $req->bindParam(':tutoriel', $tuto_file);
                        $req->execute();
                    }
                } else{
                    echo("Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.");

                }
            } //else{
            // echo "Error: " . $_FILES["charte_file"]["error"];
            // }
        }
    }

    public function uploadFacture(PDO $con) {
        $facture = $_FILES['facture']['name'];
        $customer_name = $_POST['customer_name'];
        $date = date("Y/m/d");

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // Vérifie si le fichier a été uploadé sans erreur.
            if(isset($_FILES["facture"]) && $_FILES["facture"]["error"] == 0){
                $allowed = array("pdf" => "application/pdf");
                $filename = $_FILES["facture"]["name"];
                $filetype = $_FILES["facture"]["type"];
                $filesize = $_FILES["facture"]["size"];

                // Vérifie l'extension du fichier
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

                // Vérifie la taille du fichier - 5Mo maximum
                $maxsize = 5 * 1024 * 1024;
                if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

                // Vérifie le type MIME du fichier
                if(in_array($filetype, $allowed)){
                    // Vérifie si le fichier existe avant de le télécharger.
                    if(file_exists("../assets/upload/factures/" . $facture)){
                        echo($_FILES["facture"]["name"] . " existe déjà.");
                        die();
                    } else{
                        move_uploaded_file($_FILES["facture"]["tmp_name"], "../assets/upload/factures/" . $facture);

                        $req = $con->prepare('INSERT INTO factures (facture, customer_name, date) VALUES (:facture, :customer_name, :date)');
                        $req->bindParam(':facture', $facture);
                        $req->bindParam(':customer_name', $customer_name);
                        $req->bindParam(':date', $date);
                        $req->execute();
                    }
                } else{
                    echo("Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.");

                }
            } //else{
            // echo "Error: " . $_FILES["charte_file"]["error"];
            // }
        }
    }

    public function getFactures(PDO $con, $user) {
        $req = $con->query('SELECT * FROM factures WHERE customer_name = "'.$user.'"');
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getIdentifiants(PDO $con, $user) {
        $req = $con->query('SELECT * FROM clients WHERE customer_name = "'.$user.'"');
        return $req->fetch(PDO::FETCH_ASSOC);
    }

}