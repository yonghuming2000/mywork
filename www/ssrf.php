<?php
    
// SSRF的利用条件，URL地址可控，后台页面对URL进行正确校验，在页面当中最好有输出
// $url = $_GET['url'];
// $resp = file_get_contents($url);
// echo $resp;
    
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $_GET['url']);
curl_setopt($ch, CURLOPT_HEADER, 0);
$content = curl_exec($ch);
echo $content;
curl_close($ch);

// $url = $_GET['url'];
// // stripos($source, $sub),如果找到了sub,则返回下标0开始的位置
// // 如果没有找到，则返回false,但是 0==false,所以务必使用0===false
// if (stripos($url,'http') === false || stripos($url, 'http') > 0){
//     echo "Error Protocol";
// }
// else {
//     echo "Good Protocol";
// }
