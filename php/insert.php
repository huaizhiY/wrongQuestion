<?php 
	
	#单条数据插入 -> 带有时间;

	$servername = "localhost";
	$username = "root";
	$password = "123456";
	$dbname = "wrong_question"; //选中数据库;
	// 创建连接
	$conn = new mysqli($servername, $username, $password,$dbname);
	// 检测连接
	if ($conn->connect_error) {
	    die("连接失败: " . $conn->connect_error);
	} 
	#设置时区 ! *必须设置;
	date_default_timezone_set("Asia/Shanghai");
	#获取当前事件 年月日 时分秒;
	$day = date('y/m/d h:i:s');
	
	$sql = "INSERT INTO test (
				firstname, lastname, email, reg_date)
			VALUES 
				('John', 'Doe', 'john@example.com' ,'".$day."')";

	if ($conn->query($sql) === TRUE) {
	    echo "新记录插入成功";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();
 ?>