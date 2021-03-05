<?php

/**
 * User
 */
class User
{
  // protected const USERS_FILE = dirname(__DIR__).DIRECTORY_SEPARATOR.'files'.DIRECTORY_SEPARATOR.'users.json';
  protected const USERS_FILE = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'files'.DIRECTORY_SEPARATOR.'users.json';
  private $firstname;
  private $lastname;
  private $login;
  private $password;

  /**
   * User constructor.
   * @param string $fistname
   * @param string $lastname
   * @param string $login
   * @param string $password
   */

  function __construct(String $firstname, String $lastname, String $login, String $password)
  {
    $this->setFistName($firstname);
    $this->setLastName($lastname);
    $this->setLogin($login);
    $this->setPassword($password);
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

  public static function allUsersData(){
    // On récupère le fichier
    $fichier = User::USERS_FILE;
    // On le met sous forme de chaine de caractères
    $contents = file_get_contents($fichier, true);
    // On transforme le JSON en array
    $contents = json_decode($contents, true);
    // On vérifie l'existence de l'utilisateur
    return $contents;
  }

  public function save(){
    $contents = User::allUsersData();
    if (array_key_exists ( $this->getLogin() , $contents )) {
      // On met à jour les données
      $contents[$this->getLogin()]["firstname"] = $this->getFirstName();
      $contents[$this->getLogin()]["lastname"] = $this->getLastName();
      $contents[$this->getLogin()]["password"] = password_hash($this->getPassword(), PASSWORD_DEFAULT);

      // On remet au format JSON
      $contents = json_encode($contents);
      // On enregistre les données
      file_put_contents($fichier, $contents);
    } else {
      // Ajout du nouvel utilisateur dans le tableau
      $newUser = [
          "firstname" => $this->getFirstName(),
          "lastname" => $this->getLastName(),
          "password" => password_hash($this->getPassword(), PASSWORD_DEFAULT),
        ];

      $contents[$this->getLogin()] = $newUser;
      // On remet au format JSON
      $contents = json_encode($contents);
      // On enregistre les données
      file_put_contents($fichier, $contents);
    }

  }

  public static function load(String $login, String $password): User{
    $contents = User::allUsersData();
    if (array_key_exists ( $login , $contents )) {
      $recupPassword = $contents[$login]["password"];

      if ( password_verify($password, $recupPassword) ) {
        // Utilisateur confirmé
        $firstname = $contents[$login]["firstname"] ;
        $lastname = $contents[$login]["lastname"] ;
        $user = new User($firstname, $lastname, $login, $password);
        return $user;
      }else {
        // Utilisateur non confirmé(mot de passe incorrect)
        // echo "utilisateur inexistant";
        throw new Exception('Identifiant ou mot de passe incorrect.');
      }
    } else {
        // Utilisateur non confirmé(login incorrect)
        throw new Exception('Identifiant ou mot de passe incorrect.');
    }
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
