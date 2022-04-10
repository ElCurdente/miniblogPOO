<?php
require "../bootstrap.php";
if (isset($_GET['id'])) {

    $rep = $entityManager->getRepository('Message');
    $message = $rep->findOneBy(array('id'=>$_GET["id"]));

    if (!$message) {
        header('Location:index.php?id='.$_GET['id']);
        exit();
    }
}

if (isset($_POST['update-post'])){
$rep = $entityManager->getRepository('Message');
$message = $rep->findOneBy(array('id'=>$_POST["id"]));
$message->setTitre($_POST["titre"]);
$message->setTexte($_POST["contenu"]);
$message->setDatepost(new DateTime());
$user = $entityManager->find("Utilisateur",$_SESSION['id']);
$message->setUtilisateur($user);
$entityManager->persist($message);
$entityManager->flush();
header("Location: index.php");
}

//Supression d'un article
if (isset($_GET['sup_id'])) {
$repMessage = $entityManager->getRepository('Message');
$messages = $repMessage->findBy(array('id' => $_GET['sup_id']));
$entityManager->remove($messages[0]);
$entityManager->flush();
    header('Location: index.php');
    exit();
}
?>