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
	// Affiche la modal empechant de se reconnecter
echo "<div class='div-centre'><h2 class='titre-centre'>
Bonjour {$_SESSION["login"]} vous êtes déjà connecté !</h2><a class='btn' rel='noopener' 
href='deconnexion.php'>Déconnexion</a></div>"; 
} else {
	// Affiche le formulaire
	echo ' <div class="form">
	<h2>CONNEXION</h2> <br><br>

	<FORM action="traite_login.php">
		
		<p>Saisissez votre login :<br><INPUT type=text name="login" class="champ"> <br>';
		
	if (isset($_GET["err"]) && $_GET["err"]=="login") { echo "<p class='attention'>ATTENTION MAUVAIS LOGIN</p>";}
		
	echo	'<BR>

		 <p>et votre mot de passe :<br><input type="password" name="pwd" class="champ">';
		 	 
	if (isset($_GET["err"]) && $_GET["err"]=="mdp") { echo "<p class='attention'>ATTENTION MAUVAIS MOT DE PASSE</p>";}
		
       echo '<br>
		<input type=submit value= "Valider" class="valider btn">
	</FORM> <p> Pas de compte ? <a class="connexion" rel="noopener" href="inscription.php"> Inscrivez-vous !</a></p></div>';
}


?>
<!-- MAIN JS -->
<script src="main.js"></script>

<!-- IONICONS -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
	