<?php
function demo($a, $b){
    echo $a + $b;
    echo "<br/>";
}

class Test {
    static function add($a, $b) {
        echo $a + $b;
        echo "<br/>";
    }
    function __call($name, $args) {
        echo $name . "方法不存在.<br/>";
        var_dump($args) . "<br/>";
    }
}
// 使用 call_user_func 调用
// call_user_func('demo', 100, 200);
// call_user_func(array('Test', 'add'), 1000, 2000);   //php7需要加static,否则报错

// call_user_func_array函数和call_user_func很相似,只是换了一种方式传递参数,让参数的结构更清晰
// call_user_func_array('demo', array(120, 220));
// call_user_func_array(array('Test', 'add'), array(1200, 2200));   //类名，方法名，参数

// 当调用不存在的方法时，__ca11会被触发
$t = new Test();
$t->minus(111,222);
