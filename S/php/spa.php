<?php
require_once("connexion.php");
$a=$_GET["num"];
$req = "delete from projet where numProjet=$a" ;
$resultat=mysql_query($req)or die("Requette incorect");
if($resultat) header("location: ../admin.php");
else {echo ("error"); }
?>
