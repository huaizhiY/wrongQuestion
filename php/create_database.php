<?php

	#创建数据库测试;

	$servername = "localhost";
	$username = "root";
	$password = "123456";
	// 创建连接
	$conn = new mysqli($servername, $username, $password);
	// 检测连接
	if ($conn->connect_error) {
	    die("连接失败: " . $conn->connect_error);
	} 

	// 创建数据库
	$sql = "CREATE DATABASE myDB";
	if ($conn->query($sql) === TRUE) {
	    echo "数据库创建成功";
	} else {
	    echo "Error creating database: " . $conn->error;
	}
	//关闭连接;
	$conn->close();

	#第一次创建会返回成功;
	#以后每次创建的时候都会返回
	#Error creating database: Can't create database 'mydb'; database exists 数据库已存在;
?>