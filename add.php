<?php
header("Content-Type: text/html;charset=utf-8");

$name = isset($_POST["name"]) ? $_POST["name"] : " ";
$age = isset($_POST["age"]) ? $_POST["age"] : " ";

/*echo "name:" . $name . "age:" . $age;*/
if (preg_match("/^[0-9]*$/", $age)) {
	if ($age === " " || strlen($age) == 0) {
		echo "请输入年龄";
	}
}
if (preg_match("/^[\x{4e00}-\x{9fa5}]+$/u", $name)) {
	if ($name === " " || strlen($name) == 0) {
		echo "请输入您要添加的学生的姓名";
	} else {
		$servername = "localhost";
		$username = "lupei";
		$password = "123456";
		$db = "mydb";
		$conn = new mysqli($servername, $username, $password, $db);
		if ($conn -> connect_error) {
			die("连接失败:" . $conn -> connect_errno);
		}
		$stmt = $conn -> prepare("insert into student(name,age) values(?,?)");
		$stmt -> bind_param("si", $name1, $age1);
		$name1 = $name;
		$age1 = intval($age);
		$b = $stmt -> execute();
		if ($b) {
			echo "添加成功!";
		} else {
			echo "添加失败";
		}
		$conn -> close();
	}
} else {
	echo "请您输入中文!";
}
?>