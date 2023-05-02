<?php

// 设置使用中国北京时间作为时区
// date_default_timezone_set("PRC");

// $conn = mysqli_connect('127.0.0.1', 'root', '123456', 'learn') or die("数据库连接不成功.");
include "common.php";
$conn = create_connection_oop();

//获取的是前端的name属性，ajax提交获取的是id属性
$username = $_POST['username'];
$password = $_POST['password'];
$tmpPath = $_FILES['photo']['tmp_name'];    // 获取文件的临时路径
$fileName = $_FILES['photo']['name'];       // 获取文件的原始文件名

// echo $tmpPath . "<br/>";
// 不允许上传的不合格的文件名
// $extName = end(explode(".", $fileName));
// if ($extName !== 'jpg' or $extName !== 'png' or $extName !== 'gif'){
//     die("invalid-file");
// }

//判断文件类型
$fileType = $_FILES["photo"]["type"];
if ($fileType != 'image/jpeg' && $fileType != 'image/png' && $fileType != 'image/gif'){
    die("invalid-file");
}

// 判断一个用户是否已经存在
$sql = "select username from user where username='$username'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if ($count >= 1) {
    die('user-exists');
}

// 上传文件，从临时路径移动到指定路径
// move_uploaded_file($tmpPath, './upload/'.$fileName) or die('文件上传失败');

// 使用时间戳对上传文件进行重命名
$bian = explode(".", $fileName);
$newName = date('Ymd_His.') . end($bian);
move_uploaded_file($tmpPath, './upload/'.$newName) or die('文件上传失败');

//写入数据库
// $now = date('Y-m-d H:i:s');
// $sql = "insert into user(username, password, avatar, createtime) values('$username', '$password', '$newName', '$now')";
// mysqli_query($conn, $sql) or die('reg-fail');
// mysqli_close($conn);

// echo 'reg-pass';

echo '请确认你的个人信息：<br></br>';
echo "用户名；$username <br/>";
echo "密码为：$password <br/>";
echo "头像：<img src='./upload/$newName' width=300/><br/>";
echo "<a href='login.html'>点此登录</a>";

?>