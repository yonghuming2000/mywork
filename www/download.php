<?php
    
// // 获取前端请求的文件名
// $file_path = $_GET['filename'];
// // 设置响应头为附件下载而非内容读取
// Header("Content-type: application/octet-stream");
// Header("Content-Disposti/on: attachment; filename=".basename($file_path));
// // 向页面输出文件内容
// echo file_get_contents($file_path);


$file_path = "upload/[$_GET['filename']}";
if(!file_exists($file_path)){
    die（“你要下载的文件不存在，请重新下载“)；
1
$fp = fopen($file_path, "rb");
$file_size = filesize($file_path);

//下载文件需要用到的头
// ob_clean()；//输出前一定要clean一下,否则图片打不开
Header("Content-type: application/octet-stream");
Header("Accept-Ranges: bytes");
Header("Accept-Length:".$file_size);
Header("Content-Disposition: attachment; filename=".basename($file_path));

//循环读取文件流，然后返回到浏览器feof确认是否到EOF
$buffer = 1024;
$file_count = 0;
while(!feof($fp) && $file_count<$file_size){
    $file_con = fread($fp,$buffer);
    $file_count += $buffer;
    echo $file_conn;
}
fclose($fp);
