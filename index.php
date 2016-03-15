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
		<form action="index.php" method="post">
		  <input type="radio" name="sexe" value="tout" /> Tout
		  <input type="radio" name="sexe" value="masculine" /> Masculine
		  <input type="radio" name="sexe" value="feminine" /> Feminine
		  <br>
		  <input type="submit" value="Cherche" />
		</form>
	</div>
	<div style="width:300px;margin-top: 20px; margin-bottom: 20px;">
		<form action="search.php" method="post">
		  <span style="font-size:14px;">选择性别，选择ALL或不选默认为全部</span><br>
		  <input type="radio" name="sexe" value="tout" /> All
		  <input type="radio" name="sexe" value="masculine" /> Male
		  <input type="radio" name="sexe" value="feminine" /> Female
		  <br>
		  <span style="font-size:14px;">搜索姓名,不输入则默认为不搜索姓名</span>
		  <input type="text" name="prenom" placeholder="输入你想搜索的名字">
		  <br>
		  <input style="margin-top: 5px; margin-bottom: 5px;" type="submit" value="搜索" formtarget="_blank"/>
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
	    	$sql = "select * from auteur order by prenom";
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