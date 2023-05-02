<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="jquery-3.4.1.min.js"></script>
    <title>文章列表</title>
    <style>
        table {
            width: 800px;
            margin: auto;
            border: solid 1px green;
            border-spacing: 0px;
        }
        td {
            border: solid 1px gray;
            height: 30px;
        }
    </style>
    <script>
        function doDelete(articleid) {
            if (!window.confirm("你确定要删除该文章吗?")) {
                return false;
            }

            $.post('delete.php', 'articleid='+articleid, function(data){
                if (data == 'delete-ok') {
                    window.alert('删除成功');
                    // location.href = "list.php";
                    location.reload();  // 刷新当前页面
                }
                else {
                    window.alert('删除失败' + data);
                }
            });
        }
    </script>
</head>
<body>
    <table>
        <tr>
            <td>编号</td>
            <td>作者</td>
            <td>标题</td>
            <td>次数</td>
            <td>时间</td>
            <td>操作</td>
        </tr>

    <?php

    include "common.php";
//     session_start();  common.php中已经获取了session,无需重复获取
    if (!isset($_SESSION['islogin']) || $_SESSION['islogin'] != 'true') {
        die ("请先登录,<a href='login.html'>点此登录</a>");
    }

    $conn = create_connection_oop();
//     $conn = mysqli_connect();

    $sql = "select articleid, author, headline, viewcount, createtime from article";
    $result = mysqli_query($conn, $sql);

    // 将数据库查询的结果集中的数据取出，保存到一个数组中
    $rows = mysqli_fetch_all($result);

    // 遍历结果集数据并在表格中展示
    foreach ($rows as $row) {
        echo '<tr>';
        echo '<td>' . $row[0] . '</td>';
        echo '<td>' . $row[1] . '</td>';
        echo '<td><a href="read.php?id=' . $row[0] . '">' . $row[2] . '</a></td>';
        echo '<td>' . $row[3] . '</td>';
        echo '<td>' . $row[4] . '</td>';
        echo '<td><button onclick="doDelete('.$row[0].')">删除</button><button>编辑</button></td>';
        echo '</tr>';
    }

    mysqli_close($conn);
    ?>

    </table>
        
    <br><hr></br>
        
    <div style="width:100%; margin:auto; text-align:center;"><a href="add.php">发表文章</a></div>
        
        
</body>
</html>