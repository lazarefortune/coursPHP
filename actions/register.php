<?php
session_start();
require '../classes/User.php';
require '../classes/Bdd.php';

$connexion = new Bdd('coursPHP', 'root' , '');
$db = $connexion->get();
// On teste la recption du formulaire
// if (isset($_POST['registerForm2'])) {
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $firstname = htmlspecialchars($_POST['firstname']);
  $lastname = htmlspecialchars($_POST['lastname']);
  $login = htmlspecialchars($_POST['login']);
  $password = $_POST['password'];
  // echo "$firstname - $lastname - $login - $password " ;
  if (!empty($firstname) and !empty($lastname) and !empty($login) and !empty($password) ) {

    $user = new User($firstname , $lastname, $login , $password);
    if (!User::ifExist($login)) {
      // On crée un nouvel utilisateur
      $user->save();
      $_SESSION['firstname'] = $user->getFirstName();
      $_SESSION['lastname'] = $user->getLastName();
      $_SESSION['login'] = $user->getLogin();
      header('Location: ../index.php');
      die;
    } else {
      $_SESSION['erreur'] = "Login is used !! ";
      var_dump($_SESSION['erreur']);
      header('Location: ../register.php');
      die;
    }


  }else {
    $_SESSION['erreur'] = "Fields can not be empty !! ";
    var_dump($_SESSION['erreur']);
    header('Location: ../register.php');
  }

}













?>
