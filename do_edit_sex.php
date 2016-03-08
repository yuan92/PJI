<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		require_once("lib/conn.php");
		$id = $_POST['id'];
		$sex = $_POST['sexe'];
		$sql = "update auteur set sexe = '".$sex."' where id = ".$id;
		if(mysql_query($sql))
		{
			echo "succes,  <a href='index.php' target='_self'>Retour</a>";
		}
		else
		{
			echo "echec,  <a href='index.php' target='_self'>Retour</a>";
		}
	?>
</body>
</html>