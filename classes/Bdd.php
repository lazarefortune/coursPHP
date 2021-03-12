<?php

/**
 * Connexion à la BDD
 */
class Bdd
{
  private static $db;
  private static $dbName = 'coursPHP', $user = 'root', $pass ='';

  function __construct(String $dbName,String $user,String $pass)
  {
    $this->getDbName($dbName);
    $this->getUser($user);
    $this->getPass($pass);
  }

  function getDbName($dbName){
    self::$dbName = $dbName;
  }

  function getUser(String $user){
    self::$user = $user;
  }

  function getPass(String $pass){
    self::$pass = $pass;
  }


  public static function get(){
     if (empty(self::$db)){
         try
         {
           self::$db = new PDO('mysql:host=localhost;dbname='.self::$dbName.';charset=utf8', self::$user, self::$pass);
         }
         catch (Exception $e)
         {
           die('Erreur : ' . $e->getMessage());
         }
       }
       return self::$db;
     }

  }

















?>
