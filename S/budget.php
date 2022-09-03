<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Rapport</title>
<link   href="css/user.css" rel="stylesheet" type="text/css">
</head>
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
<?php
require_once("php/connexion.php");
$a= $_GET["num"];
//Numero projet
$req="select * from creation where numProjet=$a";
$res=mysql_query($req) or die ("requette incorrect");
$row=mysql_fetch_array($res);
echo 'Projet Numero: '.$a. '<br>';

//Chef de projet
$req1="select * from chef where email='".$row["emailChef"]."'";
$res1=mysql_query($req1) or die ("requette 2 incorrect");
$row1=mysql_fetch_array($res1);
echo 'Chef de Projet: '.$row1["nom"].' '.$row1["prenom"].'<br>';

//Client
$req2="select * from client, creation where (creation.numProjet=$a) and (creation.emailClient=client.emailC)";
$res2=mysql_query($req2) or die ("erreur 2");
$row2=mysql_fetch_array($res2);
echo 'Client: '.$row2["nomc"].' '.$row2["prenomc"].'<br>';

//Date Debut et Date fin
$req3="select  *, DAY (datedebut) as jour, MONTH (datedebut) as mois, YEAR (datedebut) as annee, DAY (datefin) as jourf, MONTH (datefin) as moisf, YEAR  (datefin) as anneef from projet where numProjet=$a";
$res3=mysql_query($req3) or die ("erreur 3");
$row3=mysql_fetch_array($res3);
echo 'Date Debut: '.$row3["jour"].'-'.$row3["mois"].'-'.$row3["annee"].'<br>';
echo 'Date fin: '.$row3["jourf"].'-'.$row3["moisf"].'-'.$row3["anneef"].'<br>';

//Etat Avancement
$pour=0;
$db=$row3["annee"]."-".$row3["mois"]."-".$row3["jour"];
$day=new DateTime();
$datetime1 = new DateTime($row3["datedebut"]);
$datetime2 = new DateTime($row3["datefin"]);
$interval = $datetime1->diff($day);
$interval=$interval->format('%R%a ');
$interval2=$day->diff($datetime2);
$interval2=$interval2->format('%R%a ');
$j = date('Y-m-d'); 
$j = new DateTime( $j); 
$j = $j->format('Ymd'); 
$dbb = new DateTime( $db ); 
$dbb = $dbb->format('Ymd');
 if ($j<$dbb) {$pour=0; }
else {$pour=($interval/($interval+$interval2))*100; $pour=round($pour,2);}
echo 'Avancement: '.$pour.'%';
// Les délais


//Les taches
$j=date('d');
$req4="select *, DAY (datedebutt) as jour, MONTH (datedebutt) as mois, YEAR (datedebutt) as annee, DAY (datefint) as jourf, MONTH (datefint) as moisf, YEAR  (datefint) as anneef from tache where tache.numProjet=$a";
$res4=mysql_query($req4) or die ("erreur 4");
echo '<table border="1px">';
echo '<tr>';
echo '<td bgcolor="#669999"><b><u><i>Tache</u></b></i></td>';
echo'<td  bgcolor="#669999"><b><u><i>Date Debut</b></u></i></td>';
echo'<td  bgcolor="#669999"><b><u><i>Date Fin</b></u></i></td>';
echo'<td  bgcolor="#669999"><b><u><i>Etat</b></u></i></td>';
echo '</tr>';
while ($row4=mysql_fetch_array($res4)){
$datetime1 = new DateTime($row4["datedebutt"]);
$datetime2 = new DateTime($row4["datefint"]);
 $db=$row4["annee"]."-".$row4["mois"]."-".$row4["jour"];
 $df=$row4["anneef"]."-".$row4["moisf"]."-".$row4["jourf"];

$j = date('Y-m-d'); 
$j = new DateTime( $j); 
$j = $j->format('Ymd'); 
$dff = new DateTime( $df ); 
$dff = $dff->format('Ymd'); 
$dbb = new DateTime( $db ); 
$dbb = $dbb->format('Ymd');
$r=new DateTime($dbb); 
$r=$r->format('d');
echo '<tr>';
if( $j >= $dff ) {
		echo '<td >'.$row4['nomt'].'</td>';
		echo '<td >'.$row4['jour'].'-'.$row4["mois"].'-'.$row4["annee"].'</td>';
		echo '<td >'.$row4['jourf'].'-'.$row4["moisf"].'-'.$row4["anneef"].'</td>';
		echo '<td> '.'Terminer'.'</td>';
}
else if ($j<$dbb) {
		echo '<td >'.$row4['nomt'].'</td>';
		echo '<td >'.$row4['jour'].'-'.$row4["mois"].'-'.$row4["annee"].'</td>';
		echo '<td >'.$row4['jourf'].'-'.$row4["moisf"].'-'.$row4["anneef"].'</td>';
		echo '<td> '.'En Attente'.'</td>';
}
else if ($j<$dff) {
		echo '<td >'.$row4['nomt'].'</td>';
		echo '<td >'.$row4['jour'].'-'.$row4["mois"].'-'.$row4["annee"].'</td>';
		echo '<td >'.$row4['jourf'].'-'.$row4["moisf"].'-'.$row4["anneef"].'</td>';
		echo '<td> '.'En cour'.'</td>';
}
}
echo '</tr>';
echo '</table>';
?>

</div>

<div class="down">
   ©    Copyright Univeristy of Oum el Bouaghi.
</div>

</body>
</html>
