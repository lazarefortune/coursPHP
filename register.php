<?php
  session_start();
  if (isset($_SESSION['login']) and !empty($_SESSION['login'])) {
    header("Location: index.php");
  }
  if(isset($_SESSION['erreur']) and !empty($_SESSION['erreur'])){
      $erreur = $_SESSION['erreur'];
  }
  unset($_SESSION['erreur']);
?>




<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cours PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
  </head>
  <body>

  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Inscription</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <?php if(isset($_SESSION['login']) and !empty($_SESSION['login']) ) { ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['login']; ?></a>
            <ul class="dropdown-menu" aria-labelledby="dropdown01">
              <li><a class="dropdown-item" href="#">Editer le profil</a></li>
              <li><a class="dropdown-item" href="actions/deconnexion.php">Déconnexion</a></li>
            </ul>
          </li>
        <?php }else{ ?>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="login.php">Connexion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="register.php">Inscription</a>
          </li>
        <?php } ?>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Saisir un nom ..." aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Rechercher</button>
        </form>
      </div>
    </div>
  </nav>

  <main class="container">

    <div class="mt-4">
      <div class="row d-flex justify-content-center">
        <div class="col-md-9">
          <form class="mt-4 needs-validation" method="post" action="actions/register.php">
            <h1>Formulaire d'inscription</h1>
            <?php if(isset($erreur) and !empty($erreur)){ ?>
              <div class="alert alert-danger" role="alert">
                <?php echo $erreur; ?>
              </div>
            <?php } ?>

            <div class="mb-3">
              <label for="firstname" class="form-label">First name</label>
              <input type="text" class="form-control" id="firstname" name="firstname">
            </div>
            <div class="mb-3">
              <label for="lastname" class="form-label">Last name</label>
              <input type="text" class="form-control" id="lastname" name="lastname">
            </div>
            <div class="mb-3">
              <label for="login" class="form-label">Identifiant</label>
              <input type="text" class="form-control" id="login" aria-describedby="loginHelp" name="login">
              <div id="loginHelp" class="form-text">L'identifiant est unique</div>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary" name="registerForm2">S'inscrire</button>
          </form>
        </div>
      </div>
    </div>

  </main><!-- /.container -->


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>
