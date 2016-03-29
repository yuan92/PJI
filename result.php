<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		require_once("lib/conn.php");
		header("Content-type: text/html; charset=utf-8");
		if(isset($_POST['id'])){
			$data_id = array();
			$array_id = $_POST['id'];
			$sexe = "sexe".$array_id[0];
			for($i=0;$i<count($array_id);$i++){
				$id = $array_id[$i];
				$sexe = 'sexe'.$id;
				if(isset($_POST[$sexe])){
					if($_POST[$sexe]=='masculine'||$_POST[$sexe]=='feminine'){
						$sex = $_POST[$sexe];
						$data_id[] = array('id'=>$id,'sexe'=>$sex);
					}
				}
			}
			$flag_success_id = 0;
			$flag_fail_id = 0;
			$array_fail = array();
			$data_num_id = count($data_id);
			if($data_num_id!=0){
				for($j=0;$j<$data_num_id;$j++){
					$id = $data[$j]['id'];
					$sexe = $data[$j]['sexe'];
					$sql = "update auteur set sexe = '".$sexe."' where id = ".$id;
					if(mysql_query($sql)){
						$flag_success_id++;
					}else{
						$flag_fail_id++;
					}
				}
			}
			echo "Il  changement  <a href='test.php' target='_self'>retour</a>".$flag_success_id.$flag_fail_id;
		}else{
			echo "Il n'y a pas de changement  <a href='test.php' target='_self'>retour</a>";
		}
			
		if(isset($_POST['prenom'])){
			$data_prenom = array();
			$array_prenom = $_POST['prenom'];
			$sexes = "sexe".$array_prenom[0];
			for($i=0;$i<count($array_prenom);$i++){
				$prenom = $array_prenom[$i];
				$sexes = 'sexe'.$id;
				if(isset($_POST[$sexes])){
					if($_POST[$sexes]=='masculine'||$_POST[$sexes]=='feminine'){
						$sex = $_POST[$sexes];
						$data_prenom[] = array('prenom'=>$prenom,'sexe'=>$sex);
					}
				}
			}
			$flag_success_prenom = 0;
			$flag_fail_prenom = 0;
			$array_fail = array();
			$data_num_prenom = count($data_prenom);
			if($data_num_prenom!=0){
				for($j=0;$j<$data_num_prenom;$j++){
					$prenom = $data[$j]['prenom'];
					$sexe = $data[$j]['sexe'];
					$sql = "update auteur set sexe = '".$sexe."' where prenom = ".$prenom;
					if(mysql_query($sql)){
						$flag_success++;
					}else{
						$flag_fail++;
					}
				}
				echo "Il n'y a pas d";
			}	
			echo "Il n'y a pas de changement  <a href='test.php' target='_self'>retour</a>";
			}
		//echo "Vous avez corrige ".$flag_success_prenom.", echoue ".$flag_fail_prenom.",  <a href='test.php' target='_self'>retoure</a>";
	?>
</body>
</html>
