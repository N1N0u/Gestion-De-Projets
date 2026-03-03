<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Ressource</title>
<link   href="css/user.css" rel="stylesheet" type="text/css">
</head>
<script language="javascript">
function check()
{	 var a,b,c,d,e,f,g,h;
e=document.projet.type.value;
if (e=="Humaine"){
a=document.projet.id.value;	
b=document.projet.nomresp.value;
c=document.projet.nbrequipe.value;
d=document.projet.salaire.value;
if( a=="" || b=="" ||c=="" ||d=="")
	{
		alert("Veuillez remplir tous les champs");
		return false;
	}
	else {
	return true;}
	}
	else {
		f=document.projet.nomm.value;
		g=document.projet.quantite.value;
		h=document.projet.prix.value;
		if( f=="" || g=="" || h=="")
	{
		alert("Veuillez remplir tous les champs");
		return false;
	}
	else return true;
	}
}
function change()
{
	var a,b,c;
	a=document.getElementById("fo").value;
	b=document.getElementById("f1");
	c=document.getElementById("f2");
	if(a=="Humaine") {b.style="display:block"; c.style="display:none";}
	else  if (a=="Materiel"){c.style="display:block";
	b.style="display:none";
	}
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
<div id="foo" style="padding:0px; padding-left:20px; ">
<p class="police">Veuillez remplir tous les champs svp:</p>
<form action="php/newressource.php" name="projet" onSubmit="return check()" method="get">
<p class="police" style="margin-top:3px;">Ref Tache:<input type="text" name="id" style="margin-left:70px" value="  
<?php 
if(isset ($_GET['num']))
echo $_GET['num'] ;
 ?>" > </p><br>
<p class="police" style="margin-top:3px;">Type: <select id="fo"  name ="type" onChange="change()" style="margin-left:106px">
  <option   value="Humaine">Humaine</option>
  <option   value="Materiel" >Matériel</option>
</select> </p><br>
<div id="f1">
<p class="police" style="margin-top:3px; ">Nom Responsable: <input type="text" name="nomresp" style="margin-left:10px"> 
</p><br>
<p class="police" style="margin-top:3px;">Nombre équipe:<input type="number" name="nbrequipe" style="margin-left:33px"></p><br>
<p class="police" style="margin-top:3px;">Salaire Total: <input type="text" name="salaire" style="margin-left:50px"></p>
<br>
</div>
<div id="f2" style="display:none">
<p class="police" style="margin-top:3px; ">Nom:<input type="text" name="nomm"  style="margin-left:110px"></p><br> 
<p class="police" style="margin-top:3px; ">Quantité: <input type="number" name="quantite" style="margin-left:80px"></p><br>
<p class="police" style="margin-top:3px; ">prix total:<input type="text" name="prix" style="margin-left:80px"><br></p> 
</div>
<input type="submit" value="Crée" style="margin-left:300px; margin-bottom:20px;" />
</form> 
</div>
</div>
</div>
<div class="down">
   ©    Copyright Univeristy of Oum el Bouaghi.
</div>

</body>
</html>
