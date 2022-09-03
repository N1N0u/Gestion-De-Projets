<?php
@mysql_connect("localhost","root","") or die("Erreur de connexion au serveur");
@mysql_select_db("site") or die ("Erreur lors de choix de la base de donnees");
?>