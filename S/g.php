<?php 
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_gantt.php');
 @mysql_connect("localhost","root","") or die("Erreur de connexion au serveur");
@mysql_select_db("site") or die ("Erreur lors de choix de la base de donnees");
$a=$_GET["num"];
$req2="select * from projet where numProjet=$a";
$res2=mysql_query($req2) or die ("requette incorrect");
$row1=mysql_fetch_assoc($res2);
$graph = new GanttGraph();
$graph->SetBox();
$graph->SetShadow();
 
// Add title and subtitle
$graph->title->Set("Gantt Diagramme");
$graph->title->SetFont(FF_ARIAL,FS_BOLD,12);
 $graph->SetDateRange($row1["datedebut"],$row1["datefin"]);
// Show day, week and month scale
$graph->ShowHeaders(GANTT_HDAY | GANTT_HMONTH | GANTT_HYEAR);
 
// Set table title
$graph->scale->tableTitle->Set("Nom Tache");
$graph->scale->tableTitle->SetFont(FF_FONT1,FS_BOLD);
$graph->scale->SetTableTitleBackground("silver");
$graph->scale->tableTitle->Show();
 
// Use the short name of the month together with a 2 digit year
// on the month scale
//$graph->scale->month->SetStyle(MONTHSTYLE_SHORTNAMEYEAR2);
$graph->scale->month->SetFontColor("white");
$graph->scale->month->SetBackgroundColor("blue");
 
// 0 % vertical label margin
$graph->SetLabelVMarginFactor(1);
 
// Format the bar for the first activity
// ($row,$title,$startdate,$enddate)
$req="select *, DAY (datedebutt) as jour, MONTH (datedebutt) as mois, YEAR (datedebutt) as annee, DAY (datefint) as jourf, MONTH (datefint) as moisf, YEAR  (datefint) as anneef from tache where tache.numProjet=$a";
$res=mysql_query($req) or die ("requette incorrect");

$i=0;
while ($row=mysql_fetch_array($res)){
$day=new DateTime();
$datetime1 = new DateTime($row["datedebutt"]);
$datetime2 = new DateTime($row["datefint"]);
$interval = $datetime1->diff($day);
$interval=$interval->format('%R%a ');
$interval2=$day->diff($datetime2);
$interval2=$interval2->format('%R%a ');


$name=$row["nomt"];
 $db=$row["annee"]."-".$row["mois"]."-".$row["jour"];
 $df=$row["anneef"]."-".$row["moisf"]."-".$row["jourf"];

$j = date('Y-m-d'); 
$j = new DateTime( $j); 
$j = $j->format('Ymd'); 
$dff = new DateTime( $df ); 
$dff = $dff->format('Ymd'); 
$dbb = new DateTime( $db ); 
$dbb = $dbb->format('Ymd');


if( $j >= $dff ) {$pro=1; $p=100; } 

else if ($j<$dbb) {$pro=0; $p=0; }

else {
	if (($interval+$interval2)==0){$p=100; $pro=1;}
	else{
	$p=($interval/($interval+$interval2))*100;
	
	$p=round($p,2);
	
	$pro=$p/100;
	$pro=round($pro, 1);
	}
	
	}
// Format the bar for the first activity
// ($row,$title,$startdate,$enddate)
$activity = new GanttBar ($i,"$name","$db","$df","".$p."%");
 // Yellow diagonal line pattern on a red background
$activity->SetPattern(BAND_RDIAG,"yellow");
$activity->SetFillColor("red");
 
// Set absolute height
$activity->SetHeight(10);
$activity->progress->Set($pro);
$activity->progress->SetPattern(BAND_HVCROSS,"blue");
$graph->Add($activity);
$i++;
}

// ... and display it
$graph->Stroke();
?>