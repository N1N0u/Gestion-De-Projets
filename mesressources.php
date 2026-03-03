<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Mes Ressources</title>
<link   href="css/user.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="top">
</div>
<div class="top1">
  <div class="d2">
    <form   action="php/disconnect.php">
    Welcome: <?php  
	session_start();
	echo $_SESSION['email'];
	?>
      <input type="submit" value="Disconnect" style="border-radius:10px" onClick="window.location: index.php">
    </form>
  </div>
</div>
<div class="main" >
<div class="menu">
<ul>Projet
<li><a href="user.php" >Nouveau</a></li>
<li><a href="mesprojets.php">Mes Projets</a></li>
</ul>
<ul>Taches
<li><a href="Gerer.php">Nouveau</a></li>
<li><a href="mestaches.php">Mes taches</a></li>
</ul>
<ul>Ressources
<li><a href="gererressource.php">Nouveau</a></li>
<li><a href="mesressources.php">Mes Ressources</a></li>
</ul>
<ul>réunion
<li><a href="reunion.php">Nouveau</a></li>
<li><a href="mereuinion.php">Mes Réuinions</a></li>
</ul>
</div>
<div class="work">
Les Ressource Humaines:
<table border="1">
<tr>
<td bgcolor="#669999"><b><u><i>Numero Projet</u></b></i></td>
<td bgcolor="#669999"><b><u><i> Numero Tache </u></b></i></td>
<td bgcolor="#669999"><b><u><i> Type</u></b></i> </td>
<td bgcolor="#669999"><b><u><i> Responsable</u></b></i> </td>
<td bgcolor="#669999"><b><u><i> nombre équipe</u></b></i></td>
<td bgcolor="#669999"><b><u><i> salaire</u></b></i></td>
<td bgcolor="#669999"><b><u><i>Choix</u></b></i></td>
</tr>
<?php
require_once("php/connexion.php");
$req="select * from projet,chef,creation,tache,ressource,humaine where (chef.email='".$_SESSION["email"]."') and (projet.numProjet=creation.numProjet) and(creation.emailChef='".$_SESSION["email"]." ')
and (projet.numProjet=tache.numProjet) and (tache.idtache=ressource.idtache) and (ressource.idtache=humaine.idtache)
and (ressource.type='Humaine')";
$res=mysql_query($req) or die("requette incorrect");
while ($row = mysql_fetch_array($res)) 
{
	echo '<tr>';
	echo '<td> '.$row['numProjet'].' </td>';
	echo '<td> '.$row['idtache'].' </td>';
	echo '<td> '.$row['type'].' </td>';
	echo '<td>'.$row['responsable'].'</td>';
	echo '<td> '.$row['nbrequipe'].' </td>';
	echo '<td> '.$row['salaire'].' </td>';
	echo '<td> <a href="php/sr.php?id='.$row['idressource'].'&num='.$row['idtache'].'&type='.$row['type'].'
	&ih='.$row['idrh'].'">Supprimer</a>
	</td>';
	echo '</tr>';
}
?>
</table>
Les Ressources Matériel:
<table border="1">
<tr>
<td bgcolor="#669999"><b><u><i>Numero Projet</u></b></i></td>
<td bgcolor="#669999"><b><u><i> Numero Tache </u></b></i></td>
<td bgcolor="#669999"><b><u><i> Type </u></b></i></td>
<td bgcolor="#669999"><b><u><i> Nom </u></b></i></td>
<td bgcolor="#669999"><b><u><i> Quantite</u></b></i></td>
<td bgcolor="#669999"><b><u><i> Prix</u></b></i></td>
<td bgcolor="#669999"><b><u><i>Choix</u></b></i></td>
</tr>
<?php
require_once("php/connexion.php");
$req="select * from projet,chef,creation,tache,ressource,materiel where (chef.email='".$_SESSION["email"]."') and (projet.numProjet=creation.numProjet) and(creation.emailChef='".$_SESSION["email"]." ')
and (projet.numProjet=tache.numProjet) and (tache.idtache=ressource.idtache) and (ressource.idtache=materiel.idtache)
and (ressource.type='Materiel')
";
$res=mysql_query($req) or die("requette incorrect");
while ($row = mysql_fetch_array($res)) 
{
	echo '<tr>';
	echo '<td> '.$row['numProjet'].' </td>';
	echo '<td> '.$row['idtache'].' </td>';
	echo '<td> '.$row['type'].' </td>';
	echo '<td>'.$row['nomm'].'</td>';
	echo '<td> '.$row['quantite'].' </td>';
	echo '<td> '.$row['prix'].' </td>';
	echo '<td> <a href="php/sr.php?id='.$row['idressource'].'&num='.$row['idtache'].'&type='.$row['type'].'
	&im='.$row['idrm'].'">Supprimer</a>
	</td>';
	echo '</tr>';
}
?>
</table>
</form> 

</div>
</div>
?>
<div class="down">
   ©    Copyright Univeristy of Oum el Bouaghi.
</div>

</body>
</html>
