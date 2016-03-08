<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>determiner le sexe</title>
</head>
<body>
	<?php
		require_once("lib/conn.php");
		$id = $_GET['id'];
		$sql = "select * from auteur where id = ".$id;
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
	?>
	<form action="do_edit_sex.php" method="post">
	  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
	  <p>N: <input type="text" readonly name="s_no" value="<?php echo $row['id']; ?>"/></p>
	  <p>prenom: <input type="text" readonly name="name" value="<?php echo $row['prenom']; ?>"/></p>
	  <input type="radio" name="sexe" value="feminine" /> Feminine
	  <input type="radio" name="sexe" value="masculine" /> Masculine
	  <br>
	  <input type="submit" value="changer" />
	</form>
</body>
</html>