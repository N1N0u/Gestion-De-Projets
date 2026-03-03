<?php
require_once("connexion.php");
$a=$_GET["id"];
$t=$_GET["type"];
$req="insert into ressource (idtache,type) values ('$a','$t')";
$res=mysql_query($req) or die("requette incorrect 1");
if($res){
	if($t=="Humaine"){
	$b=$_GET["nomresp"];
	$c=$_GET["nbrequipe"];
	$d=$_GET["salaire"];
	$req1="insert into humaine (responsable,idtache,nbrequipe,salaire) values ('$b','$a',$c,$d)";
	$res1=mysql_query($req1) or die("requette incorrect2");
	if($res1){header ("location:../mesressources.php");} else echo "erreur1";
} 
else if($t=="Materiel")
{
$e=$_GET["nomm"];
$f=$_GET["prix"];
$g=$_GET["quantite"];
$req2="insert into materiel (idtache,nomm,prix,quantite) values('$a','$e',$f,$g)";	
$res2=mysql_query($req2) or die("requette incorrect3");
if($res2){ header ("location:../mesressources.php");} else echo "erreur2";
}
}
else echo"erreur";
?>