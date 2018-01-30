<?php 

	//查询并返回json的接口;
	
	require "_connect.php";
	$sql = "SELECT id, firstname, lastname FROM test";

	$result = $conn->query($sql);
	//创建数组结构 ;
	$res_arr = array();
	if ($result->num_rows > 0) {
	    // 输出数据
	    while($row = $result->fetch_assoc()) {
	       array_push($res_arr,$row);
	    }
	    //存储数据库查询结果;
	    /*
			结构;
			[{id:x,firstname:x,lastname:x},.....]
	
	    */
	} else {
	   array_push($res_arr,null);
	}

	$json_arr = array('namelist' => $res_arr);

	//json返回结构应为{}包裹，所以用多维数组进行最终处理;

	echo json_encode($json_arr);
 ?>