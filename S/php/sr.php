<?php
require_once("connexion.php");
$a=$_GET["id"];
$b=$_GET["num"];
$t=$_GET["type"];
if ($t=="Humaine"){
$i=$_GET["ih"];
$req="delete from ressource where idressource=$a and idtache=$b ";
$req1="delete from humaine where idrh=$i";
$res1=mysql_query($req1);
$res=mysql_query($req);
if ($res && $res1) header("location:../mesressources.php");
else echo "erreur";
}
else if ($t=="Materiel"){
$i=$_GET["im"];
$req="delete from ressource where idressource=$a and idtache=$b ";
$req1="delete from materiel where idrm=$i";
$res1=mysql_query($req1);
$res=mysql_query($req);
if ($res && $res1) header("location:../mesressources.php");
else echo "erreur";
}


?>