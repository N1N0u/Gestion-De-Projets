<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Mes Réuinions</title>
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
<table border="1px">
<tr>
<td bgcolor="#669999"><b><u><i>Responsable</u></b></i></td>
<td bgcolor="#669999"><b><u><i>Sujet</u></b></i></td>
<td bgcolor="#669999"><b><u><i>Date</u></b></i></td>
<td bgcolor="#669999"><b><u><i>Heure</u></b></i></td>
</tr>
<?php
require_once("php/connexion.php");
$a=$_SESSION['email'];
$req="select *,DAY (datereunion) as jour, MONTH (datereunion) as mois, YEAR (datereunion) as annee from reunion where emailChef='$a'";
$res=mysql_query($req) or die ("requette incorrect");
while ($row=mysql_fetch_array($res)){
	echo '<tr>';
	echo '<td>'.$row["responsable"].'</td>';
	echo '<td>'.$row["sujet"].'</td>';
	echo '<td>'.$row["jour"].'-'.$row["mois"].'-'.$row["annee"].'</td>';
	echo '<td>'.$row["heurer"].'</td>';
	echo '<tr>';
}

?>
</table>
</div>
</div>
<div class="down">
   ©    Copyright Univeristy of Oum el Bouaghi.
</div>

</body>
</html>
