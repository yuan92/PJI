<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>search</title>
	<script type="text/javascript" src="./lib/jquery.min.js"></script>
	<style>
	/* 收缩展开效果 */
	.text{line-height:22px;padding:0 6px;color:#666;}
	.box h1{padding-left:10px;height:22px;line-height:22px;background:#f1f1f1;font-weight:bold;}
	.box{position:relative;border:1px solid #e7e7e7;}
	</style>
	<script>
	function show(c_Str){
		if(document.all(c_Str).style.display=='none'){
			document.all(c_Str).style.display='block';
		}
		else{
			document.all(c_Str).style.display='none';}
		}
	function high(){
	if (event.srcElement.className=="k"){
		event.srcElement.style.background="336699"
		event.srcElement.style.color="white"
		}
	}
	function low(){
	if (event.srcElement.className=="k"){
		event.srcElement.style.background="99CCFF"
		event.srcElement.style.color=""
		}
	}
	</script>
</head>
<body>
	<div>
		<table border="1" width="400">
		  <tr>
		    <th>prenom</th>
		    <th>sexe</th>
		    <th>changement</th>
		  </tr>
	    <?php
	    	require_once("lib/conn.php");
	    	$sql = "select * from auteur order by prenom";
			$result = mysql_query($sql);
			$x = "";
			while($row = mysql_fetch_assoc($result))
			{
				echo '<tr>';
				echo "<input type=hidden name=id[] value='".$row['id']."'>";
				if($row['prenom']!=$x){
					echo '<td>'.$row['prenom'].'</td>';
					echo '<td></td>';
					echo "<td><input type=radio name=sexe".$row['id']." value=feminines /> F
							  <input type=radio name=sexe".$row['id']." value=masculines /> M
						  </td>";
					echo '<tr>';
					echo '<td>'.$row['prenom'].'</td>';
					$x = $row['prenom'];
				}else{
					echo '<td>'.$row['prenom'].'</td>';
				}
				echo '<td class=k>'.$row['sexe'].'</td>';
				echo "<td><input type=radio name=sexe".$row['id']." value=feminine /> Feminine 
							  <input type=radio name=sexe".$row['id']." value=masculine /> Masculine
						  </td>";
				echo '</tr>';
			}		
	    ?>
		</table>
	</div> 
	
</body>
</html>