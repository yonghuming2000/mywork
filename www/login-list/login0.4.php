<?php

include "common.php";

$username = $_POST['username'];
$password = $_POST['password'];
$vcode = $_POST['vcode'];


if (strtoupper($_SESSION['vcode']) != strtoupper($vcode)){
    if ($vcode !== '0000') {
        die("vcode-error");
    }
}
$_SESSION['vcode'] = ''; //此处设为空，销毁要在else里,否则会报错

// if(strtoupper($_SESSION['vcode']) != strtoupper($vcode)){
//     die("vcode-error");
// }
// else{
//     unset($_SESSION['vcode']);   //销毁session的vcode变量
// //     $_SESSION['vcode'] = '';
// }

// if (strtoupper($_COOKIE['vcode']) != strtoupper($vcode)){
//     die("vcode-error");
// }
    
#基于面向对象和MySQL预处理功能实现SQL注入的防护
$conn = create_connection_oop();

$sql = "select userid, username, password, role, failcount, TIMESTAMPDIFF(MINUTE, lasttime, now()) from user where username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s",$username);   //绑定查询参数
$stmt->bind_result($userid, $username2, $password2, $role, $failcount, $timediff);   //绑定结果参数
$stmt->execute();   //执行
$stmt->store_result();   //调用结果

#获取结果集行数
if ($stmt->num_rows == 1) {  // 表明用户存在
    $stmt->fetch();
    
    #判断密码是否正确之前，先判断登录次数是否受限
    if ($failcount >= 5 && $timediff <= 60){
        die('user-locked');
    }
    if ($password == $password2){
        if($failcount > 0){
            $sql = "update user set failcount=0 where userid=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i",$userid);
            $stmt->execute();
        }
        echo "login-pass";
        $_SESSION['username'] = $username;
        $_SESSION['islogin'] = 'true';
        $_SESSION['role'] = $role;
        echo "<script>location.href='list.php'</script>";
    }
    else{
        $sql = "update user set failcount=failcount+1, lasttime=now() where userid=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i",$userid);
        $stmt->execute();
//         echo "password-error";
        echo "login-fail";
        echo "<script>location.href='login.html'</script>";
    }
}
else {
    echo "user-invalid";
    echo "<script>location.href='login.html'</script>";
}

#关闭数据库
$conn->close();
?>