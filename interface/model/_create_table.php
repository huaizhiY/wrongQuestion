<?php

	#建表测试;
	
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

	// 使用 sql 创建数据表
	$sql = "CREATE TABLE wq_list (
				wq_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
				wq_title VARCHAR(300) NOT NULL,
				wq_details VARCHAR(30) NOT NULL,
				wq_idea VARCHAR(30) NOT NULL,
				submission_date TIMESTAMP
			)";

	if ($conn->query($sql) === TRUE) {
	    echo "Table MyGuests created successfully";
	} else {
	    echo "创建数据表错误: " . $conn->error;
	}

	$conn->close();
?>