<?php

// include_once('common.php');
// $conn = create_connection();
$conn = mysqli_connect('127.0.0.1', 'root', '123456', 'white') or die("数据库未连接成功。");
mysqli_query($conn, "set names utf8");

$sql = "select user, score from `rank` order by `score` desc limit 20";
// $sql = "select `userid` from `rank` order by `userid` desc limit 1";
// $sql = "select score, user from rank where score > 10";
$result = mysqli_query($conn, $sql);
// $rows = mysqli_fetch_array($result);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($rows);
// print_r($rows);

// echo ($rows['userid']);
// echo ($rows['user']);
// echo ($rows['score']);
// $rr=null;
// $list=array();
// die($rows['user']);
// die($rows['score']);
// while($rr = mysqli_fetch_array($result)){
//     $list[] = $rr;
//     echo "<br>".$rr['user']."&emsp;".$rr['score'];
    // echo "["."'".$rr['user']."'".","." "."'".$rr['score']."'".","."]".",";
    // echo "{".'"'."name".'"'.":".'"'.$rr['user'].'"'.","." ".'"'."fen".'"'.":".'"'.$rr['score'].'"'."}".","." ";
    // die($rr['user']);
    // die($rr['score']);
// }
// $count=count($list);
// echo ($count);
// print_r($list);
// die($list);
// echo json_encode($list);
mysqli_close($conn);

?>