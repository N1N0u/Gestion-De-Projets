<?php
require_once("connexion.php");
$n=$_GET["nom"];
$p=$_GET["prenom"];
$a=$_GET["adress"];
$e=$_GET["email"];
$p=$_GET["password"];
$req="INSERT INTO chef (nom,prenom,adress,email,password) VALUES ('$n','$p','$a','$e','$p')";
$resultat=mysql_query($req)or die("Requette incorect");
if($resultat) header("location: ../index.php");
else {echo ("error"); }
?>
