<?php

$conn = mysqli_connect('localhost', 'root', '1234567', 'white') or die("数据库未连接成功。");

date_default_timezone_set("PRC");
echo date('Y-m-d H:i:s');
echo "<br>";
echo date('d');
echo "<br>";


// 时间戳 1665514800
echo time();
echo "<br>";
$t = time();
// $d = $t - 1354235455;
// $m = $t - 1665514800;
echo $m;
echo "<br>";
// 一天是86400

// while ($m>86400){
//     $sql = "update secureRank set score='$s' where uid=2 "; 

// $s = rand(1,10)*0.01;
// echo $s;

// $s = rand(1,50)*0.01;
// echo $s;
// }

while ($d>86400){
    for ($i=1; $i<=255; $i++){
        $sql = "select score from secureRank where uid=$i ";
        $result = mysqli_query($conn, $sql);
        $sco = mysqli_fetch_assoc($result)['score'];
        if ($sco>600){
            $sco = rand(1,10)*0.01 + $sco;
            $sql = "update secureRank set score='$sco' where uid=$i ";
            continue;
        }
        $sco = rand(1,50)*0.01 + $sco;
        $sql = "update secureRank set score='$sco' where uid=$i ";
        mysqli_query($conn, $sql);
    }
    $d -= 86400;
    $sql = "update recordTime set jilutime='$t', createtime=now() where id=1 ";
    mysqli_query($conn, $sql);
}


// 一个月是2592000

while ($m>2592000){
    for ($i=1; $i<=10; $i++){
        $uid = rand(1,255);
        $sql = "select score from secureRank where uid=$uid ";
        $result = mysqli_query($conn, $sql);
        $sco = mysqli_fetch_assoc($result)['score'];
        if ($sco>600){
            $i--;
            continue;
        }
        $sco = rand(1,10) + $sco;
        $sql = "update secureRank set score='$sco' where uid=$uid ";
        mysqli_query($conn, $sql);
    }
    $m -= 2592000;
    $sql = "update recordTime set jilutime='$t', createtime=now() where id=2 ";
    mysqli_query($conn, $sql);
}

// $conn = mysqli_connect('localhost', 'root', '123456', 'white') or die("数据库未连接成功。");
// $sql = "update recordTime set jilutime='$t', createtime=now() where id=1 ";
// $result = mysqli_query($conn, $sql);
// echo "xx";

// $conn = mysqli_connect('localhost', 'root', '123456', 'white') or die("数据库未连接成功。");
// mysqli_query($conn, "set names utf8");
// $k = rand(1,255);
// $sql = "select score from secureRank where uid=$k ";
// echo $k."<br>";
// $result = mysqli_query($conn, $sql);
// $key = mysqli_fetch_assoc($result)['score'];
// echo $key;
// echo "xxx";
// for ($i=1; $i<6; $i++){
//     echo "<br>";
//     $uid = rand(1,20);
//     if ($uid>10){
//         $i--;
//         continue;
//     }
//     echo $i;
// }

// $m = 8;
// $m -= 5;
// echo $m;