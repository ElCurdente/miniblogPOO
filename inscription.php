<?php 
session_start();
?>

<html>
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
	<!-- Page Header -->
	<?php include('inc/header.php'); ?>

<?php	
// Si l'utilisateur est logué
if (isset($_SESSION["login"])){ 
	// Affiche la modal empechant de se reinscrire
echo "<div class='div-centre'><h2 class='titre-centre'>Bonjour {$_SESSION["login"]} vous êtes déjà inscrit !</h2><a class='btn' rel='noopener' href='deconnexion.php'>Déconnexion</a></div>";
} else {
	// Affiche le formulaire
	echo '<div class="form form-inscription">
	
	<h2>INSCRIPTION</h2><br><br>';

	if(isset($_GET["erreur"]) && $_GET["erreur"] == "null"){
		echo"Aucun champ renseigné.";
	}
	if(isset($_GET["erreur"]) && $_GET["erreur"] == "login"){
		echo"Ce login existe déjà.";
	}
	
	echo '<FORM action="traite_inscription.php">
		
		<p>Saisissez votre login :<br><INPUT type=text name="login" class="champ"> <br><br>

	<p>Saisissez votre nom :<br><INPUT type=text name="nom" class="champ"><br> <br>
	<p>Saisissez votre prenom :<br><INPUT type=text name="prenom" class="champ"> <br>

		<BR>

		 <p>et votre mot de passe :<br><input type="password" name="pwd" class="champ"><br><br>
		 	
		<input type=submit value= "Valider" class="valider btn">
	</FORM><a class="inscription" rel="noopener" href="saisie-login.php">Déjà un compte ? Connectez-vous !</a></div>';

	
	
}
?>
	<!-- MAIN JS -->
	<script src="main.js"></script>

<!-- IONICONS -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</BODY>