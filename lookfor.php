<?php
header("Content-Type: text/html;charset=utf-8");
$num = isset($_GET["num"]) ? $_GET["num"] : " ";
if (preg_match("/^[0-9]*$/", $num)) {

	if ($num === " " || strlen($num) == 0) {
		echo "请输入您要查询的学生的学号";
	} else {
		$servername = "localhost";
		$username = "lupei";
		$password = "123456";
		$db = "mydb";
		$conn = new mysqli($servername, $username, $password, $db);
		if ($conn -> connect_error) {
			die("连接失败:" . $conn -> connect_errno);
		}
		$sql = "SELECT * FROM student where id=$num";
		$result = $conn -> query($sql);

		if ($result -> num_rows > 0) {
			// 输出数据
			while ($row = $result -> fetch_assoc()) {
				echo "id: " . $row["id"] . "<br>name: " . $row["name"] . "<br>age: " . $row["age"] . "<br>";
			}
		} else {
			echo "不存在这个人";
		}
		$conn -> close();
	}
} else {
	echo "请您输入合法的学号!";
}
?>