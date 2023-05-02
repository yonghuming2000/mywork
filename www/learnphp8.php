<?php

    // phpinfo();
    /*
        echo 1234;
        print 5678;
    */

    // $a = 'php中文网原创视频';
    // echo $a;

    // $str = "我是欧阳";
    // var_dump($str);
    // echo '<hr>';
    // $str = "$str My name is ou yang";
    // var_dump($str);

    // $arr = array();
    // $arr = array(
    //     'ouyang'=>'欧阳',
    //     '灭绝师太',
    //     '西门大官人'
    // );
    // var_dump($arr);
    // echo '<hr>';
    // echo $arr[1];
    // echo '<hr>';
    // echo $arr['ouyang'];
    // echo '<hr>';
    // // $arr = [
    // //     '欧阳',
    // //     '灭绝师太',
    // //     '西门大官人'
    // // ];
    // // // var_dump($arr);
    // // // echo $arr[2];
    // // print_r($arr);
    // // echo '<hr>';
    // // var_dump($arr); 
    // echo '我的名字叫: ' . $arr['ouyang'] . '。他的名字叫：' . $arr[1];

    // $arr = array(
    //     array(
    //         '欧阳克',
    //         array(
    //             '三维数组',
    //             array(
    //                 '四维数组'
    //             )
    //         )
    //     ),
    //     array(
    //         '灭绝师太'
    //     ),
    //     array(
    //         '西门大官人'
    //     )
    // );
    // print_r($arr);
    // echo '<hr>';
    // var_dump($arr);

    //三维数组案例
    // $arr = [
    //     [
    //         'name'=>'欧阳',
    //         'school'=>'PHP中文网',
    //         'gongfu'=>[
    //             'PHP',
    //             '小程序',
    //             'layui',
    //             'Tinkphp'
    //         ]
    //     ],
    //     [
    //         'name'=>'西门',
    //         'school'=>'PHP中文网',
    //         'gongfu'=>[
    //             'PHP',
    //             'Thinkphp',
    //             'Laravel',
    //             '实战项目'
    //         ]
    //     ],
    //     [
    //         'name'=>'灭绝',
    //         'school'=>'PHP中文网',
    //         'gongfu'=>[
    //             'HTML',
    //             'PHP',
    //             'layui',
    //             'Thinkphp'
    //         ]
    //     ]
    // ];
    // // var_dump($arr);
    // // print_r($arr);
    // echo '我的名字：'.$arr[0]['name'].'，我的学校：'.$arr[0]['school'];
    // echo '我会：'.$arr[0]['gongfu'][0].'.还会：'.$arr[0]['gongfu'][1];

    //数组循环
    // $arr = array(
    //     'ouyang'=>'欧阳',
    //     'ximen'=>'西门',
    //     'miejue'=>'灭绝'
    // );
    // $num =1;
    // foreach($arr as $v){  //理解为$arr取出数组的值零时交给$v
    //     echo $v;
    //     $num = $num +1;
    //     echo $num;
    //     echo '<hr>';
    // }
    // foreach($arr as $k => $v){  //理解为$arr取出数组键$k的值零时交给$v
    //     echo $v .$k;
    //     $num = $num +1;
    //     echo $num;
    //     echo '<hr>';
    // }

    //多维数组循环
    // $arr = [
    //     [
    //         'name' => '欧阳',
    //         'school' => 'PHP中文网'
    //     ],
    //     [
    //         'name' => '西门',
    //         'school' => 'PHP中文网'
    //     ],
    //     [
    //         'name' => '灭绝',
    //         'school' => 'PHP中文网'
    //     ]
    // ];
    // // 方式一
    // // foreach($arr as $k => $v){
    // //     echo $v['name'].$v['school'];
    // //     echo '<hr>';
    // // }
    // // 方式二
    // foreach($arr as $k => $v){
    //     foreach($v as $vv){
    //         echo $vv . $k;
    //         echo '<hr>';
    //     }
    // }

    //三元运算符
    // $ouyang = '蔡徐坤';
    // var_dump( $ouyang ? '我是欧阳克' : '我也不知道我是谁');

    //if..elseif...else
    // $ouyang = '';
    // $miejue = '';
    // $ximen = '西门大官人';

    // if($ouyang){
    //     echo '我是欧阳克';
    // }
    // elseif($miejue){
    //     echo '我是灭绝师太1';
    // }
    // elseif($miejue){
    //     echo '我是灭绝师太2';
    // }
    // elseif($miejue){
    //     echo '我是灭绝师太3';
    // }
    // elseif($miejue){
    //     echo '我是西门大官人';
    // }
    // else {
    //     echo '我不知道我是谁';
    // }

    //switch判断
    // $str = 'ximen';

    // switch($str){
    //     case '欧阳克':
    //         echo'我是欧阳克';
    //         break;
    //     case '灭绝师太':
    //         echo'我是灭绝师太';
    //         break;
    //     case '西门大官人':
    //         echo '我是西门大官人';
    //         break;
    //     default:
    //         echo $str;
    // }

    // //php8新增加的match,安全行高，严格比较
    // echo match($str){
    //     'ouyang' => '欧阳克',
    //     'miejue' => '灭绝师太',
    //     'ximen' => '西门大官人'
    // };

    // //使用isset函数判断
    // if(isset($miejue)){
    //     echo '灭绝师太';
    //     echo '<hr>';
    // }

    // //使用empty函数判断
    // if(empty($miejue)){
    //     echo '灭绝师太2';
    //     echo '<hr>';
    // }

    // //将字符串转化为小写
    // $ouyang = 'OUYANGKE';
    // echo strtolower($ouyang);
    // echo '<hr>';

    // //将字符串转化为大写
    // $miejue = 'miejueshitai';
    // echo strtoupper($miejue);
    // echo '<hr>';

    // //将字符串分割为数组
    // $php = '欧阳克，灭绝师太，西门大官人，天蓬';
    // print_r(explode('，',$php));  //字符串转数组
    // echo '<hr>';

    // //将字符串进行md5加密
    // $ximen = '西门大官人'; //字符串加密
    // echo md5($ximen);
    // echo '<hr>';

    // $arr = [
    //     '欧阳克',
    //     '灭绝师太',
    //     '西门大官人',
    //     '天蓬'
    // ];
    // //数组中元素的数量
    // echo count($arr);
    // echo '<hr>';

    // //把数组元素组合为字符串
    // echo implode('，',$arr);
    // echo '<hr>';

    // //数组中是否存在指定的值
    // echo in_array('天蓬', $arr);
    // echo '<hr>';

    // //删除数组中的最后一个元素
    // array_pop($arr);
    // print_r($arr);


    //自定义函数
    // $num1=90;
    // function num($num1, $num2=20, $num3=30){
    //     global $num1;
    //     return $num1 + $num2 + $num3;
    // }
    
    // echo num(10);

    // function jisuan($a, $b=0, $c=0, $d=0){
    //     echo $a;
    //     echo '<hr/>';
    //     echo $b;
    //     echo '<hr/>';
    //     echo $c;
    //     echo '<hr/>';
    //     echo $d;
    //     echo '<hr/>';
    // }

    // jisuan(10,20,30,40); //php7
    // jisuan(10,20,d:30,c:40); //php8

    //运算符
    // var_dump(120+80);
    // echo '<hr>';
    // var_dump(120-80);
    // echo '<hr>';
    // var_dump(120*80);
    // echo '<hr>';
    // var_dump(120/80);
    // echo '<hr>';
    // var_dump(120%80);
    // echo '<hr>';
    // $num = 120;
    // var_dump($num++);
    // echo '<hr>';
    // var_dump($num--);
    // echo '<hr>';
    // var_dump(++$num);
    // echo '<hr>';
    // var_dump(--$num);
    // echo '<hr>';
    // var_dump(120 . 80);
    // echo '<hr>';

    // $var1 = 'PHP讲师';
    // $var2 = '欧阳';
    // var_dump($var1 . $var2);
    // echo '<hr>';
    // // var_dump($var1.'这是啥');
    // //一个变量连接整型，必须在整型前面增加空格

    // $int = 120;
    // $int .= 30;
    // var_dump($int);
    // echo '<hr>';

    // var_dump(true > false);
    // echo '<hr>';

    // var_dump( true == 'true');
    // echo '<hr>';

    // var_dump( true === 'true');
    // echo '<hr>';

    // var_dump(0 == 'false');
    // echo '<hr>';

    // var_dump( 100 && 30);
    // echo '<hr/>';
    // var_dump(true && true);
    // echo '<hr/>';
    // var_dump(true and false);
    // echo '<hr/>';
    // var_dump(false and false);
    // echo '<hr/>';

    // $a = 100;
    // $b = 30;
    // if($a && $b){
    //     echo '这是真的';
    //     echo '<hr/>';
    // }

    // //xor不一样则为true
    // var_dump( 0 xor 1);
    // echo '<hr/>';
    // var_dump(true xor true);
    // echo '<hr/>';
    // var_dump(true xor false);
    // echo '<hr/>';
    // var_dump(false xor false);
    // echo '<hr/>';
    
    // var_dump( (10 + 20) * 30);


    // $a = 0;
    // if(isset($a)){
    //     echo '这是isset输出';
    // }
    // echo '<hr>';
    // if(empty($a)){
    //     echo '这是empty输出';
    // }

    //循环
    // $int = 1;
    // while($int<1){
    //     $int ++;
    //     echo $int;
    //     echo '<hr>';
    //     echo 'while执行的';
    // }

    // $int = 1;
    // do{
    //     $int++;
    //     echo $int;
    //     echo '<hr>';
    //     echo 'do while 执行的';
    // }while($int<1);

    // $int = 1;
    // for($int;$int<10;$int++){
    //     if($int == 5){
    //         echo '单独输出5，跟别人不一样';
    //         // continue;
    //     }else{
    //         echo $int;
    //     }
    //     echo '<hr>';
    // }

    //JIT
    //返回当前时间戳的毫秒数
    // $start = microtime(true);

    // $total = 0;
    // for ($i=0; $i < 1000000; $i++){
    //     $total += $i;
    // }

    // echo "Count: ".$i.",Total: " . $total ."\n";

    // //返回当前时间戳的微秒数
    // $end = microtime(true);

    // //计算开始到结束，所用时间
    // $spend = floor(($end - $start) * 1000);

    // echo "Time use: " . $spend . " ms\n";


    //MySql数据库-PDO
    // $pdo = new PDO('mysql:host=192.168.31.238;dbname=db6', 'root', '123456');
    // $stmt = $pdo->prepare('select * from student'); //修改和删除必须增加条件，否则会删除所有数据
    // $stmt->execute();
    // $arr = $stmt->fetchAll();
    // var_dump($arr);
    // var_dump($stmt->fetchAll());

    // print_r($_ENV);
    // echo '<hr>';
    // // print_r($_GET);
    // // print_r($_POST);
    // // print_r($_REQUEST);
    // print_r($GLOBALS);
?>
<!-- <html>
    <head>
        <meta charset="utf-8">
        <title>PHP中文网</title>
    </head>
    <body>
        <form action="" method="post">
            讲师：<input type="text" name="name">
            学校：<input type="text" name="school">
            <input type="submit" value="提交">
        </form>
    </body>
</html> -->


<?php
    # 创建类
    class Teacher{
        public $name = '灭绝师太';
        private $school = 'PHP中文网';

    #调用类(实例化)
    // $ouyang = new Teacher();
    // $miejue = new Teacher();
    // $ximen = new Teacher();

    // var_dump($ouyang === $miejue);
    // echo '<hr/>';
    // var_dump($miejue === $ximen);
    // echo '<hr/>';
    // var_dump($ouyang ==  $ximen);

        public function __construct($name, $school){
            $this->name = $name;
            $this->school = $school;
        }

        public function fun1(){
            echo '姓名：灭绝师太，学校：PHP中文网<hr/>';
        }
        public function fun2(){
            return '姓名：灭绝师太，学校：PHP中文网<hr/>';
        }
        public function fun3(){
            //在类中使用伪变量："$this" 引用当前类的成员变量
            return '姓名：'.$this->name.', 学校:'.$this->school.'<hr/>';
        }
        public function  fun4(){
            //在类中使用伪变量："$this" 引用当前类的成员方法
            return $this->fun3();
        }

        //析构方法
        public function __destruct(){
            echo '类执行完毕，要关闭了';
        }
    }

    class PHPTeacher extends Teacher{
        public function fun5(){
            return $this->name;
        }
        public function fun6(){
            return $this->school;
        }
        public function fun4(){
            return '我是被重写的';
        }
    }

    // $ouyang = new Teacher('官人','php中文网');
    // echo $ouyang->name;

    // echo $ouyang->fun4();
    // echo $ouyang->name;

    // $obj = new PHPTeacher('西门大官人','PHP中文网');
    // // echo $obj->fun5();
    // // echo $obj->fun6();
    // echo $obj->fun4();


    //常量
    // define('HOST','127.0.0.1');
    // echo HOST;
    // define('HOST','127');
    // echo HOST;
    // echo '<hr/>';

    // const NAME = 'PHP中文网';
    // echo NAME;
    // const NAME = 'PHP';
    // echo NAME;


    // //命名空间
    // namespace one{
    //     function php(){

    //     }
    // }

    // namespace two{
    //     function php(){
            
    //     }
    // }

    // namespace one;
    // function php(){
    // }

    // namespace two;
    // function php(){
    }

?>