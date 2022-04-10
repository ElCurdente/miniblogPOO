<?php 

//Connexion à la base de données
require 'bootstrap.php';
include_once('traitement_billet.php');
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <title>Article </title>
</head>

<body>
 <!-- Page Header -->
 <?php include('inc/header.php'); ?>

  <!-- Container page -->
  <div class="page-container">

    <!-- Contenu billet -->
    <div class="container">

    <?php
      $repMessage = $entityManager->getRepository('Message');
      $message = $repMessage->findOneBy(array('id'=>$_GET["id"]));
    ?>

      <!-- Container contenu billet -->
    <div class="">
        <div class="main-content single">
          <h1 class="post-title"><?= $message->getTitre(); ?></h1>
          <!-- <div class="post-image">
              <img src="images/ // $results['image']; " alt="" class="img-billet" >
          </div> -->
          <div class="post-content">
          <?= $message->getTexte(); ?>
          </div>
          <small> <strong> <?= $message->getUtilisateur()->getPrenom(); ?><?= $message->getUtilisateur()->getNom(); ?></strong> : publié le <?= $message->getDatePost()->format('d/m/Y'); ?></small>
        </div>
        <h1>Les commentaires</h1>
        <div class="comments">
          <button name="btncom" id="btncom" class="btn btn-com">Afficher les commentaires</button>
          <button name="btncom_close" id="btncom_close" class="btn btn-com btn-close">Masquer les commentaires</button>
            
            <?php
            $commentaires = $entityManager->getRepository('Commentaire')->createQueryBuilder('c')
            ->where('c.message = :id')
            ->setParameter('id', $message->getId())
            ->getQuery()
            ->getResult();
            ?>

             <!-- Affiche tous les commentaires stockés dans la bdd reliés à ce billet  -->
        <?php foreach ($commentaires as $commentaire): ?>        
            <div class="comment">
              <h3 class="auteur">Ecrit par <?= $commentaire->getAuteur(); ?></h3>
              <p class="contenu" ><?= $commentaire->getTexte(); ?><br>
              <i class="far fa-calendar"><?= $commentaire->getDatePost()->format('d/m/Y'); ?></i>
              </p>
              <?php 
              if(isset($_SESSION['id']))  { 
                if($_SESSION['id'] == 1 || $commentaire->getId() == $_SESSION['id']){
                  echo"<a href='sup_com.php?id=".$commentaire->getId()."&message=".$message->getId()."'>Supprimer ce commentaire</a>";
                }
              } 
              ?>
              <br>
            </div>
            <?php endforeach; ?>

        </div>
        <br>
        <form action="billet.php?id=<?=$message->getId(); ?>"  method="post">
          <input type="hidden" name="id" value="<?php echo $message->getId(); ?>">

          <div>
            <label>Body:</label>
            <textarea name="commentaire" id="body" cols="130" rows="15"></textarea>
          </div><br>
          <div>
              <button type="submit" name="ajouter-com" class="btn btn-big commenter">Commenter</button>
          </div>
        </form>
        
      </div>
    </div>
  </div> 
      <!-- // Container contenu billet -->

      <!-- MAIN JS -->
      <script src="main.js"></script>

<!-- IONICONS -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>