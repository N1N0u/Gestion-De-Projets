<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Projet</title>
<link   href="css/user.css" rel="stylesheet" type="text/css">
</head>
<script language="javascript">
function check()
{
var a=document.projet.intitule.value;	
var b=document.projet.desc.value;	
var c=document.projet.lieu.value;	
var d=document.projet.date1.value;	
var e=document.projet.date2.value;	
var f=document.projet.c1.value;
var g=document.projet.c2.value;
var h=document.projet.c3.value;
if(a=="" || b=="" || c=="" || d=="" || e=="" || f=="" || g=="" || h=="")
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
Veuillez remplir tous les champs svp:
<div id="foo">
<form action="php/newproject.php" name="projet" onSubmit="return check()" method="get">
<input type="hidden" name="email" value="<?php echo $_SESSION['email'] ; ?>">
<p class="police">Nom Client: <input type="text" name="c1" style="margin-left:25px"></p>
<p class="police">Prenom Client: <input type="text" name="c2" style="margin-left:5px"></p>
<p class="police">Email Cliant: <input type="email" name="c3" style="margin-left:20px"></p>
<p class="police">Intitulé: <input type="text" name="intitule" style="margin-left:60px"></p>
<p class="police">description: <input type="text" name="desc" style="margin-left:32px"></p>
<p class="police">lieu: <input type="text" name="lieu" style="margin-left:85px"></p>
<p class="police">date de debut: <input type="date" name="date1" style="margin-left:16px"></p>
<p class="police">date Fin: <input type="date" name="date2" style="margin-left:53px"></p>
<input type="submit" value="Crée" style="margin-left:300px"/>
</form> 
</div>
</div>
</div>
<div class="down">
   ©    Copyright Univeristy of Oum el Bouaghi.
</div>

</body>
</html>
