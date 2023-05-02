<?php
    
// class Test{
//     public $phone = '';
//     var $ip = '';
// }

// $t = new Test();
// $t ->phone = 'phpinfo();';
// $t ->ip = '127.0.0.1';
// echo serialize($t);


class People{
    var $name = '';
    var $sex = '';
    var $age = 0;
    var $addr = '';
}
$p = new People();
echo serialize($p);