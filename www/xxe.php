<?php
// $xml = $_POST['xmldoc'];
$xml = file_get_contents("php://input");   //直接使用协议读取POST请求的全部内容
$data = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOENT);   //此过程对XML进行解析
// echo $data;
echo '<pre>' . $data . '</pre>';   //原格式输出
