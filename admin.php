<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Projets</title>
<link href="css/admin.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
session_start();
echo '
<div class="top">
</div>';
echo'
<div class="top1">';
  echo '<div class="d2">';
    echo '<form   action="php/disconnect.php">';
   echo ' Welcome:'. $_SESSION["email"].' ';
    echo '  <input type="submit" value="Disconnect" style="border-radius:10px" onClick="window.location: index.php">';
    echo '</form>';
 echo ' </div>';
echo '</div>
';
echo '<div class="main" >
<div class="menu">
<ul> Tableau de bord
<li><a href="admin.php">Projets</a></li>
<li><a href="adminc.php">Chefs</a></li>
</ul>
</div>';
echo '<div class="work">';
require_once("php/connexion.php");
echo '<table style=" margin-left:250px" bgcolor="#FFFFFF"  border="1">';

        echo '<tr>';
		 echo '<td bgcolor="#669999"><b><u><i>Ref</u></b></i></td>';
		 echo'<td  bgcolor="#669999"><b><u><i>Client</b></u></i></td>';
        echo '<td bgcolor="#669999"><b><u><i>Intitulé</u></b></i></td>';

        echo '<td bgcolor="#669999"><b><u><i>Description</u></b></i></td>';

      echo '<td bgcolor="#669999"><b><u><i>Lieu</u></b></i></td>';

        echo '<td bgcolor="#669999"><b><u><i>Date Debut</u></b></i></td>';

      echo '<td bgcolor="#669999"><b><u><i>Date Fin</u></b></i></td>' ;
	  
	   echo '<td bgcolor="#669999"><b><u><i>Choix</u></b></i></td>' ;

      echo '</tr>';
$req="select *,DAY (datedebut) as jour,MONTH (datedebut) as mois ,YEAR (datedebut) as annee,DAY (datefin) as jourf,MONTH (datefin) as moisf ,YEAR (datefin) as anneef from projet,creation,chef,client where (creation.emailClient=client.emailC) and  (projet.numProjet=creation.numProjet) ";
$res=mysql_query($req)or die("Requette incorect");
while ($row = (mysql_fetch_array($res))) {
	echo '<form  action ="php/sp.php" method ="get" >';
	echo '<tr>';
		echo '<td >'.$row['numProjet'].'</td>';
		echo '<td> '.$row['nomc'].'.'.$row['prenomc'].'</td>';
        echo '<td >'.$row['intitule'].'</td>';

        echo '<td>'.$row['description'].'</td>';

      echo '<td>'.$row['lieu'].'</td>';

       echo '<td> '.$row["jour"].'/'.$row["mois"].'/'.$row["annee"]. '</td>';
	   
	echo '<td> '.$row["jourf"].'/'.$row["moisf"].'/'.$row["anneef"]. ' </td>';
	  
	  echo '<td>
	  <a href="php/spa.php?num='.$row['numProjet'].'">Supprimer</a>
	   </td>';
	  echo '</tr>';
    }
	 echo '</form>';
    echo '</table>';

echo '</div>';
echo '</div>';
echo'
<div class="down">
   ©    Copyright Univeristy of Oum el Bouaghi.
</div>
';
?>
</body>
</html>
