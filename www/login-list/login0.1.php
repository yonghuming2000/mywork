<?php

include "common.php";

$username = $_POST['username'];
$password = $_POST['password'];
$vcode = $_POST['vcode'];


if ($vcode !== '0000') {
    die("vcode-error");
}

$conn = create_connection();

// 拼接SQL语句并执行它
$sql = "select * from user where username='$username' and password='$password'";
$result = mysqli_query($conn, $sql) or die("SQL语句执行错误.");    // $result获取到的查询结果，称结果集

if (mysqli_num_rows($result) == 1) {
    echo "login-pass";
    $_SESSION['username'] = $username;
    $_SESSION['islogin'] = 'true';
    echo "<script>location.href='welcome.php'</script>";
}
else {
    echo "login-fail";
    echo "<script>location.href='login.html'</script>";
}

// 关闭数据库
mysqli_close($conn);

?>