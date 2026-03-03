<?php
require_once("connexion.php");
$a=$_GET["email"];
$req="delete from chef where email='$a'";
$res=mysql_query($req) or die ("requette incorect");
if ($res)
{
 header ("location: ../adminc.php");	
}
else echo "erreur";
?>