<?php
//Connexion à la base de données
require 'bootstrap.php';
session_start();
  //Récupération des 3 derniers articles de la bdd
//   $results = selectThree();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <title>Mini-Blog</title>
</head>

<body>
  <!-- Page Header -->
  <?php include('inc/header.php'); ?>
    <!-- Container page -->
  <div class="page-container">

    <?php
    // Si l'utilisateur est logué
    if (isset($_SESSION["login"])){
      echo "<h2>Bonjour {$_SESSION["login"]}</h2>";

      // Si l'utilisateur logué est l'admin
      if ($_SESSION["id"] == 1){
        echo "<a class='btn gerer' href='./admin/index.php' rel='noopener'>Gérer le miniblog</a>";
      }else {}

    }else {}
    ?>

<?php
    
    ?>

    <!-- 3 derniers articles -->
        <div class="posts">
          <h1 class="posts-title">Articles</h1>
          <div class="post-container">
        
            <?php 
            $messages = $entityManager->getRepository('message')->findBy([], ['id' => 'DESC'], 3);
            foreach ($messages as $message) { ?>
                <div class="post">
                <div class="post-info">
                    <h4><a href="billet.php?id=<?= $message->getId() ?>" rel="noopener"><?php echo $message->getTitre(); ?></a></h4>
                    <i class='i'> <?php echo $message->getUtilisateur()->getPrenom() ?><?php echo $message->getUtilisateur()->getNom() ?></i>
                    &nbsp;
                    <i > Posté le <?php echo $message->getDatepost()->format('d/m/Y'); ?></i>
                  </div>
                </div>
            <?php }
            ?>
          </div>
        </div>
        <?php
        // Affiche le bouton de déconnexion si l'utilisateur est logué
    if (isset($_SESSION["login"])){
      echo "<a class='btn btn-deco' href='deconnexion.php' rel='noopener'>Déconnexion</a>";
    }else {
      
      }
    ?>
  </div>
      <!-- MAIN JS -->
      <script src="main.js"></script>

<!-- IONICONS -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <body>
  </html>