<?php
session_start();
require_once '../model.php';
if (isset($_SESSION["login"]))
{ 
echo "Bonjour {$_SESSION["login"]}<BR>";
}

$requete="SELECT * FROM utilisateurs";
$stmt=$db->query($requete);
$result=$stmt->fetchall(PDO::FETCH_ASSOC);
?>

<TABLE border=1>
<tr><th>Id</th><th>Nom</th><th>Prenom</th><th>Login</th><th>Mdp</th></tr>

<?php
foreach ($result as $utilisateur){
	echo "<tr><td>{$utilisateur["login"]}</td><td>{$utilisateur["nom"]}</td><td>{$utilisateur["prenom"]}</td><td>{$utilisateur["mdp"]}</td></tr>";
}
?>
</TABLE>