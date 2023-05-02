<?php

//直接访问一个URL地址，并输出结果
// $resp = file_get_contents("http://192.168.31.238:8080/login.html");
// echo $resp;


//偏底层
//实例化一个到www.woniunote.com:80的连接，超时时间30秒
// $fp = fsockopen("www.woniunote.com", 80, $errno, $errstr, 30);
// $fp = fsockopen("192.168.31.238", 8080, $errno, $errstr, 30);
// // 拼接HTTP请求头
// $out = "GET /login.html HTTP/1.1\r\n";
// $out .= "Host: 192.168.31.238\r\n";
// $out .= "Connection: Close\r\n\r\n";
// // 将请求头写入$fp实例开始发送
// fwrite($fp, $out);
// // 按行读取响应并输出
// while (!feof($fp)) {
//     echo fgets($fp, 1024);
// }
// fclose($fp);


// 创建一个cURL资源
// $ch = curl_init();
// //设置URL和相应的选项
// curl_setopt($ch, CURLOPT_URL,"http://192.168.31.238:8080/login.html");
// curl_setopt($ch, CURLOPT_HEADER, 1);   //0不输出请求头，1输出请求头
// // 抓取URL并把它传递给浏览器
// curl_exec($ch);
// //关闭cURL资源，并且释放系统资源
// curl_close($ch);


// curl_exec发送PoST请求
$url = 'http://192.168.31.238:8080/login0.4.php';
$data = 'username=woniu&password=123456&vcode=0000';
$ch = curl_init();
// 请求url地址
$params[CURLOPT_URL] = $url;
// 是否返回响应头信息
$params[CURLOPT_HEADER] = true;
$params[CURLOPT_RETURNTRANSFER]=true;//是否将结果返回
$params[CURLOPT_FOLLOWLOCATION]=true;//是否重定向
// 超时时间
$params[CURLOPT_TIMEOUT] = 30;   //超时时间
$params[CURLOPT_POST] = true;   //本次发送POST请求
// 给POST请求正文赋值
$params[CURLOPT_POSTFIELDS] = $data;
$params[CURLOPT_SSL_VERIFYPEER]=false;//请求https时,不验证证书
$params[CURLOPT_SSL_VERIFYHOST]=false;//请求https时,不验证主机
// 传入cur1参数
curl_setopt_array($ch, $params);
// 执行
$content = curl_exec($ch);

//判断是否存在客户端JS重定向
if(stripos($content,'location.href') === false)
    echo $content;
else
    die("ERROR");

echo $content;
// 关闭连接
curl_close($ch);

