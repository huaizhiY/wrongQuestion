<?php 
	
	#选讲;

	require "_connect.php"; //链接数据库配置文件;

	$stmt = $conn->prepare("INSERT INTO test (firstname, lastname, email,reg_date) VALUES (?, ?, ?,?)");
	//预处理; prepare()方法会告知数据库何时进行数据的链接;

	$stmt->bind_param("ssss", $firstname, $lastname, $email,$day);
	// bind_param 方法代表这绑定对应参数; sss 代表三个参数都是字符串;
	// i 代表 int 整型;
	// d 代表 double 浮点型;
	// s 代表string 字符串;
	// b 代表boolean 布尔值;

	// 通过数据类型的告知，可以降低数据库注入风险;

	date_default_timezone_set("Asia/Shanghai");
	#获取当前事件 年月日 时分秒;
	
	// 设置参数并执行
	$firstname = "John";
	$lastname = "Doe";
	$email = "john@example.com";
	$day = date('y/m/d h:i:s');
	$stmt->execute();


	$firstname = "Mary";
	$lastname = "Moe";
	$email = "mary@example.com";
	$day = date('y/m/d h:i:s');
	$stmt->execute();
 	
 	$firstname = "Julie";
	$lastname = "Dooley";
	$email = "julie@example.com";
	$day = date('y/m/d h:i:s');
	//execute该方法是写入方法，配合bind_param使用。
	$stmt->execute();

	echo "新记录插入成功";

	$stmt->close();
	$conn->close();
		
?>