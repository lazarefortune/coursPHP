<?php
session_start();
require '../classes/User.php';
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
    } else {
      $_SESSION['erreur'] = "Cet identifiant est déjà utilisé !! ";
      var_dump($_SESSION['erreur']);
      header('Location: ../register.php');
    }


  }else {
    $_SESSION['erreur'] = "Veuillez remplir tous les champs !! ";
    var_dump($_SESSION['erreur']);
    header('Location: ../register.php');
  }

}













?>
