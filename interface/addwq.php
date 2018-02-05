<?php 

	/*
		
		字段名称 ：

				title => 问题标题
				details => 问题详情
				idea => 问题备注（个人问题见解）



	*/
	
	//数据插入更新

	require "model/_connect.php";

	$stmt = $conn->prepare("INSERT INTO $tbname ( wq_title, wq_details,wq_idea,submission_date) VALUES ( ?, ?, ?, ?)");

	$stmt->bind_param("ssss", $title, $details, $idea, $date);

	$title = @$_REQUEST["title"];
	$details = @$_REQUEST["details"];
	$idea = @$_REQUEST["idea"];
	$date = date('y/m/d h:i:s');
	//execute该方法是写入方法，配合bind_param使用。
	$stmt->execute();

	$stmt->close();
	$conn->close();

	echo $title.$details.$idea;
?>