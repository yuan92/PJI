<?php
	require_once("lib/conn.php");
	header("Content-type: text/html; charset=utf-8");//为了解决页面显示乱码
	//判断有没有上传文件（这个可以页面判断）和上传的文件是空文件
	if($_FILES['upload_file']['size']==0||$_FILES['upload_file']['error']!=0)
	{
		echo 'il ne y a pas de ficher ou le fichier est empty';
		exit();
	}
	// print_r($_FILES);
	//判断上传的文件格式
	$filename = $_FILES['upload_file']['name'];
	if(pathinfo($filename, PATHINFO_EXTENSION)!="csv")
	{
		echo 'ce ne est pas la bonne forme de ficher (csv demanded)';
		exit();
	}
	//将上传到临时目录下的文件存放到指定目录upload
	//1.判断指定目录是否存在
	if(!is_dir('./upload'))
	{
		//目录不存在，创建目录
		mkdir('./upload',0777);
	}
	//2.将缓存csv文件复制到指定目录
	$file_name = file_name($_FILES['upload_file']['name']);//调用file_name函数
	copy($_FILES['upload_file']['tmp_name'],'./upload/'.$file_name);
	//读取csv文件内容
	// $str = file_get_contents('./upload/'.$file_name);
	// echo $str;
	if(($file = fopen('./upload/'.$file_name,'r'))!=false){
		while($data = fgetcsv($file)){
			// $list[] = $data;
			$titre = $data[0];
			$prenom = $data[1];
			$firstInitial = $data[2];
			$nom = $data[3];
			$sex = $data[4];
			$revue = $data[5];
			$source = $data[6];
			$suject = $data[7];
			$motCle = $data[8];
			$localisation = $data[9];
			// 将读取的数据插入数据库
			$sql = "insert into 
auteur(titre,prenom,firstInitial,nom,sex,revue,source,suject,motCle,localisation)values('$titre','$prenom','$firstInitial','$nom','$sex','$revue','
$source','$suject','$motCle','$localisation')";

			mysql_query($sql);
		}
		//echo "upload succed";
		// $sql = "select * from auteur";
		// $result = mysql_query($sql);
		// while($row = mysql_fetch_assoc($result))
		// {
		// 	print_r($row);
		// }
	}
	fclose($file);
	/*********自定义函数***********/
	//为新上传文件生成新的文件名，避免用户上传同名的文件(给文件名加了个时间戳)
	function file_name($old_file_name){
		$new_file_name = time().'_'.$old_file_name;
		return $new_file_name;
	}
?>