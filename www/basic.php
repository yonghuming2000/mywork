<?php

//字符串
// $source = "HelloHacker";
// echo serialize($source);   //序列化字符串

//数组
// $source = array("xian","chengdu","shanghai");
// echo serialize($source);   //序列化数组成字符串

// $source = 'a:3:{i:0;s:4:"xian";i:1;s:7:"chengdu";i:2;s:8:"shanghai";}';
// $array = unserialize($source);   //反序列化字符串成数组
// var_dump($array);

//对象
class People {
    var $name = '';
    var $sex = '';
    var $age = 0;
    var $addr = '';
    
    //魔术方法：__construct，是指类在实例化的时候会，自动调用
    function __construct($name='张三',$sex='男',$age=30,$addr='成都高新区'){   //构建对象时被调用
        $this->name = $name;
        $this->sex = $sex;
        $this->age = $age;
        $this->addr = $addr;
        echo"正在初始化.<br/>";
    }
    //魔术方法：__destruct，代码运行结束时，类的实例化从内存中释放时，自动调用
    function __destruct() {   //明确销毁对象或脚本结束时被调用
        echo"正在释放资源。<br/>";
    }
    //魔术方法：__sleep，在类实例被序列化时，自动调用
    function __sleep() {   //当使用serlalize时被调用，当你不需要保存大对象的所用数据时很有用
        echo"正在序列化.<br/>";
        // 返回一个由序列化类的属性名构成的数组
        return array('name','sex','age','addr');   //无此魔术方法会将所有类属性序列化，O代表对象，长度，属性个数
    }
    //魔术方法，__wakeup，在字符串被反序列化成对象时，自动调用
    //反序列化时不自动调用__construct，同时，调用完__wakeup后，仍然会调用__destruct
    function __wakeup() {   //当使用unserlalize时被调用，可用于做些对象化的初始化操作
        echo"正在被反序列化.<br/>";
    }
    function getName() {
        echo $this->name . "<br/>";
    }
}

//序列化，手动创建实例
// $p1 = new People();    //因为__construct的参数有默认值，所以实例化的时候可以不用给定参数值
// echo $p1->name . "<br/>";
// $p1->getName() . "<br/>";
// echo serialize($p1) . "<br/>";   //序列化
                       
//反序列化，自动创建实例，存在漏洞，因为用户可控，字符串变成对象
$source='O:6:"People":4:{s:4:"name";s:9:"张三峰";s:3:"sex";s:3:"男";s:3:"age";i:30;s:4:"addr";s:15:"成都高新区";}';
// $source = $_POST['source'];
$p2 = unserialize($source);    //反序列化，自动实例化People
$p2->getName();



//对象
class Test {
    public $phone = '18812345678';
    var $ip = '127.0.0.1';
    
    public function __wakeup(){   //自动调用要运行的方法(函数)
        $this->getPhone();
    }
    
    public function __destruct(){   //自动调用要运行的方法(函数)
        echo $this->getip();
    }
    
    public function getPhone() {
//         echo $this->phone;   //注意$的this，无$的phone
        @eval($this->phone);   //执行系统命令，用户完全可控
    }
    
    public function getip() {
        echo $this->ip;
    }
}

// $t = new Test();
// echo serialize($t);    // O:4:"Test":2:{s:5:"phone";s:11:"18812345678";s:2:"ip";s:9:"127.0.0.1";}127.0.0.1

// $source = $_POST['source'];
// $p2 = unserialize($source);