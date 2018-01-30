<?php 

	#分页,信息展示
	require "model/_connect.php";

	#查询并返回json数据;	

	$sql = "SELECT wq_id, wq_title, wq_details,wq_idea,submission_date FROM $tbname";

	$res = $conn->query($sql);
	$res_arr = array();
	if($res->num_rows > 0){
		while($row = $res->fetch_assoc()){
			array_push($res_arr,$row);
		}
	}else{
		array_push($res_arr,null);

		die("error");
	}

	$json_arr = array("details" => $res_arr);

	#将unicode编码转换成中文字符方法;
	function decodeUnicode($str){
		//php*正则方法; preg_replace_callback
	    return preg_replace_callback('/\\\\u([0-9a-f]{4})/i',
	        create_function( //*函数创建方法;
	            '$matches',
	            'return mb_convert_encoding(pack("H*", $matches[1]), "UTF-8", "UCS-2BE");'
	        ),
	        $str);
	}
	//*标内容请自行查阅文档;
	echo decodeUnicode(json_encode($json_arr));
?>