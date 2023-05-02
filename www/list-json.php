<?php

//连接数据库并访问数据
$conn = new mysqli('127.0.0.1','root','123456','learn') or die('数据库连接不成功');
$conn->set_charset('utf8');
$sql = "select articleid,author,viewcount,createtime from article where articleid<5";
$result = $conn->query($sql);

//输出JSON数据到页面
$json = json_encode($result->fetch_all(MYSQLI_ASSOC));
// echo $json;

//判断长度，防止注入
if (strlen($_GET['callback']) > 10){
    die("too_long");
}

//判断函数名，防止注入
$white_list = array('test', 'jsonp', 'handle', 'doedit');
if (!(in_array($_GET['callback'], $white_list))){
    die("wrong_value");
}

//向前端输出回调函数
echo $_GET['callback']."(" . $json . ")";
$conn->close();
?>