<?php

$username = $_POST['username'];
$password = $_POST['password'];
$vcode = $_POST['vcode'];
$score = $_POST['score'];

// echo $username . '-' . $password . '-' . $vcode;

if ($vcode !== '0000'){
    die("vcode-error");
}
$checkPhone = preg_match("/^1[3-9]\d{9}$/", $password);
if (!$checkPhone){
    die("phone-error");
}


$conn = mysqli_connect('127.0.0.1', 'root', '123456', 'white') or die("数据库未连接成功");
mysqli_set_charset($conn, 'utf8');

$endUserid = "select `userid` from `rank` order by `userid` desc limit 1";
$rows = mysqli_fetch_array(mysqli_query($conn, $endUserid));
$id = ($rows['userid']);

if($username!=="游客"){
    $sqlDelet = "delete from `rank` where `userid`=$id";
    mysqli_query($conn, $sqlDelet);
}
else{
    $username = '游客_'.$id;
}

$sqlRepeated = "select * from rank where user='$username' and phone='$password'";
$result = mysqli_query($conn, $sqlRepeated);

$sqlNew = "insert into `rank`(`user`, `phone`, `score`) values('$username','$password','$score')";
// mysqli_query($conn, $new) or die('login-fail');
// echo 'login-pass';

if(mysqli_num_rows($result) == 1){
    session_start();
    $_SESSION['islogin'] = 'true';
    $user = mysqli_fetch_assoc($result);
    $_SESSION['user'] = $user['user'];
    $_SESSION['phone'] = $user['phone'];
    $xx = "select score from rank where user='$username'";
    $result = mysqli_query($conn, $xx);
    $rows = mysqli_fetch_array($result);
    if($score < $rows[0]){
        die("no-fast");
    }
    $up = "update `rank` set `score`='$score' where(`user`='$username')";
    mysqli_query($conn, $up) or die('login-fail');
    die("login-pass");
}
else {
    mysqli_query($conn, $sqlNew) or die('login-fail');
    die("login-pass");
}

mysqli_close($conn);
?>