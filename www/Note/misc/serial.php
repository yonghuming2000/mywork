<?php

// 定义一个数组，并将其序列化

use People as GlobalPeople;

$names = array("李源远","王佳乐","李园翔","刘俊","冉攀","邹松鹤","陈凯","王一清","胡涛");
$serial = serialize($names);
echo $serial;

echo "<p/>";

// 反序列化，将字符串变回数组
$source = 'a:9:{i:0;s:9:"李源远";i:1;s:9:"王佳乐";i:2;s:9:"李园翔";i:3;s:6:"刘俊";i:4;s:6:"冉攀";i:5;s:9:"邹松鹤";i:6;s:6:"陈凯";i:7;s:9:"王一清";i:8;s:6:"胡涛";}';
$array = unserialize($source);
foreach ($array as $item) {
    echo "$item <br/>";
}

echo '<p/>';

// 定义一个关联数组
$student = array('name' => '张二狗', 'sex' => '男', 'age' => 30, 'nation' => '汉', 
                'addr' => '成都', 'degree' => '博士', 'phone' => '18812345678');
$serial = serialize($student);
echo $serial . "<br/>";

$source = 'a:7:{s:4:"name";s:9:"张二狗";s:3:"sex";s:3:"男";s:3:"age";i:30;s:6:"nation";s:3:"汉";s:4:"addr";s:6:"成都";s:6:"degree";s:6:"博士";s:5:"phone";s:11:"18812345678";}';
$array = unserialize($source);
print_r($array);

echo '<p/>';

// 定义一个类，进行序列化
class People {
    var $name = "";
    var $age = 30;
    var $sex = '';

    function talk() {
        echo $this->name . " 正在说话. <br/>";
    }

    function work() {
        echo $this->name . " 正在工作. <br/>";
    }

    // 对象被序列化时，会调用__sleep魔法函数
    function __sleep() {
        echo "对象正在被序列化.<br/>";
        // 序列化时如果存在__sleep，则必须返回要序列化的变量数组
        return array('name', 'age', 'sex');
    }

    // 对象被反序列化时，调用__wakeup魔法函数
    function __wakeup() {
        echo "对象正在被反序列化.<br/>";
    }

    // 如果反序列化时，属性的个数故意设置得更大，则反序列化会报错，从而导致不执行__wakeup，但是会执行__destruct
    function __destruct() {
        echo "析构函数正在执行.<br/>";
    }
}

$p = new People();
$p->name = "张三";
$p->age = 35;
$p->sex = '男性';
$serial = serialize($p);
echo $serial;

// 输出结果为：O:6:"People":3:{s:4:"name";s:6:"张三";s:3:"age";i:35;s:3:"sex";s:6:"男性";}

echo '<p/>';

// 反序列化操作
// class People2 {
//     var $name = "";
//     var $age = 0;
//     var $sex = '';

//     function talk() {
//         echo $this->name . " 正在说话. <br/>";
//     }

//     function work() {
//         echo $this->name . " 正在工作. <br/>";
//     }

//     // 对象被反序列化时，调用__wakeup魔法函数
//     function __wakeup() {
//         echo "对象正在被反序列化.<br/>";
//     }
// }
$p2 = unserialize('O:6:"People":3:{s:4:"name";s:6:"张三";s:3:"age";i:35;s:3:"sex";s:6:"男性";}');
echo $p2->name . "<br/>";

?>