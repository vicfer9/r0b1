<!DOCTYPE html>
<html>
<head>
	<meta charset=“uft-8”/>
	<meta name= “keywords” content=“test, page,web” />
	<link type=“text/css“ rel="stylesheet" />
	<title>ROB1 - Login</title>
	 <link href="login.css" rel="stylesheet" type="text/css"/>

</head>
<body>
	<?php
try

{
    $bdd = new PDO('mysql:host=localhost;dbname=r0b1;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$email = isset($_POST["email"])? $_POST["email"] : ""; 
$mdp = isset($_POST["mdp"])? $_POST["mdp"] : ""; 
$full_name = array( );
$connexion=false;
$reponse = $bdd->query('SELECT * FROM user');

while ($data = $reponse->fetch())
{
    $full_name[$data['email']] = $data['mdp'];
}
$reponse->closeCursor();

foreach ($full_name as $key_name => $key_value) {

	if($email==$key_name && $mdp==$key_value)
	{$connexion=true;}
}

?>

<div id="img">
	<img src="logo.jpg" width="140">
</div>
<div><h2>
	R0B1
</h2></div>

<div><h1>
	Bienvenue sur ROB1
</h1></div>
<div id="form">
	<form action="connexion1.php" method="post">
		<table id="login">
	<tr>
		<td><input class="txt" type="Email" name="email" placeholder="Adresse Email" required/> 
			<?php 
			if(!($email==""))
			{
			if(substr($email, -11,11)=="@edu.ece.fr")
			{echo "adresse email  valide" ;}
			else {echo "email@edu.ece.fr" ;}
		}
			?>
		</td>
	</tr>
	<tr>
		<td><input class="txt" type="password" name="mdp" placeholder="Mot de passe" required/>
			<?php 
			if(!($email==""))
			{
			if($connexion)
			{
				$reponse = $bdd->query("SELECT id_user FROM user WHERE email='$email'");
				while ($donnees = $reponse->fetch())
				{

					header('location: tentatives/accueil.html?id_user=' .$donnees['id_user']);
				}
				exit();
			}
		
			else{echo "Login ou mot de passe incorrect";}
		}
		?>
	</td>
	</tr>
	<tr>
		<td><input class="bouton" type="Submit" value="Connexion" name="Connexion"/></td>

	</tr>
	
</table>
</form>

</div>
<div id="footer">
	<p>Vous n'avez pas de compte ? <a href="creerCompte.html" color="white">Cliquez ici pour vous inscrire</a></p>
	</div>
	<?php

?>
</body>
</html>




