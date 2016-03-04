<?php
	$mysql_server_name='localhost';
 	$mysql_username='root';
	$mysql_password='';
	$mysql_database='pji';
	$conn = @mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("il y a un erreur de connexion");
	mysql_select_db($mysql_database);
?>