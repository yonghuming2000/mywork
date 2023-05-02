<?php
$conn = mysqli_connect('127.0.0.1', 'root', '123456', 'white') or die("数据库未连接成功。");
mysqli_query($conn, "set names utf8");
$da = date('Y.m.d H.i.s');
// $dd = date("Y-m-d",strtotime("-1 day"));
// $dd = date("Y-m-d",strtotime("today"));
// $dd = mktime(23,59,59,date('m'),date('t'),date('Y'));
echo $da."<br>";
echo time();
// 批量新增列名
// for ($i=1;$i<=255;$i++){
//     $sql = "alter table rankLog add column `".$i."` decimal(6,2) UNSIGNED zerofill null ";
//     mysqli_query($conn, $sql);
// }
// ALTER TABLE `rankLog`
// ADD COLUMN `2`  varchar(10) NULL AFTER `1`;

// 记录第一天的所有用户分数
// for ($i=1; $i<=5; $i++){
//     $sql = "select score from secureRank where uid=$i ";
//     // $i = (string)$i;
//     $result = mysqli_query($conn, $sql);
//     $sco = mysqli_fetch_assoc($result)['score'];
//     $sql = "update rankLog set `".$i."`=".$sco." where dayid=1";
//     mysqli_query($conn, $sql);
// }
// $sql = "update rankLog set `3`=400 where dayid=1 ";
// mysqli_query($conn, $sql);

// $sql = "select dayid from rankLog order by dayid desc limit 1 ";
// $result = mysqli_query($conn, $sql);
// $sco = mysqli_fetch_assoc($result)['dayid'] + 2;
// echo $sco;

// $day = 3;
// $sql = "insert into rankLog(dayid, uptime, date) values('$day', now(), '$da')";
// $conn->query($sql) or die('add-fail');

// $d = -1;
// $day = date("Y.m.d",strtotime("$d day"));
// $sql = "select date from rankLog order by dayid desc limit 1";
// $result = mysqli_query($conn, $sql);
// $y = mysqli_fetch_assoc($result)['date'];
// echo $y;
// echo $day;
// if ($day==$y){
//     $d = $d+1;
//     $day = date("Y.m.d",strtotime("$d day"));
//     echo "====";
// }

// for ($i=-1;$i>=-100;$i--){
//     $da = date("Y-m-d",strtotime("$i day"));
//     $sql = "select dayid from rankLog order by dayid desc limit 1 ";
//     $result = mysqli_query($conn, $sql);
//     $y = mysqli_fetch_assoc($result)['dayid'];
//     $sql = "select date from rankLog order by dayid desc limit 1";
// } 