<?php 
try

{
    $bdd = new PDO('mysql:host=localhost;dbname=r0b1;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
  <title>R0B1 - accueil</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="accueil.css" rel="stylesheet" type="text/css"/>
</head>
<body>
  <div id="nav">

    <a href="accueil.php"><img src="Ressources/logo.png" id="logo" border="0" style="width: 60px;"></a>
    <div id="milieu">
    <a href="emplois.php">Emplois</a> 
    <input type="text" id="maRecherche" placeholder="Recherche">
    </div>
    <div id="droite">
    <a href="monreseau.php">Mon réseau</a> 
    <a href="messagerie.php"><img src="Ressources/msg.png" id="msg" border="0" style="width: 60px;"></a>
    <a href="notifications.php"><img src="Ressources/notif.png" id="notif" border="0" style="width: 60px;"></a>
    
    <a href="profil.php" id="rob1"><img src="Ressources/PhotosAmis/rob1.png"  border="0" style="width: 60px;"> Robin</a>
    </div>
  </div>

  <div class="photosAmis">
    <?php 
    $sql = "SELECT photo_video.nom_fichier, user.prenom, user.nom FROM photo_video, publication, user WHERE user.id_user=publication.id_proprio AND publication.id_publication=photo_video.id_publication AND photo_video.photoProfil='1'";
    
    $result = $bdd->query($sql);
    while($data = $result->fetch()){
      
      ?>
      <span class="nomPhoto"><img src="<?php echo $data['nom_fichier']; ?>" class="photoPersonne" border="0" style="width: 100px;"/><?php echo $data['prenom']." ".$data['nom'] ;?></span>
      <?php
      
    }
?>


  </div>
        <div id="footer">Copyright 2018 Prime Properties<br />
          <a href="mailto:prime.properties@gmail.com">prime.properties@gmail.com</a>
        </div>

  </body>
</html>










