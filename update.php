<?php
header("Content-Type: text/html;charset=utf-8");
$num = isset($_POST["num"]) ? $_POST["num"] : " ";
$name = isset($_POST["name"]) ? $_POST["name"] : " ";
$age = isset($_POST["age"]) ? $_POST["age"] : " ";
echo "num:".$num."name: ".$name ."age: ".$age;

		$servername = "localhost";
		$username = "lupei";
		$password = "123456";
		$db = "mydb";
		$conn = new mysqli($servername, $username, $password, $db);
		if ($conn -> connect_error) {
			die("连接失败:" . $conn -> connect_errno);
		}
		$sql = "UPDATE student SET name ='".$name."', age =". intval($age)." WHERE id ='".$num."'";
		$result = $conn -> query($sql);
		$mark =$conn->affected_rows;
		/*echo $mark;*/
		if($mark==1){
		echo"更新成功!";
		}else{
			echo "更新失败!";
		}
$conn->close();
?>