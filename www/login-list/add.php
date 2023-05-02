<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.4.1.min.js"></script>
    <title>发表文章</title>
    <style>
        #outer {
            width: 800px;
            height:600px;
//             border:solid 1px red;
            margin:auto;
        }
        #outer div {
            margin: 20px;
//             border: solid 1px gray;
        }
        #outer div input {
            width: 600px;
        }
        #outer div textarea {
            width: 600px;
            height: 300px;
        }
    </style>
    <script>
        function doAdd(){
            var headline = $("#headline").val();
            var content = $("#content").val();
            var param = "headline=" + headline + "&content=" + content;
//             alert(param);
            $.post("doadd.php",param,function(data){
//                 alert(data);
                if (data == "add-success"){
                    alert("发表文章成功");
                    location.href = 'list.php';
                }
                else{
                    alert("文章发表失败");
                }
            });
        }
    </script>
</head>
<!--确认已登录，前端唯一的php代码,验证身份才可访问的页面-->
<?php
    session_start();
    if (!isset($_SESSION['islogin']) || $_SESSION['islogin'] != 'true') {
        die ("请先登录,<a href='login.html'>点此登录</a>");
    }
?>
<body>
    <div id="outer">
        <div>你的当前用户名：<?=$_SESSION['username']?>，角色为：<?php echo $_SESSION['role']?></div>
        <div>请输入文章标题：<input type="text" id="headline"/></div>
        <div>请输入文章内容：<textarea id="content"></textarea></div>
        <div style="text-align: center;"><button onclick="doAdd()">提交文章</button></div>
    </div>
</body>
</html>