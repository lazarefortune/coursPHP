<?php

class Personne {

  protected $nom;
  protected $prenom;
  protected $age;
  protected $sexe;

  /**
   * Personne constructor.
   * @param string $nom
   * @param string $prenom
   * @param int $age
   * @param string $sexe
   */
  public function __construct(string $nom, string $prenom, int $age, string $sexe) {
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->age = $age;
    $this->sexe = $sexe;
  }

  /**
   * @return string
   */
  public function getNom(): string {
    return $this->nom;
  }

  /**
   * @param string $nom
   */
  public function setNom(string $nom): void {
    $this->nom = $nom;
  }

  /**
   * @return string
   */
  public function getPrenom(): string {
    return $this->prenom;
  }

  /**
   * @param string $prenom
   */
  public function setPrenom(string $prenom): void {
    $this->prenom = $prenom;
  }

  /**
   * @return int
   */
  public function getAge(): int {
    return $this->age;
  }

  /**
   * @param int $age
   */
  public function setAge(int $age): void {
    $this->age = $age;
  }

  /**
   * @return string
   */
  public function getSexe(): string {
    return $this->sexe;
  }

  /**
   * @param string $sexe
   */
  public function setSexe(string $sexe): void {
    $this->sexe = $sexe;
  }

  /**
   * @return string
   */
  public function __toString(): string {
    // Lazare KOMBILA (H) - 30 ans
    return "$this->prenom $this->nom ($this->sexe) - $this->age ans";
  }

}
