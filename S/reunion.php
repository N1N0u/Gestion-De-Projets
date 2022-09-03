<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Réuinion</title>
<link   href="css/user.css" rel="stylesheet" type="text/css">
</head>
<script language="javascript">
function check()
{	
var a=document.reunion.r.value;	
var b=document.reunion.s.value;	
var c=document.reunion.d.value;
var d=document.reunion.t.value;
if( a=="" || b=="" || c=="" || d=="" )
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
    <form   action="php/php/disconnect.php">
    Welcome: <?php  
	session_start();
	echo $_SESSION['email'];
	?>
      <input type="submit" value="Disconnect"style="border-radius:10px" onClick="window.location: index.php">
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
<p class="police">Planification d'une nouvelle Réuinion:</p>
<form name="reunion" method="get" action="php/newreuinion.php" onSubmit="return check()">
<p class="police">Responsable:<input type="text" name="r" style="margin-left:25px"></p> <br>
<p class="police">Sujet: <input type="text" name="s" style="margin-left:75px"></p> <br>
<p class="police">Date: <input type="date" name="d" style="margin-left:80px"></p><br>
<p class="police">Heure: <input type="time" name="t" style="margin-left:70px"></p><br>
<input type="submit" value="Crée" style="margin-left:300px" >
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
