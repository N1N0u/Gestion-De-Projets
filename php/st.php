<?php
require_once("connexion.php");
$a=$_GET['id'];
$b=$_GET['num'];
$req="delete from tache where idtache=$b and numProjet=$a";
$res=mysql_query($req) or die("requette incorrect");
if ($res)
{
	header ("location:../mestaches.php");
}
else echo "error";
?>