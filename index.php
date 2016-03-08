<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div>
		<form enctype='multipart/form-data' name='aaa' method='post' action='do_upload.php'> 
		<input type='hidden' name='MAX_FILE_SIZE' value='2621114' /> 
		<span>Choisir le fichier que vous voulez upload, SVP</span><br/>
		<input name='upload_file' type='file' />
		<input type="submit" value="upload le ficher"/>
		</form>
	</div>
	<div>
		<table border="1" width="400">
		  <tr>
		    <th width="150">N</th>
		    <th>prenom</th>
		    <th>sexe</th>
		    <th>changement</th>
		  </tr>
	    <?php
	    	require_once("lib/conn.php");
	    	$sql = "select * from auteur";
			$result = mysql_query($sql);
			while($row = mysql_fetch_assoc($result))
			{
				echo '<tr>';
				echo '<td>'.$row['id'].'</td>';
				echo '<td>'.$row['prenom'].'</td>';
				echo '<td>'.$row['sexe'].'</td>';
				echo "<td><a target='_self' href='edit_sex.php?id=".$row['id']."'>choisir le sexe</a></td>";
				echo '</tr>';
			}
	    ?>
		</table>
	</div> 
</body>
</html>