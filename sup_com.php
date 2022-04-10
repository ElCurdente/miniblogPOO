<?php
require "bootstrap.php";
$repCommentaire = $entityManager->getRepository('commentaire');
$commentaires = $repCommentaire->findBy(array('id' => $_GET['id']));
$entityManager->remove($commentaires[0]);
$entityManager->flush();
header("Location: billet.php?id=".$_GET['message'].""); 
?>