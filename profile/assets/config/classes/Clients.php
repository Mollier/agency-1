<?php


class Clients {


    public function getAll(PDO $con)
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
          }
        }
    }

}