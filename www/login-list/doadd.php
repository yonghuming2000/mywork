<?php
#引入公共函数库
include "common.php";

#获取前端提交的数据库和Session变量
$headline = $_POST['headline'];
$content = $_POST['content'];
$author = $_SESSION['username'];

#将文章数据插入数据库，并根据运行结果输出成功与否的标志
// echo $headline;
$conn = create_connection_oop();
$sql = "insert into article(author, headline, content, viewcount, createtime) values('$author', '$headline', '$content', 1, now())";
$conn->query($sql) or die('add-fail');

echo "add-success";