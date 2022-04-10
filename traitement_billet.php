<?php
//traitement de billet.php
include "bootstrap.php";
session_start();

if (isset($_POST['ajouter-com'])){
    if (!empty($_POST['commentaire']) && isset($_SESSION["login"])) {
        $commentaire = new Commentaire();
        $commentaire -> setTexte(htmlspecialchars($_POST['commentaire']));
        $commentaire -> setDatepost(new DateTime());
        $user = $entityManager->find('Utilisateur', $_SESSION['id']);
        $commentaire -> setUtilisateur($user);
        $login = $user->getLogin();
        $commentaire ->setAuteur($login);
        $message = $entityManager->find('Message', $_GET['id']);
        $commentaire -> setMessage($message);
        $entityManager->persist($commentaire);
        $entityManager->flush();
        header('Location: billet.php?id='.$message->getId());
    } else{
        echo '<div class="co-obl"><h2>Vous devez vous connecter pour pouvoir commenter !</h2><div><a class="btn" rel="noopener" href="saisie-login.php">Se connecter</a><a class="btn retour" rel="noopener">Retour</a></div></div>';
    }
}
?>