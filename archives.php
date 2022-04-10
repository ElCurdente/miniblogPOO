<?php

//Connexion à la base de données
include 'bootstrap.php';
session_start();
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
  <div class="page-container archive-container">

    <!-- Articles -->
    <div class="posts">
      <h1 class="posts-title">Articles</h1>
      <div class="post-container">

            <?php 
            $messages = $entityManager->getRepository('message')->findAll();
            foreach ($messages as $message) { ?>
                <div class="post">
                <div class="post-info">
                    <h4><a href="billet.php?id=<?= $message->getId() ?>" rel="noopener"><?php echo $message->getTitre(); ?></a></h4>
                    <i class="i"> <?php echo $message->getUtilisateur()->getPrenom() ?><?php echo $message->getUtilisateur()->getNom() ?></i>
                    &nbsp;
                    <i > Posté le <?php echo $message->getDatepost()->format('d/m/Y'); ?></i>
                  </div>
                </div>
            <?php }
            ?>
      </div>
    </div>
    
    
      <!-- MAIN JS -->
      <script src="main.js"></script>

<!-- IONICONS -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <body>
  </html>