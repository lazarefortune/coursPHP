<?php
session_start();
require '../classes/User.php';





if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // On stock les données
  $login = htmlspecialchars($_POST['login']);
  $password = $_POST['password'];


  if (!empty($login) and !empty($password) ) {
    // On tente une connexion
    try {
      $user = User::load( $login,$password);
      // Si la connexion réussie on enregistre les informations et on redirige
      $_SESSION['firstname'] = $user->getFirstName();
      $_SESSION['lastname'] = $user->getLastName();
      $_SESSION['login'] = $user->getLogin();
      $_SESSION['user'] = $user;
      header('Location: ../index.php');
    } catch (Exception $e) {

        $_SESSION['erreur'] = 'Erreur : '.  $e->getMessage(). "\n";
        header('Location: ../login.php');
    }

  }else {

    $_SESSION['erreur'] = "Fields can not be empty !! ";
    var_dump($_SESSION['erreur']);
    header('Location: ../login.php');
  }

}













?>
