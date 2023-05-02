<?php
    
//弱类型对比
// var_dump("admin" == 0); //true
// var_dump("1admin" == 1); //true
// var_dump("admin1" == 1); //false
// var_dump("admin1" == 0); //true
// var_dump("0e123456" == "0e4456789"); //true

// Hash缺陷
// var_dump("0e123456789012345678901234567890" === "0"); //false
// var_dump("0e123456789012345678901234567890" == "0"); //true

// $pass = $_GET['password'];
// $password = '0e342768416822451524974117254469';

// if (md5($pass) == $password){
// echo "flag{xx-xx-xxxx-xxx}";
//}
// else {
//     echo "error";
//}

// http://192.168.112.188/security/weaktype.php?password=s1836677006a

//除了使用===进行判断外，PHP5.6以上使用hash_equals()函数比较Hash值

// bool缺陷
// $str = '{"user":true, "pass":true}';
// $data = json_decode($str, true);

// if($data['user'] == 'root' && $data['pass'] == 'myPass'){
//     echo'登陆成功获得flag{xx-ssss-xxoxx}';
// }else{
//     echo'登陆失败！';
//}
// unserialize缺陷
// $str = 'a:2:{s:4:"user";b:1;s:4:"pass";b:1;}';
// $data = unserialize($str);

// if($data['user'] == 'root'&& $data['pass'] == 'myPass'){
//     print_r('登陆成功 获得flag{xx-ssss-xxoxx}');
// }else{
//     print_r('登陆失败！');
//}

//极值比较缺陷
// $a=98869694308861098395599991222222222222;
// $b=98869694308861098395599992999999999999;
// var_dump($a===$b);


// switch比较缺陷
$num = '2woniu';
switch($num){
    case 0:
        echo '000000';
        break;
    case 1:
        echo '111111';
        break;
    case 2:
        echo '222222';
        break;
    case 3:
        echo '333333';
        break;
    default:
        echo "error";
}

// 数字型防sql注入
$source = '123456 and 1=2';
var_dump((int)$source);

//数组比较缺陷
//当使用in_array()或array_search()函数时,如果$strict参数没有设置为true
//则in_array()或array_search()将使用松散来判断$needle是否存在$haystack中
// $array = ['a',0,1,2,'3'];
// var_dump(in_array('abc', $array));
// var_dump(array_search('abc', $array));

error_reporting(0);
$flag="flag{xxxx-2020}";
if (empty($_GET['id'])) {
    show_source(__FILE__);
    die();
} else {
    $a = "www.woniuxy.com";
    $id = $_GET['id'];
    @parse_str($id);
    if($a[0]!='QNKCDZ0'&& md5($a[0])==md5('QNKCDZ0')){
        echo $flag;
    } else {
        exit("no no");
    }
}
// http://192.168.112.188/security/weaktype.php?id=a[0]=s155964671a
