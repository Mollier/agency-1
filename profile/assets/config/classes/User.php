<?php

class User
{
  public $message;

  public function __construct()
  {
    // $this->message = new Alert();
  }

  public function connect(PDO $con)
  {
    // Rechercher l'user
    $req = $con->prepare('
			SELECT *
			FROM users
			WHERE
				email = :email
		');
    $req->bindParam(':email', $_POST['email']);
    $req->execute();

    $user = $req->fetch(PDO::FETCH_ASSOC);
    if (!$user) {

      echo ("Aucun utilisateur n'a été trouvé");
    } else if (!password_verify($_POST['password'], $user['password'])) {
      // si le mdp ne correspond pas au hash en BDD
      echo ("Le mot de passe ne correspond pas");
    } else {
      // On enregistre l'utilisateur en session
      unset($user['mdp']); // le hash du mdp n'est pas à stocker en session
      $_SESSION['user'] = $user;
      header('Location: connect.php');


      // Redirection vers la page d'accueil
      session_write_close();
    }
  }

  public function disconnect()
  {
    // Déconnexion

    if (isset($_GET['disconnect'])) {

      unset($_SESSION['user']);
      header('Location: index.php');
    }
  }

  public function checkingRank() {
      if($_SESSION['user']['rights'] == 10) {
          require('./assets/pannels/admin.php');
      } else {
         require('./assets/pannels/client.php');
      }
  }
}
