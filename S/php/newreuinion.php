<?php
require_once("connexion.php");
session_start();
$em=$_SESSION['email'];
$a=$_GET["r"];
$b=$_GET["s"];
$c=$_GET["d"];
$d=$_GET["t"];
$req="insert into reunion (responsable,sujet,datereunion,heurer,emailChef) values ('$a','$b','$c','$d','$em')";
echo $req;
$res=mysql_query($req) or die("requette incorrect");
if($res) header("location: ../mereuinion.php");
else echo ("error"); 
?>