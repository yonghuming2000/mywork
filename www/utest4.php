<?php

// 反序列化POP调用链构造二
// 一、PHP目标代码
class start_gg {
    public $mod1;
    public $mod2;
    public function __destruct() {
        $this->mod1->test1()
    }
}
class call {
    public $mod1;
    public $mod2;
    public function test1() {
        Sthis->mod1->test20;
    }
}
class funct {
    public $mod1;
    public $mod2;
    public function __cal1($test2,$arr){
        $s1 = $this->mod1:
        $s1();
    }
}
class func {
    public $mod1;
    public $mod2;
    public function __invoke() {
        $this->mod2 = "hello".$this->mod1;
    }
}
class string1 {
    public $str1;
    public $str2;
    public function __toString(){
        $this->str1->get_flag();
        return "1";
    }
}
class GetFlag {
    public function get_flag() {
        echo "flag:"."2674723647657875436F";
    }
}
$a = $_GET['string'];
unserialize($a);



