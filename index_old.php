<?php
  require 'classes/Promotion.php';
  require 'classes/User.php';

  $etu1 = new Etudiant("TOSSOU","lazare", 22, 'H', [15,16]);
  $etu2 = new Etudiant("MANGO","Lionel", 19, 'H', []);
  $etu3 = new Etudiant("LEPING","Sarah", 17, 'F', [9,11]);
  $promotion = new Promotion("AS 2020", [$etu1,$etu2,$etu3]);

  $user1 = new User("Lazare" , "KOMBILA", "laz2021" , "test");
  $user2 = new User("matt" , "POCCORA", "mat2021" , "test");

  echo $user1;
  $user1->save();
  echo "<br>";
  echo $user2;
  $user2->save();
  echo "<br>";
  try {
    User::load("laz2021", "test2");
  } catch (Exception $e) {
      echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }
?>



<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>cours PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style media="screen">
      body{
        background-color: black;
        color: white !important;
      }
    </style>
  </head>
  <body>



    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Promotion <?= $promotion->getLibelle() ?></h1>

          <table class="table">
            <thead>
              <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Age</th>
                <th scope="col">Sexe</th>
                <th scope="col">Moyenne</th>
              </tr>
            </thead>
            <tbody>
              <?php
              /** @var \Etudiant $etudiant */
              foreach ($promotion->getEtudiants() as $etudiant):
              ?>
                <tr>
                  <td><?= $etudiant->getNom() ?></td>
                  <td><?= $etudiant->getPrenom() ?></td>
                  <td><?= $etudiant->getAge() ?></td>
                  <td><?= $etudiant->getSexe() === 'H' ? 'Homme' : 'Femme' ?></td>
                  <td><?= $etudiant->getMoyenne() === -1.0 ? 'Aucune note' : $etudiant->getMoyenne() . '/20' ?></td>
                </tr>
              <?php
              endforeach;
              ?>
            </tbody>
            <tfoot>
              <tr>
                <th colspan="4">
                  <b>Moyenne de la promotion : </b>
                </th>
                <th>
                  <b><?= $promotion->getMoyenne() ?>/20</b>
                </th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>

  </body>
</html>
