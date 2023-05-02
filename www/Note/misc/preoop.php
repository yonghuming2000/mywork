<?php

class People {
    var $name = "张三";

    function talk() {
        global $name;
        echo "$name 正在说话<br/>";
    }

    function work() {
        global $name;
        echo "$name 正在工作<br/>";
    }
}

$p = new People();
$p::talk();
$p->work();

?>