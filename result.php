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
				//echo $id;
				$sexe = 'sexe'.$id;
				//echo $sexe ;
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
					$id = $data_id[$j]['id'];
					$sexe = $data_id[$j]['sexe'];
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
			$sexe2 = "sexe".$array_prenom[0];
			for($m=0;$m<count($array_prenom);$m++){
				$prenom = $array_prenom[$m];
				//echo $prenom;
				$sexe2 = 'sexe'.$prenom;
				//echo $sexe2 ;
				if(isset($_POST[$sexe2])){
					if($_POST[$sexe2]=='masculine'||$_POST[$sexe2]=='feminine'){
						$sex2 = $_POST[$sexe2];
						$data_prenom[] = array('prenom'=>$prenom,'sexe'=>$sex2);
					}
				}
			}
			$flag_success_prenom = 0;
			$flag_fail_prenom = 0;
			$array_fail = array();
			$data_num_prenom = count($data_prenom);
			if($data_num_prenom!=0){
				for($n=0;$n<$data_num_prenom;$n++){
					$prenom = $data_prenom[$n]['prenom'];
					$sexe2 = $data_prenom[$n]['sexe'];
					echo $prenom.$sexe2;
					$sql = "update auteur set sexe = '".$sexe2."' where prenom like '%".$prenom."%'";
					if(mysql_query($sql)){
						$flag_success_prenom++;
					}else{
						$flag_fail_prenom++;
					}
				}
			}
			echo "Il  changement  <a href='test.php' target='_self'>retour</a>".$flag_success_prenom.$flag_fail_prenom;
		}else{
			echo "Il n'y a pas de changement  <a href='test.php' target='_self'>retour</a>";
		}
	?>
</body>
</html>
