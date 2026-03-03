<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Acceuil</title>
<link href="css/Acceuil.css" rel="stylesheet" type="text/css">
</head>

<script language="javascript">
$("#slideshow > div:gt(0)").hide();

setInterval(function() {
  $('#slideshow > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');
}, 3000);
function check()
{
var a,b;
 a=document.log.email.value;
 b=document.log.password.value;
 if ((a =="" && b=="") || (a=="") || (b==""))
 {
	alert("Veuillez remplir tous les champs");
	return false; 
 }
 else return true;
}
function change()
{
	var a,b,c,d;
	a=document.getElementById("for").value;
	b=document.getElementById("admin");
	c=document.getElementById("chef");
	d=document.getElementById("k");
	if(a=="Admin") {b.style="display:block"; c.style="display:none"; }
	else  if (a=="Chef"){c.style="display:block"; b.style="display:none";}
}
</script>
<body>
<div class="top"> 
</div>
   
<div class="main">
<div class="fo">
Type: <select id="for"  name ="type" onChange="change()" >
  <option   value="Chef" >Chef</option>
	<option   value="Admin">Admin</option>
</select> 
<div id="chef" >
  <form  action="php/login.php" method="post" onSubmit="return check()"  name="log">
    E-mail: <br>
    <input class="show" type="email" placeholder="email" name="email">
    <br>
    Password: <br>
  <input class="show" type="password" placeholder="password" name="password">
  <br>
  <br>
  <input class="show"  type="submit" value="Se Connecter" style="border-radius:25%; padding-bottom:"/>
  </form>
  <div class="b" id="k">
  <form action="inscription.html">
  <button class="show" style="border-radius:25%; margin-top:20px"> S'inscrire</button>
  </form>
  </div>
  </div>
  <div id="admin" style="display:none" >
  <form  action="php/login2.php" method="post" onSubmit="return check()"  name="log">
    Utilisateur: <br>
    <input class="show" type="text" placeholder="admin" name="email">
    <br>
    Password: <br>
  <input class="show" type="password" placeholder="password" name="password">
  <br>
  <br>
  <input class="show"  type="submit" value="Se Connecter" style="border-radius:25%; padding-bottom:"/>
  </form>
   </div>
  </div>
<!--Les images -->
  <div class="img" id="slideshow">
     <div class="contener_slideshow">
    <div class="contener_slide">
  <div class="slid_1"><img src="img/1.jpg"></div>
  <div class="slid_2"><img src="img/2.jpg"></div>
   <div class="slid_3"><img src="img/4.jpg"></div>
    
	    
    </div>
  </div>
  </div>

  <!--Footer-->
  <div class="down">
    ©    Copyright Univeristy of Oum el Bouaghi.
  </div>
</body>
</html>
