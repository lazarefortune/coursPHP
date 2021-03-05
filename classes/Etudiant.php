<?php

require_once 'Personne.php';

/**
 * Class Etudiant
 */
class Etudiant extends Personne {

  private $notes;

  /**
   * Etudiant constructor.
   * @param string $nom
   * @param string $prenom
   * @param int $age
   * @param string $sexe
   * @param array $notes
   */
  public function __construct(string $nom, string $prenom, int $age, string $sexe, array $notes = []) {
    $this->notes = $notes;
    parent::__construct($nom, $prenom, $age, $sexe);
  }

  /**
   * @param float $note
   */
  public function addNote(float $note): void {
    $this->notes[] = $note;
  }

  /**
   * @return float
   */
  public function getMoyenne(): float {
    $nombreDeNotes = count($this->notes);
    if ($nombreDeNotes === 0) {
      return -1.0;
    }

    return round(
      array_sum($this->notes) / $nombreDeNotes,
      2
    );
  }

  /**
   * @return string
   */
  public function __toString(): string {
    $moyenne = $this->getMoyenne();

    // Pas encore de notes.
    if ($moyenne === -1.0) {
      return parent::__toString() . ' / Pas encore de notes';
    }

    // Sinon, on affiche la moyenne.
    return parent::__toString()  . " / Moyenne : $moyenne";
  }

}
