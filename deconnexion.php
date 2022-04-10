<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déconnexion</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Page Header -->
  <?php include('inc/header.php'); ?>
<?php 
session_start();
session_destroy();
?>
<br><br>
<div class="deco-container">
    <a class="btn" href="index.php" rel="noopener">Revenir à l'accueil</a><br><br><br>
    <a class="btn" href="saisie-login.php" rel="noopener">Se connecter</a><br><br><br>
    <a class="btn" href="inscription.php" rel="noopener">S'inscrire</a><br><br><br>
</div>
</body>
</html>