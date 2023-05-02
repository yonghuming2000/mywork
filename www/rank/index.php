<!doctype html>
<html lang="zh-CN">
<head>
    <title>rank</title>
    <meta name="keywords" content="页面关键词" />
    <meta name="description" content="页面描述" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <link rel="stylesheet" href="/static/css/pintuer-2.0.custom.css">
    <script src="/static/js/jquery-3.4.1.js"></script>
    <script src="/static/js/pintuer-2.0.js"></script>
    <!-- <script>
            function doView(ud){
                window.location.href="/rank/t1.php?id="+ud;
            }
    </script> -->
</head>
<body>
    <h2 class="hr"><span>《Rank》</span><span class="text-main h3">welcome</span></h2>
    <table class="table table-striped width-small align-center center text-main">
        <tr class="text-sub h5"><th>Rank</th><th>Team</th><th>Player</th><th>Score</th><th>More</th></tr>
        <!-- <tr><td>qianxin</td><td>camouflage</td><td>602</td></tr>
        <tr><td>360</td><td>hacktivist</td><td>518</td></tr>
        <tr><td>huorong</td><td>clown</td><td>516</td></tr> -->
    <?php
    // 连接数据库，写入sql语句
    $conn = mysqli_connect('127.0.0.1', 'root', '123456', 'white') or die("数据库未连接成功。");
    mysqli_query($conn, "set names utf8");
    // $conn = new mysqli('localhost', 'root', '123456');
    // if ($conn->connect_error){
    //     die("连接失败：" . $conn->connect_error);
    // }
    // echo "连接成功";

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
    // echo "天差".$d."<br>";

    //天
    while ($d>86400){
        //记录新增一天
        $sql = "select dayid from rankLog order by dayid desc limit 1 ";
        $result = mysqli_query($conn, $sql);
        $dayid = mysqli_fetch_assoc($result)['dayid'] + 1;
        for ($i=-1;$i>=-999;$i--){
            $da = date("Y.m.d",strtotime("$i day"));
            $sql = "select date from rankLog order by dayid desc limit 1";
            $result = mysqli_query($conn, $sql);
            $y = mysqli_fetch_assoc($result)['date'];
            if ($da==$y){
                $i = $i+1;
                $da = date("Y.m.d",strtotime("$i day"));
                break;
            }
        }
        $sql = "insert into rankLog(dayid, uptime, date) values('$dayid', now(), '$da')";
        $conn->query($sql) or die('add-fail');
        // echo "天数：".$dayid."<br>";

        for ($i=1; $i<=255; $i++){
            $sql = "select score from secureRank where uid=$i ";
            $result = mysqli_query($conn, $sql);
            $sco = mysqli_fetch_assoc($result)['score'];
            // echo "用户uid：".$i."<br>";
            // echo "上次分数：".$sco."<br>";
            if ($sco>600){
                $sco = rand(1,10)*0.01 + $sco;
                $sql = "update secureRank set score='$sco' where uid=$i ";
                $result = mysqli_query($conn, $sql);
                $sql = "select score from secureRank where uid=$i ";
                $result = mysqli_query($conn, $sql);
                $sco = mysqli_fetch_assoc($result)['score'];
                // echo "大于600：".$sco."<br>";
                $sql = "update rankLog set `".$i."`=".$sco." where dayid=".$dayid ;
                mysqli_query($conn, $sql);
                continue;
            }
            $sco = rand(1,50)*0.01 + $sco;
            // echo "增后的分数".$sco."<br>";
            $sql = "update secureRank set score='$sco' where uid=$i ";
            mysqli_query($conn, $sql);
            // 记录当天数据
            $sql = "select score from secureRank where uid=$i ";
            $result = mysqli_query($conn, $sql);
            $sco = mysqli_fetch_assoc($result)['score'];
            // echo "记录分数log".$sco."<br>";
            $sql = "update rankLog set `".$i."`=".$sco." where dayid=".$dayid ;
            mysqli_query($conn, $sql);
        }
        $d -= 86400;
        // echo "结束天差".$d."<br>";
        $t1 = $t1 + 86400;
        $sql = "update recordTime set jilutime='$t1', createtime=now() where id=1 ";
        mysqli_query($conn, $sql);
    }

    //月
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
            $result = mysqli_query($conn, $sql);
            //记录幸运分
            $sql = "select score from secureRank where uid=$uid ";
            $result = mysqli_query($conn, $sql);
            $sco = mysqli_fetch_assoc($result)['score'];
            echo "记录分数log".$sco."<br>";
            $sql = "update rankLog set `".$i."`=".$sco." where dayid=".$dayid ;
            mysqli_query($conn, $sql);
        }
        $m -= 2592000;
        $sql = "update recordTime set jilutime='$t', createtime=now() where id=2 ";
        mysqli_query($conn, $sql);
    }

    // 查询排行榜的数据库数据
    $sql = "select team, player, score, uid from secureRank order by score desc";
    $result = mysqli_query($conn, $sql);

    // 将数据库查询的结果集中的数据取出，保存到一个数组中
    $rows = mysqli_fetch_all($result);

    // 遍历结果集数据并在表格中展示
    $i = 1;
    foreach ($rows as $row) {
        echo '<tr>';
        echo '<td>' . $i . '</td>';
        echo '<td>' . $row[0] . '</td>';
        echo '<td>' . $row[1] . '</td>';
        echo '<td>' . $row[2] . '</td>';
        // echo '<td><button onclick="doView('.number_format($row[3]).')">view</button></td>';
        echo '<td><a href="/rank/t1.php?id='.number_format($row[3]).'"><button>view</button></a></td>';
        echo '</tr>';
        $i++;
    }
    mysqli_close($conn);
    ?>
    </table>
</body>
</html>