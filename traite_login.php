<?php

//Connexion à la base de données
require 'bootstrap.php';


 $repUtilisateur=$entityManager->getRepository("utilisateur");
    $user=$repUtilisateur->findOneBy(array('login' => $_GET['login']));
if ($_GET['pwd'] == $user->getPasswd()) {
    session_start();
    $_SESSION['login'] = $user->getLogin();
    $_SESSION['id'] = $user->getId();
    header("Location: index.php");
} else {//Renvoie l'adresse indiquer et permet de rester sur la page du formulaire
    header ('Location:saisie-login.php?err=mdp');
}


?>