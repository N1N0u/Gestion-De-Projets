<?php
require_once("connexion.php");
$email=$_POST["email"];
$pass=$_POST["password"];
$req=" SELECT * FROM chef WHERE email='$email' and password='$pass' ";
$res=mysql_query($req) or die("requette incorrect");
	if ( mysql_num_rows($res) <= 0)
	{
	echo "<script> alert(\"Try Again\");</script> "; 
	header("location: ../index.php");
	}
	else {
	session_start();
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['password']=$_POST['$pass'];
	header("location: ../user.php");
		}
?>
