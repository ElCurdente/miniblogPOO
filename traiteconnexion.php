<?php
session_start();
//Connexion à la base de données
require_once 'model.php';

// pour le serveur de l'UPEM, remplacer localhost par sqletud.u-pem.fr
 
if(isset($_POST["login"]) & isset($_POST["mdp"])){
  $requete = "INSERT INTO utilisateurs(login, mpd) VALUES (:login, :mdp)";
  // On prépare la requête avant l'envoi :
  $req = $db -> prepare($requete);
  // On exécute la requête en insérant la valeur transmise en POST
  $req -> execute(array('login' => $_POST["login"], 
                        'mdp' => $_POST["mdp"]));
?>