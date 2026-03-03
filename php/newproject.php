<?php
require_once("connexion.php");
$pp=$_GET["email"];
$n=$_GET["intitule"];
$p=$_GET["desc"];
$a=$_GET["lieu"];
$e=$_GET["date1"];
$o=$_GET["date2"];
$w=$_GET["c1"];
$x=$_GET["c2"];
$v=$_GET["c3"];
$req="INSERT INTO projet (intitule,description,lieu,datedebut,datefin) VALUES ('$n','$p','$a','$e','$o')";
$resultat=mysql_query($req)or die("Requette incorect");
$req1="insert into client (nomc,prenomc,emailC) values ('$w','$x','$v')";
$res1=mysql_query($req1) or die ("req1 incorrect");
$req2="select numProjet from projet where intitule='$n' ";
$res2=mysql_query($req2) or die ("req2 incorrect");
$num = mysql_fetch_assoc($res2);
$k= $num['numProjet'];
$req3="insert into creation (emailChef,numProjet,emailClient) values ('$pp',$k,'$v')";
$res3=mysql_query($req3) or die ("req3 incorrect");
if($resultat && $res1 && $res3 && $res2) { 
header("location: ../mesprojets.php");
}
else {echo ("error"); }


?>