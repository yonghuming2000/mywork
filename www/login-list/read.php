<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div {
            width: 800px;
            margin: auto;
            height: 40px;
        }
    </style>
</head>
<body>
    <?php
    include "common.php";
    
    //csp安全策略
//     header("Content-Security-Policy: script-src 'self'");
//     header("Content-Security-Policy: script-src 'self' 'unsafe-inline'");
//     header("Content-Security-Policy: script-src 'self' http://192.168.31.207:3000");
    header("Content-Security-Policy: script-src 'self'; report-uri http://192.168.31.238:8080/cspreport.php");

    if (!isset($_SESSION['islogin']) || $_SESSION['islogin'] != 'true') {
        die ("请先登录,<a href='login.html'>点此登录</a>");
    }
//     $id = $_GET['id'];
//     $id = $_POST['id'];
    #屏蔽单引号，减少漏洞注入
    $id = addslashes($_GET['id']);
    $conn = create_connection_oop();

    $sql = "select * from article where articleid='$id'";
    error_reporting(0);
    $result = mysqli_query($conn, $sql) or die("你想干啥");
    
//     echo mysqli_error($conn);
    $article = mysqli_fetch_assoc($result);     // 读取结果集中的第一行数据，并用关联数组展示

    ?>

    <div><?=$article['headline']?></div>
    <div><hr></div>
    <div><?=$article['content']?></div>
</body>
</html>
