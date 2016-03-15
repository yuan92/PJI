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
	<script type="text/javascript">
	$(document).ready(function(){
	   $(".box h1").toggle(function(){
	     $(this).next(".text").animate({height: 'toggle', opacity: 'toggle'}, "slow");
	   },function(){
	   $(this).next(".text").animate({height: 'toggle', opacity: 'toggle'}, "slow");
	   });
	});
	</script>
</head>
<body>

	<a href='index.php' target='_self'>Retourne</a>
	<div>
		<?php
			//还缺少对0条记录的处理-_-
			//对搜索条件的性别进行处理
			if(empty($_POST['sexe'])){
	    		$sexe = '';
	    	}else if($_POST['sexe'] == 'tout'){
	    		$sexe = '';
	    	}else if($_POST['sexe'] == 'masculine'){
	    		$sexe = 'masculine';
	    	}else if($_POST['sexe'] == 'feminine'){
	    		$sexe = 'feminine';
	    	}
	    	//对搜索条件的姓名进行处理
	    	if($_POST['prenom'] == ''){
	    		$prenom = '';
	    	}else{
	    		//此处应该是有防sql注入的处理的，就不写了
	    		$prenom = $_POST['prenom'];
	    	}
	    	//提示用户上一步提交了哪些搜索条件
	    	if($sexe!='' && $prenom!=''){
	    		echo "<span>Vous avez cherche touts les auteurs qui s'appellent '".$prenom."'et de sexe'".$sexe."'</span>";
	    		$sql = "select * from auteur where sexe = '".$sexe."' and prenom like '%".$prenom."%'";
	    	}else if($sexe=='' && $prenom!=''){
	    		echo "<span>Vous avez cherche touts les auteurs qui s'appellent '".$prenom."'</span>";
	    		$sql = "select * from auteur where prenom like = '%".$prenom."%'";
	    	}else if($sexe!='' && $prenom==''){
	    		echo "<span>Vous avez cherche touts les auteurs qui s'appellent '".$sex."'</span>";
	    		$sql = "select * from auteur where sexe = '".$sexe."'";
	    	}else{
	    		//这种情况在前端js判断不让他发送到这边来比较好-_-
	    		echo "Il n'y a pas de condition de recherche";
	    		$sql = "select * from auteur";
	    	}
		?>
		
	</div>
	<div class="box">
		<h1>clik !</h1>
		<h1>clik !</h1>
		<div class="text">
			  <table border="1" width="400">
			  <tr>
			    <th width="150">N</th>
			    <th>prenom</th>
			    <th>sexe</th>
				<th>choisir</th>
			  </tr>
		    <?php
		    	require_once("lib/conn.php");
				$sql = "select * from auteur where prenom = 'Akhil' ";
		    	// echo $sql;这样可以看到sql语句
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
	</div>
</body>
</html>