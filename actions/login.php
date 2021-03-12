<?php
session_start();
require '../classes/User.php';
// On teste la reception du formulaire
// if (isset($_POST['registerForm2'])) {
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // On stock les données
  $login = htmlspecialchars($_POST['login']);
  $password = $_POST['password'];
  // On test qu'elles ne sont pas vides

  // foreach ($_POST as $field => $value) {
  //   // $field = clef
  //   // $value = value
  //   // if(empty($value)){
  //   //   // gestion de mon erreur
  //   //   echo "erruer <br>";
  //   // }
  //
  //   $emptyFields = array_filter($_POST, fn ($value) => empty($value));
  //   $hasError = sizeof($emptyFields) !== 0;
  //   if ($hasError) {
  //     echo "beaucoup erreurs";
  //   }
  // }
  //
  // array_filter($_POST, function($value){
  //   return empty($value);
  // });
  //
  // die;

  
  /*
  Cette fonction ...
  function maFonction($param){
    return $param + 1;
  }
  est équivalente à ...
  fn maFonction($param) => $param + 1
  */

  if (!empty($login) and !empty($password) ) {
    // On tente une connexion
    try {
      $user = User::load($login,$password);
      // Si la connexion réussie on enregistre les informations et on redirige
      $_SESSION['firstname'] = $user->getFirstName();
      $_SESSION['lastname'] = $user->getLastName();
      $_SESSION['login'] = $user->getLogin();

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
