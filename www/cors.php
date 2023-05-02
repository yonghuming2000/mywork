<?php

//连接数据库并访问数据
$conn = new mysqli('127.0.0.1','root','123456','learn') or die('数据库连接不成功');
$conn->set_charset('utf8');
$sql = "select articleid,author,viewcount,createtime from article where articleid<5";
$result = $conn->query($sql);

//输出JSON数据到页面
$json = json_encode($result->fetch_all(MYSQLI_ASSOC));

// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Origin: http://192.168.31.166");
// header("Access-Control-Allow-Methods: POST");

//添加白名单
$list = array('http://192.168.31.238:8080','http://192.168.31.166');
if (in_array($_SERVER['HTTP_ORIGIN'], $list)){
    header("Access-Control-Allow-Origin: " . $_SERVER['HTTP_ORIGIN']);
    echo $_SERVER['HTTP_ORIGIN'] . '--------';
}
else{
    die("Cross-Site Disallowd");
}

echo $json;
$conn->close();