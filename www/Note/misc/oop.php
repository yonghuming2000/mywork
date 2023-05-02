<?php

use People as GlobalPeople;

class People {
    private $name = "ZhangSan";
    var $age = 30;
    var $sex = 'Male';

    function talk() {
        echo $this->name . " is talking. <br/>";
    }

    function work() {
        echo $this->name . " is working. <br/>";
    }

    function setName($name='Unknown') {
        $this->name = $name;
    }

    function getName() {
        return $this->name;
    }

    static function printResult() {
        echo "This is static function. <br/>";
    }

    // 构造函数，实例化的时候调用，也可以强制实例化时传递参数
    function __construct() {
        echo "People is instancing. <br/>";
    }
    
    // 析构函数，在对象使用完成后调用
    function __destruct() {
        echo "People is freezing. <br/>";
    }

    // 当将对象当成字符串处理时调用
    function __toString() {
        // return "People's name is $this->name <br/>";
        return "People is used to String. <br/>";
    }
}

$p = new People('Female');
$p->talk();
$p->setName('LiSi');
echo $p->getName() . '<br/>';
echo $p;

$p->printResult();
People::printResult();  // 静态方法最正常的访问方式

?>