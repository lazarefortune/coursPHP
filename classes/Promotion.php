<?php

require_once 'Etudiant.php';

class Promotion {

  private $libelle;
  private $etudiants;

  /**
   * Promotion constructor.
   * @param string $libelle
   * @param array $etudiants
   */
  public function __construct(string $libelle, array $etudiants = []) {
    $this->libelle = $libelle;
    $this->etudiants = $etudiants;
  }

  /**
   * @return string
   */
  public function getLibelle(): string {
    return $this->libelle;
  }

  /**
   * @return array
   */
  public function getEtudiants(): array {
    return $this->etudiants;
  }

  /**
   * @param \Etudiant $etudiant
   */
  public function addEtudiant(Etudiant $etudiant): void {
    $this->etudiants[] = $etudiant;
  }

  /**
   * @return int
   */
  public function getNombreEtudiants(): int {
    return count($this->etudiants);
  }

  /**
   * @return float
   */
  public function getMoyenne(): float {
    // Si aucun étudiant, on retourne -1.
    if ($this->getNombreEtudiants() === 0) {
      return -1.0;
    }

    $moyenneGlobale = 0;
    $nombreDeMoyennes = 0;

    /** @var \Etudiant $etudiant */
    foreach ($this->etudiants as $etudiant) {
      $moyenneEtudiant = $etudiant->getMoyenne();

      // On n'ajoute pas la moyenne de l'étudiant si il n'a pas de notes.
      if ($moyenneEtudiant !== -1.0) {
        $moyenneGlobale += $moyenneEtudiant;
        $nombreDeMoyennes++;
      }
    }

    return round(
      $moyenneGlobale / $nombreDeMoyennes,
      2
    );
  }

}
