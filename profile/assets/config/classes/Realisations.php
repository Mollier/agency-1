<?php
class Realisations {

    public function __construct()
    {
        $this->message = new Alert();
    }
    function getAll(PDO $con)
    {
        $req = $con->query('SELECT * FROM realisations');
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }


    public function add(PDO $con) {
        $title = $_POST['title'];
        $abstract = $_POST['abstract'];
        $link = $_POST['link'];
        $color = $_POST['color'];
        $category = $_POST['category'];

        if(empty($title) OR empty($abstract) OR empty($link) OR empty($color OR empty($category))) {
            echo 'Veuillez remplir tout les champs.';
        } else {

           if($color == '#040028' OR $color == '#F9D7C8' OR $color == '#A3FFD3') {

               if($category == "Artistes" OR $category == "Institutions" OR $category == "Education" OR $category == "IT"
               OR $category == "IT" OR $category == "Associations" OR $category == "Cabinets") {
                   $req = $con->prepare('INSERT INTO realisations (title, abstract, link, category, color) 
            VALUES ( :title, :abstract, :link, :category, :color)');
                   $req->bindParam(':title', $title);
                   $req->bindParam(':abstract', $abstract);
                   $req->bindParam(':link', $link);
                   $req->bindParam(':category', $category);
                   $req->bindParam(':color', $color);
                   $req->execute();

                   $this->message->createAlert("Envoyé !", 'red');
               } else {
                   die('Error2');
                   header("Location: index.php");
               }
           } else {
               die('Error2');
               header("Location: index.php");
           }
        }
    }

    public function filter(PDO $con, $filtre) {
        if($filtre == "Artistes" OR $filtre == "Institutions" OR $filtre == "Education" OR $filtre == "IT"
            OR $filtre == "IT" OR $filtre == "Associations" OR $filtre == "Cabinets") {
            $req = $con->query("SELECT * FROM realisations WHERE category ='$filtre'");
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } else {
            die("Error2");
            header("Location: index.php");
        }
    }
}