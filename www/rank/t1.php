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
</head>
<body>
  <?php
    $ud = addslashes($_GET['id']);
    $conn = mysqli_connect('127.0.0.1', 'root', '123456', 'white') or die("数据库未连接成功。");
    mysqli_query($conn, "set names utf8");
    $sql = "select player from secureRank where uid =".$ud;
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result)['player'];

    echo '<h2 class="hr"><span>《History》</span><span class="text-main h3">'.$user.'</span></h2>';
  ?>
  <figure>
    <div id="scrollfalls" class="demo-falls width-small center align-center text-main" style="height:600px;overflow-x:hidden;overflow-y:auto;">
      <div class="falls h3 line-big" id="scroll">
        <?php
            $sql = "select date, `".$ud."` from rankLog order by dayid desc";
            $result = mysqli_query($conn, $sql);
            $rows = mysqli_fetch_all($result);
        
            // 遍历结果集数据并在表格中展示
            $i = 0;
            // var_dump($rows);
            // $x = ($rows[1][1]*100 - $rows[2][1]*100)*0.01;
            // echo count($rows);
            foreach ($rows as $row) {
              if ($i%2==1){
                echo '<div class="falls-item alert-info" style="height:50px;">'.$row[0].'</div>';
                if (count($rows)==$i+1){
                  echo '<div class="falls-item alert-info" style="height:50px;">0</div>';
                }else{
                  echo '<div class="falls-item alert-info" style="height:50px;">+'.round($rows[$i][1] - $rows[$i+1][1],2).'</div>';
                }
                echo '<div class="falls-item alert-info" style="height:50px;">'.number_format($row[1],2).'</div>';
              }else{
                echo '<div class="falls-item alert-danger" style="height:50px;">'.$row[0].'</div>';
                if (count($rows)==$i+1){
                  echo '<div class="falls-item alert-danger" style="height:50px;">0</div>';
                }else{
                  echo '<div class="falls-item alert-danger" style="height:50px;">+'.round($rows[$i][1] - $rows[$i+1][1],2).'</div>';
                }
                echo '<div class="falls-item alert-danger" style="height:50px;">'.number_format($row[1],2).'</div>';
              }
              $i++;
            }
        ?>
      </div>
    </div>
    <script>
      $(function(){
        $('#scroll').falls({
          "column":3,
          "list":50,
          "space":0,
          "scroll":"#scrollfalls",
          "none":"到底喽!",
        });
      });
    </script>
    <style>
      .bg-inverse.active{position:fixed;width:100%;top:0;}
    </style>
    <script>
      $(function(){
        $().scroll({
          "target":".bg-inverse",
          "fixed":true,
          "loop":true,
        });
      });
    </script>
      <div class="flex flex-nowrap padding" style="margin:-28% auto">
          <div class=" effect-hover offset-right"><a href="/rank"><img src="/static/img/left.png"></a></div>
          <div class="margin-center-auto "></div>
          <div class=" effect-hover offset-left"><a href="/white"><img src="/static/img/right.png"></a></div>
      </div>
  </figure>
</body>
