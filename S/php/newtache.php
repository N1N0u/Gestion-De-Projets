<?php
require_once("connexion.php");
$a=$_GET["id"];
$b=$_GET["c1"];
$c=$_GET["date1"];
$d=$_GET["date2"];
$req="insert into tache (nomt,datedebutt,datefint,numProjet) values ('$b','$c','$d',$a)";
$res=mysql_query($req) or die ("requette incorrect");
if ($res)
{
		header("location: ../mestaches.php");
}
else echo "erreur";
?>