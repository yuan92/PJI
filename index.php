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
	<?php
		require_once("lib/conn.php");
		if(empty($_POST['sexe'])){
	    		$sql = "select from auteur";
				//$result = mysql_query($sql);
	    	}else if($_POST['sexe'] == 'tout'){
	    		$sql = "select * from auteur";
				//$result = mysql_query($sql);
	    	}else if($_POST['sexe'] == 'masculine'){
	    		$sql = "select * from auteur where sex = 'masculine'";
				//$result = mysql_query($sql);
	    	}else if($_POST['sexe'] == 'feminine'){
	    		$sql = "select * from auteur where sex = 'feminine'";
				//$result = mysql_query($sql);
	    	}else{
	    		$sql = "select * from auteur";
				//$result = mysql_query($sql);
	    	}
	    	//下面主要为了让用户知道他搜索了什么性别
	    	if(!empty($_POST['sexe']))
	    	{
	    		if($_POST['sexe']=='masculine'||$_POST['sexe']=='feminine'){
	    		echo "Vous avez cherche touts les prenom ".$_POST['sexe']."!";
	    		}
	    	}
			$result = mysql_query($sql);
			while($row = mysql_fetch_assoc($result))
			{
				echo '<tr>';
				echo '<td>'.$row['id'].'</td>';
				echo '<td>'.$row['prenom'].'</td>';
				echo '<td>'.$row['sexe'].'</td>';
				echo '</tr>';
			}
	?>
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