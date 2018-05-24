<?php
header("Content-Type: text/html;charset=utf-8");
$num = isset($_POST["num"]) ? $_POST["num"] : " ";
if (preg_match("/^[0-9]*$/", $num)) {

	if ($num === " " || strlen($num) == 0) {
		echo "请输入您要删除的学生的学号";
	} else {
		$servername = "localhost";
		$username = "lupei";
		$password = "123456";
		$db = "mydb";
		$conn = new mysqli($servername, $username, $password, $db);
		if ($conn -> connect_error) {
			die("连接失败:" . $conn -> connect_errno);
		}

		$sql = "DELETE FROM student WHERE id =" . $num;
		$result = $conn -> query($sql);
		$mark = $conn -> affected_rows;
		if (!$result || $mark == 0) {
			echo "此人不存在,删除失败!";
			exit ;
		}
		echo "删除成功!";
		$conn -> close();
	}
} else {
	echo "请您输入合法的学号!";
}
?>