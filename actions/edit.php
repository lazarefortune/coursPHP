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

  /***

    S'inspirer de la page actions/register.php
    pour editer les informations de l'utilisateur

  ***/

}













?>
