<?php 
	#条件查询;

	require "_connect.php";

	//在表 test 中查询 字段名为firstname 字段值为'john'的一条数据;
	$result = $conn->query("SELECT * FROM test
	WHERE firstname='john'");

	while($row = $result->fetch_assoc())
	{
	    echo $row['firstname'] . " " . $row['lastname'];
	    echo "<br>";
	}


 ?>