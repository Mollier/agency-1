<?php
class Realisations {

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

        if(empty($title) OR empty($abstract) OR empty($link) OR empty($color)) {
            echo 'Veuillez remplir tout les champs.';
        } else {

           if($color == '#040028' OR $color == '#F9D7C8' OR $color == '#A3FFD3') {
               $req = $con->prepare('INSERT INTO realisations (title, abstract, link, color) 
            VALUES ( :title, :abstract, :link, :color)');
               $req->bindParam(':title', $title);
               $req->bindParam(':abstract', $abstract);
               $req->bindParam(':link', $link);
               $req->bindParam(':color', $color);
               $req->execute();
               echo 'Envoyé !';
           } else {
               echo 'Error2';
           }
        }
    }
}