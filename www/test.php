<?php
// MD5函数用于加密字符串
// $source = 'Hello123';
// echo md5($source);

// addslashes函数添加转义符
// $username = "x' or userid=1#'";
// echo $username . "<br>";
// echo addslashes($username);

// $chars = 'abcdefghigklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
// echo str_shuffle($chars);

// date_default_timezone_set("PRC");
// echo date("Y-m-d H:i:s");

// xss 基础演示代码，从浏览器接受一个URL地址参数，名为content
if (isset($_GET['content'])){
//     $content = $_GET['content'];
    $content = htmlspecialchars($_GET['content']);   //防止xss注入，对用户输入进行字体字符编码的处理
//     echo "你输入的内容是：$content"; //可xss注入
//     echo '你输入的内容是：<input tupe="text" id="content" value="'.$content.'">';  //文本框防xss注入
    echo '你输入的内容是：<input tupe="text" value="'.$content.'" id="content">';  //文本框防xss注入，注释后面部分
//     echo "<a href='$content'>点我有惊喜</a>";
//     echo "<a href='&#106;&#97;&#118;&#97;&#115;&#99;&#114;&#105;&#112;&#116;&#58;&#97;&#108;&#101;&#114;&#116;&#40;&#49;&#50;&#51;&#41;'>点我有惊喜</a>";  //html实体字符编码
}
else{
    echo "请输入URL地址参数content";
}

//获取用户的淘宝账密
// $username = $_POST['username'];
// $password = $_POST['password'];

// // 将数据保存起来，文件或数据库
// echo "<script>document.write('你的用户密码不正确，请重新登录'); setTimeout(function() {location.href='https://www.taobao.com';}, 3000);</script>";