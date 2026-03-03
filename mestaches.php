<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Mes taches</title>
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
	echo $_SESSION["email"];
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
<table border="1">
<tr>
<td bgcolor="#669999"><b><u><i>Numero Projet</i></u></b></td>
<td bgcolor="#669999"> <b><u><i>Numero Tache </i> </u></b></td>
<td bgcolor="#669999"> <b><u><i>Nom Tache</i> </u> </b></td>
<td bgcolor="#669999"><b><u><i> date Debut</i></u></b></td>
<td bgcolor="#669999"><b><u><i> date Fin</i></u></b></td>
<td bgcolor="#669999"><b><u><i>Choix</i></u></b></td>
</tr>
<?php
require_once("php/connexion.php");
$req="select *, DAY (datedebutt) as jour,MONTH (datedebutt) as mois ,YEAR (datedebutt) as annee,DAY (datefint) as jourf,MONTH (datefint) as moisf ,YEAR (datefint) as anneef from projet,chef,tache,creation where (projet.numProjet=tache.numProjet) and (chef.email='".$_SESSION["email"]."') and (projet.numProjet=creation.numProjet) and(creation.emailChef='".$_SESSION["email"]."') ";
$res=mysql_query($req) or die("requette incorrect");
while ($row = mysql_fetch_array($res)) 
{
	echo '<form >';
	echo '<tr>';
	echo '<td> '.$row['numProjet'].' </td>';
	echo '<td> '.$row['idtache'].' </td>';
	echo '<td> '.$row['nomt'].' </td>';
	echo '<td> '.$row["jour"].'/'.$row["mois"].'/'.$row["annee"]. '</td>';
	echo '<td> '.$row["jourf"].'/'.$row["moisf"].'/'.$row["anneef"]. ' </td>';
	echo '<td> <a href="php/st.php?id='.$row['numProjet'].'&num='.$row['idtache'].'">Supprimer</a>
	<a href="gererressource.php?num='.$row['idtache'].'">Ajout Ressources</a>
	</td>';
	echo '</tr>';
	echo '</form>';
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
