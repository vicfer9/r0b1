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
	<form action="connexion.php" method="post">
		<table id="login">
	<tr>
		<td><input class="txt" type="Email" name="email" placeholder="Adresse Email" required/></td>
	</tr>
	<tr>
		<td><input class="txt" type="password" name="mdp" placeholder="Mot de passe" required/></td>
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

</body>
</html>




<?php

$email = isset($_POST["email"])? $_POST["email"] : ""; 
$mdp = isset($_POST["mdp"])? $_POST["mdp"] : ""; 

if(substr($email, -11,11)=="@edu.ece.fr")
	{echo "adresse email  valide  $email" ;}
else {echo "email non valide  $email" ;}

$full_name = array( );

$error="mot de passe ou login incorrect";
//identifier la BDD 
$database = "r0b1"; 
//connecter l'utilisateur dans BDD 
$db_handle = mysqli_connect('localhost','root',''); 
$db_found = mysqli_select_db($db_handle, $database);  
//si BDD existe 
if ($db_found) { 
$sql="SELECT * FROM user";
	$result = mysqli_query($db_handle,$sql); 
while ($data = mysqli_fetch_row($result))
{
 $full_name[$data[3]] = $data[4];
}//fin while
}


foreach ($full_name as $key_name => $key_value) {

	if($email==$key_name && $mdp==$key_value)
	{$error="";}

}




if($error=="")
{
	echo "Connection Okay";
}
else{ echo "Erreur : $error";}

?>