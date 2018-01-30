<?php 

	require "_connect.php";

	#更新;数据

	$sql = "UPDATE test SET id=10
			WHERE firstname='John'";

	echo $sql;

	$result = $conn->query($sql);

	echo $result;

	$conn->close();
 ?>