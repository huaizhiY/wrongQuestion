<?php

    require("model/_connect.php");

    $remove_id = @$_REQUEST["id"];

    if($remove_id == "" || $remove_id == null){
        die("参数错误");
    }

    $sql = "DELETE FROM $tbname WHERE wq_id=$remove_id";

    $res = $conn->query($sql);

    

?>