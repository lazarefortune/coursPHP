<?php
require 'Bdd.php';


/**
 * User
 */
class User
{

  private $firstname;
  private $lastname;
  private $login;
  private $password;
  private $id;


  /**
   * User constructor.
   * @param string $fistname
   * @param string $lastname
   * @param string $login
   * @param string $password
   * @param string $id
   */

  function __construct(String $firstname, String $lastname, String $login, String $password, String $id = null)
  {
    $this->setFistName($firstname);
    $this->setLastName($lastname);
    $this->setLogin($login);
    $this->setPassword($password);
    $this->setId($id);
  }


  public function __toString(): string {
    // Lazare KOMBILA , login : laz2020, password : test
    return "fistname ($this->firstname) -  lastname ($this->lastname) - login ($this->login) - password ($this->password)";
  }

  public function getFirstName(): string {
    return $this->firstname;
  }

  public function setFistName(string $firstname): void {
    $this->firstname = $firstname;
  }

  public function getLastName(): string {
    return $this->lastname;
  }

  public function setLastName(string $lastname): void {
    $this->lastname = $lastname;
  }

  public function getLogin(): string {
    return $this->login;
  }

  public function setLogin(string $login): void {
    $this->login = $login;
  }

  public function getPassword(): string {
    return $this->password;
  }

  public function setPassword(string $password): void {
    $this->password = $password;
  }

  public function getId(): string {
    return $this->id;
  }

  public function setId(string $id = null): void {
    $this->id = $id;
  }


  public function register(){

  }

  public static function load(String $username, String $password): User{

    $db = Bdd::get();
    $req = $db->prepare('SELECT * FROM users WHERE username = ?');
    $req->execute(array($username));
    $data = $req->fetch();
    $nbr = $req->rowCount();
    var_dump($nbr, $data);
    // die;
    if ($nbr == 1) {
      echo "il y a 1 utilisateur";
      if (password_verify($password, $data['password'])) {
        // le mot de passe est le bon
        $id = $data['id'];
        $firstname = $data['firstname'];
        $lastname = $data['lastname'];
        $user = new User($firstname, $lastname, $username, $password, $id);
        var_dump($user);
        // die;
        return $user;
      }else {
        throw new Exception('Identifiant ou mot de passe incorrect.');
      }
    }else {
      echo "il n'y a pas d'utilisateur";
      throw new Exception('Identifiant ou mot de passe incorrect.');
    }

    die();
    // $contents = User::allUsersData();
    // if (array_key_exists ( $login , $contents )) {
    //   $recupPassword = $contents[$login]["password"];
    //
    //   if ( password_verify($password, $recupPassword) ) {
    //     // Utilisateur confirmé
    //     $firstname = $contents[$login]["firstname"] ;
    //     $lastname = $contents[$login]["lastname"] ;
    //     $user = new User($firstname, $lastname, $login, $password);
    //     return $user;
    //   }else {
    //     // Utilisateur non confirmé(mot de passe incorrect)
    //     // echo "utilisateur inexistant";
    //     throw new Exception('Identifiant ou mot de passe incorrect.');
    //   }
    // } else {
    //     // Utilisateur non confirmé(login incorrect)
    //     throw new Exception('Identifiant ou mot de passe incorrect.');
    // }
  }

  public static function ifExist($login): bool{
    $contents = User::allUsersData();
    if (array_key_exists ( $login , $contents )) {
      return true;
    } else {
      return false;
    }
  }

}












?>
