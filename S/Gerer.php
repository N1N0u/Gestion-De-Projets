<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tache</title>
<link   href="css/user.css" rel="stylesheet" type="text/css">
</head>
<script language="javascript">
function check()
{	
var d=document.projet.date1.value;	
var e=document.projet.date2.value;	
var f=document.projet.c1.value;
if( d=="" || e=="" || f=="" )
	{
		alert("Veuillez remplir tous les champs");
		return false;
	}
	else {
	alert("Création avec succes");
	return true;}
}

</script>
<body>
<div class="top">
</div>
<div class="top1">
  <div class="d2">
    <form   action="php/disconnect.php">
    Welcome: <?php  
	session_start();
	echo $_SESSION['email'];
	?>
      <input type="submit" value="Disconnect" style="border-radius:10px" onClick="window.location: index.php">
    </form>
  </div>
</div>
<div class="main" >
<div class="menu">
<ul>Projet
<li><a href="user.php" >Nouveau</a></li>
<li><a href="mesprojets.php">Mes Projets</a></li>
</ul>
<ul>Taches
<li><a href="Gerer.php">Nouveau</a></li>
<li><a href="mestaches.php">Mes taches</a></li>
</ul>
<ul>Ressources
<li><a href="gererressource.php">Nouveau</a></li>
<li><a href="mesressources.php">Mes Ressources</a></li>
</ul>
<ul>réunion
<li><a href="reunion.php">Nouveau</a></li>
<li><a href="mereuinion.php">Mes Réuinions</a></li>
</ul>
</div>
<div class="work">
<div id="foo">
<p class="police">Veuillez remplir tous les champs svp:</p>
<form action="php/newtache.php" name="projet" onSubmit="return check()" method="get">
<p class="police" style="width:80px">Ref Projet:</p><input type="text" name="id" style=" position:absolute; left:340px; bottom:340px" value="<?php 
if(isset ($_GET['num']))
echo $_GET['num'] ;
else echo "";
 ?>"> <br>
<p class="police">Nom Tache: <input type="text" name="c1" style="margin-left:25px"></p>  <br>
<p class="police">date de debut: <input type="date" name="date1" style="margin-left:14px"></p> <br>
<p class="police">date Fin: <input type="date" name="date2" style="margin-left:47px"></p> <br>
<input type="submit" value="Crée" style="margin-left:300px"/>
</form> 
</div>
</div>
</div>
?>
<div class="down">
   ©    Copyright Univeristy of Oum el Bouaghi.
</div>

</body>
</html>
