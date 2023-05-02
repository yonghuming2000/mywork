<?php

include "common.php";

$username = $_POST['username'];
$password = $_POST['password'];
$vcode = $_POST['vcode'];


// if ($vcode !== '0000') {
//     die("vcode-error");
// }

if(strtoupper($_SESSION['vcode']) != strtoupper($vcode)){
    die("vcode-error");
}
else{
    unset($_SESSION['vcode']);
//     $_SESSION['vcode'] = '';
}

// if (strtoupper($_COOKIE['vcode']) != strtoupper($vcode)){
//     die("vcode-error");
// }
    
// 基于面向对象和MySQL预处理功能实现SQL注入的防护
$conn = create_connection_oop();

$sql = "select userid, username, password, role from user where username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s",$username);
$stmt->bind_result($userid, $username2, $password2, $role);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows == 1) {
    $stmt->fetch();
    if ($password == $password2){
        echo "login-pass";
        $_SESSION['username'] = $username;
        $_SESSION['islogin'] = 'true';
        echo "<script>location.href='welcome.php'</script>";
    }
    else{
//         echo "password-error";
        echo "login-fail";
        echo "<script>location.href='login.html'</script>";
    }
}
else {
    echo "login-fail";
    echo "<script>location.href='login.html'</script>";
}

// 关闭数据库
$conn->close();
?>