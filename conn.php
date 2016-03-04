<?php
	$mysql_server_name='localhost';
 	$mysql_username='root'; 
	$mysql_password='';
	$mysql_database='test'; //le nom de base de donnee
	$conn = @mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("il y a une erreur");
	mysql_select_db($mysql_database); //ouverir le base de donnee
?>