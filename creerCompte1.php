<!DOCTYPE html>
<html>
<head>
<meta charset=“uft-8”/>
<meta name= “keywords” content=“test, page,web” />
<link type=“text/css“ rel="stylesheet" />
<title>ROB1 - Créez votre compte</title>
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

$nom = isset($_POST["nom"])? $_POST["nom"] : ""; 
$prenom = isset($_POST["prenom"])? $_POST["prenom"] : ""; 
$email = isset($_POST["email"])? $_POST["email"] : ""; 
$mdp = isset($_POST["mdp"])? $_POST["mdp"] : ""; 
$mdp2 = isset($_POST["mdp2"])? $_POST["mdp2"] : ""; 
$mailExistant=false;
$erreursaisie=false;

$reponse = $bdd->query('SELECT * FROM user');
while ($data = $reponse->fetch())
{
    if($email==$data['email'])  {$mailExistant=true;}
}
$reponse->closeCursor();



?>

<div id="img">
<img src="logo.jpg" width="140">
</div>
<div><h2>
R0B1
</h2></div>

<div><h1>
Créez votre compte
</h1></div>
<div id="form">
<form action="creerCompte1.php" method="post">
<table id="login">
	<tr>
		<td><input class="txt" type="text" name="nom" placeholder="Nom de famille" required/></td>
	</tr>
	<tr>
		<td><input class="txt" type="text" name="prenom" placeholder="Prenom" required/></td>
	</tr>
	<tr>
		<td><input class="txt" type="Email" name="email" placeholder="Adresse Email" required/>
			<?php if(!($email==""))
			{
			if(!(substr($email, -11,11)=="@edu.ece.fr"))
				{echo "email non valide" ;
				$erreursaisie=true;
				}
			if($mailExistant)
				{
					echo "il existe deja un compte avec cet email"; //erreur mail existant
					$erreursaisie=true;
				}
			}
				?></td>
			
	</tr>
	<tr>
		<td><input class="txt" type="password" name="mdp" placeholder="Mot de passe" required/>
<?php
//tests mdp
if(!($mdp==""))
			{
if(strlen($mdp)<6){	
	echo "Votre mot de passe doit comporter plus de 6 caractères </br>";
	$erreursaisie=true;
}
}
?>

		</td>
	</tr>
	<tr>
		<td><input class="txt" type="password" name="mdp2" placeholder="Confirmer le mdp" required/>
			<?php  
			if(!($mdp2==$mdp))
			{
				echo "mdp différents</br>";
				$erreursaisie=true;
			}
				?></td>
			
	</tr>
	<tr>
		<td><input class="bouton" type="Submit" value="Connexion" name="Connexion"/></td>
	</tr>
</table>
</form>
</div>
<div id="footer">
<p>Vous avez déjà un compte ?<a href="login.html" color="white">Cliquez ici pour vous connecter</a></p>
</div>

<?php
if(!($erreursaisie))
{
	if(!($email==""))
	{
	$reponse = $bdd->exec("INSERT INTO user VALUES (NULL , '$nom', '$prenom', '$email', '$mdp', '0')");
	header('location:connexion1.php');
}
	

}
else echo "erreur dans la saisie";

?>

</body>
</html>

