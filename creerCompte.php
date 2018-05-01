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
<form action="creerCompte.php" method="post">
<table id="login">
	<tr>
		<td><input class="txt" type="text" name="nom" placeholder="Nom de famille" required/></td>
	</tr>
	<tr>
		<td><input class="txt" type="text" name="prenom" placeholder="Prenom" required/></td>
	</tr>
	<tr>
		<td><input class="txt" type="Email" name="email" placeholder="Adresse Email" required/></td>
	</tr>
	<tr>
		<td><input class="txt" type="password" name="mdp" placeholder="Mot de passe" required/></td>
	</tr>
	<tr>
		<td><input class="txt" type="password" name="mdp2" placeholder="Confirmer le mdp" required/></td>
	</tr>
	<tr>
		<td><input class="bouton" type="Submit" value="Connexion" name="Connexion"/></td>
	</tr>
	<tr>
		<td></td>
	</tr>
</table>
</form>
</div>
<div id="footer">
<p>Vous avez déjà un compte ?<a href="login.html" color="white">Cliquez ici pour vous connecter</a></p>
</div>

</body>
</html>

<?php

$nom= $_POST["nom"];
$prenom= $_POST["prenom"];
$email= $_POST["email"];
$mdp= $_POST["mdp"];
$mdp2= $_POST["mdp2"];
$erreursaisie=false;
$mailExistant=false;



//récupérer les couples mdp id dans la BDD
$error="mot de passe ou login incorrect";

//Test si adresse mail de l'ece abcd@edu.ece.fr
if(substr($email, -11,11)=="@edu.ece.fr")
{echo "adresse email  valide  $email";}
else {echo "email non valide  $email" ;
$erreursaisie=true;
}

//tests mdp
if(strlen($mdp)>=6){
if($mdp==$mdp2){
	echo "mot de passe valide</br>";
}
else{
	echo "mdp différents</br>";
$erreursaisie=true;
	}
}
else{
	echo "Votre mot de passe doit comporter plus de 6 caractères </br>";
	$erreursaisie=true;
}

//identifier la BDD 
$database = "r0b1"; 
//connecter l'utilisateur dans BDD 
$db_handle = mysqli_connect('localhost','root',''); 
$db_found = mysqli_select_db($db_handle, $database);  
//si BDD existe 
if ($db_found) { 
//Vérifier si l'email existe déja 
$sql="SELECT * FROM user";
$result = mysqli_query($db_handle,$sql); 
while ($data = mysqli_fetch_row($result)){
if($email==$data[3])  {$mailExistant=true;}
}//fin while

if($mailExistant)
{
echo "il existe deja un compte avec cet email"; //erreur mail existant
$erreursaisie=true;
}
if($erreursaisie){
	echo "erreur dans la saise des données";
}
else{
//$sql = "INSERT INTO user (id_user, nom, prenom, email, mdp, admin) VALUES (NULL, '$nom', '$prenom', '$email', '$mdp', '0')"; 
$sql="INSERT INTO user VALUES (NULL , '$nom', '$prenom', '$email', '$mdp', '0')";
$result = mysqli_query($db_handle, $sql);
echo "add succesful </br> ";
echo "  $nom -- $prenom -- $email -- $mdp";
}

}//fin if dbfound
//fermer la connexion 
mysqli_close($db_handle);

?>