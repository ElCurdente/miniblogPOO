<?php

//Connexion à la base de données
require 'bootstrap.php';
session_start();

if($_GET['login'] != null && $_GET['pwd'] != null) {
      $repUtilisateur = $entityManager->getRepository('utilisateur');
      $user = $repUtilisateur->findBy(array('login' => $_GET['login']));
      if(empty($user)){
       $utilisateur= new Utilisateur() ;
       $utilisateur->setLogin($_GET['login']);
       $utilisateur->setNom($_GET['nom']);
       $utilisateur->setPrenom($_GET['prenom']);
       $utilisateur->setPasswd($_GET['pwd']);
       $entityManager->persist($utilisateur);
       $entityManager->flush();
       header("Location: index.php"); 
       } else{
        header("Location: inscription.php?erreur=login"); 
        }
    }else{
    header("Location: inscription.php?erreur=null"); 
    }

?>