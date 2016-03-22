<!doctype html>
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
	<a href='index.php' target='_self'>Retourne</a>
	<div>	
	<h1><div class=up onclick=show("a")>Resultat</h1><div onmouseover=high() onmouseout=low() id=a style="display:none">		
	<table border="1" width="400">
			  <tr>
			    <th width="150">N</th>
			    <th> prenom</th> 
			    <th class=k>sexe</th>
				<th class=k>choisir</th>
			  </tr>
		<?php
			//还缺少对0条记录的处理-_-
			//对搜索条件的性别进行处理
	    	require_once("lib/conn.php");
			if(empty($_POST['sexe'])){
	    		$sexe = '';
	    	}else if($_POST['sexe'] == 'tout'){
	    		$sexe = '';
	    	}else if($_POST['sexe'] == 'masculine'){
	    		$sexe = 'masculine';
	    	}else if($_POST['sexe'] == 'feminine'){
	    		$sexe = 'feminine';
	    	}
	    	if($_POST['prenom'] == ''){
	    		$prenom = '';
	    	}else{
	    		$prenom = $_POST['prenom'];
	    	}
	    	if($sexe!='' && $prenom!=''){
	    		echo "<span>Vous avez cherche touts les auteurs qui s'appellent '".$prenom."' et de sexe '".$sexe."'</span>";
	    		$sql = "select * from auteur where sexe = '".$sexe."' and prenom like '%".$prenom."%'" ;
				$result = mysql_query($sql);
				while($row = mysql_fetch_assoc($result))
				{
					echo '<tr>';
					echo '<td class=k>'.$row['id'].'</td>';
					echo '<td class=k>'.$row['prenom'].'</td>';
					echo '<td class=k>'.$row['sexe'].'</td>';
					echo "<td class=k><a target='_self' href='edit_sex.php?id=".$row['id']."'>choisir le sexe</a></td>";
					echo '</tr>';
				}
	    	}else if($sexe=='' && $prenom!=''){
	    		echo "<span>Vous avez cherche touts les auteurs qui s'appellent '".$prenom."'</span>";
	    		$sql = "select * from auteur where prenom like '%".$prenom."%'";
				$result = mysql_query($sql);
				while($row = mysql_fetch_assoc($result))
				{
					echo '<tr>';
					echo '<td class=k>'.$row['id'].'</td>';
					echo '<td class=k>'.$row['prenom'].'</td>';
					echo '<td class=k>'.$row['sexe'].'</td>';
					echo "<td class=k><a target='_self' href='edit_sex.php?id=".$row['id']."'>choisir le sexe</a></td>";
					echo '</tr>';
				}
	    	}else if($sexe!='' && $prenom==''){
	    		echo "<span>Vous avez cherche touts les auteurs ".$sex."'</span>";
	    		$sql = "select * from auteur where sexe = '".$sexe."'";
				$result = mysql_query($sql);
				while($row = mysql_fetch_assoc($result))
				{
					echo '<tr>';
					echo '<td class=k>'.$row['id'].'</td>';
					echo '<td class=k>'.$row['prenom'].'</td>';
					echo '<td class=k>'.$row['sexe'].'</td>';
					echo "<td class=k><a target='_self' href='edit_sex.php?id=".$row['id']."'>choisir le sexe</a></td>";
					echo '</tr>';
				}
	    	}else{
	    		//这种情况在前端js判断不让他发送到这边来比较好-_-
	    		echo "Il n'y a pas de condition de recherche";
	    		$sql = "select * from auteur";
				$result = mysql_query($sql);
				while($row = mysql_fetch_assoc($result))
				{
					echo '<tr>';
					echo '<td class=k>'.$row['id'].'</td>';
					echo '<td class=k>'.$row['prenom'].'</td>';
					echo '<td class=k>'.$row['sexe'].'</td>';
					echo "<td class=k><a target='_self' href='edit_sex.php?id=".$row['id']."'>choisir le sexe</a></td>";
					echo '</tr>';
				}
	    	}
		?>
		</table>	
	</div>
</body>
</html>