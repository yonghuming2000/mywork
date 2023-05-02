<?php
    $conn = mysqli_connect('localhost', 'root', '123456', 'white') or die("数据库未连接成功。");
    mysqli_query($conn, "set names utf8");

    // 取上次time数据
    $sql = "select jilutime from recordTime where id=1 ";
    $result = mysqli_query($conn, $sql);
    $t1 = mysqli_fetch_assoc($result)['jilutime'];

    $sql = "select jilutime from recordTime where id=2 ";
    $result = mysqli_query($conn, $sql);
    $t2 = mysqli_fetch_assoc($result)['jilutime'];

    $t = time();
    $d = $t - $t1;
    $m = $t - $t2;
    echo "现在时间戳：".$t."<br>";
    echo "天差：".$d."<br>";
    echo "月差：".$m."<br>";

    while ($d>86400){
        for ($i=1; $i<=255; $i++){
            $sql = "select score from secureRank where uid=$i ";
            $result = mysqli_query($conn, $sql);
            $sco = mysqli_fetch_assoc($result)['score'];
            echo $i."为：".$sco."分"."<br>";
            if ($sco>600){
                $sco = rand(1,10)*0.01 + $sco;
                $sql = "update secureRank set score='$sco' where uid=$i ";
                mysqli_query($conn, $sql);
                echo $i."大于600为：".$sco."分"."<br>";
                continue;
            }
            $sco = rand(1,50)*0.01 + $sco;
            echo $i."为：".$sco."分"."<br>";
            $sql = "update secureRank set score='$sco' where uid=$i ";
            mysqli_query($conn, $sql);
        }
        $d -= 86400;
        echo "更改天差为：".$d."秒"."<br>";
        $sql = "update recordTime set jilutime='$t', createtime=now() where id=1 ";
        mysqli_query($conn, $sql);
    }