<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Chefs</title>
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
echo '<table  style="margin-left:300px" bgcolor="#FFFFFF"  border="1">';

        echo '<tr>';
		 echo '<td bgcolor="#669999"><b><u><i>Nom</u></b></i></td>';
		 echo'<td  bgcolor="#669999"><b><u><i>Prenom</b></u></i></td>';
        echo '<td bgcolor="#669999"><b><u><i>Adress</u></b></i></td>';
        echo '<td bgcolor="#669999"><b><u><i>Email</u></b></i></td>';
		 echo '<td bgcolor="#669999"><b><u><i>Choix</u></b></i></td>';
            echo '</tr>';
$req="select * from chef ";
$res=mysql_query($req)or die("Requette incorect");
while ($row = (mysql_fetch_array($res))) {
	echo '<form  action ="php/spc.php" method ="post" >';
	echo '<tr>';
		echo '<td >'.$row['nom'].'</td>';
		echo '<td> '.$row['prenom'].'</td>';
        echo '<td >'.$row['adress'].'</td>';

        echo '<td>'.$row['email'].'</td>';

	  echo '<td>
	  <a href="php/spc.php?email='.$row['email'].'">Supprimer</a>
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
