<?php

session_start();

#面向过程（早期php调用方式，可兼容）
// function create_connection(){
       #连接到数据库
//     $conn = mysqli_connect('127.0.0.1', 'root', '123456', 'learn') or die("数据库连接不成功.");
       #设置编码格式的两种方式
//     mysqli_query($conn, "set names utf8");  
//     mysqli_set_charset($conn, 'utf8');
//     return $conn;
// }

#面向对象
function create_connection_oop(){
    #连接到数据库
    $conn = new mysqli('127.0.0.1','root','123456','learn') or die("数据库连接不成功");
    #设置编码格式的两种方式
//     $conn->query("set names utf8");
    $conn->set_charset('utf8');
    return $conn;
}

#执行SQL语句
function test_mysqli_opp(){
    #获取连接对象
    $conn = create_connection_oop();
    #定义sql语句
    $sql = "select * from user where userid < 6";
    #调用query方法传sql语句（三要素：1.连接对象，2.方法名，3.sql语句）
    $result = $conn->query($sql);
    #获取结果集行数
//     echo $result->num_rows;
    #获取结果集数组（指定关联数组）
    $rows = $result->fetch_all(MYSQLI_ASSOC);
//     var_dump($rows);
    #遍历结果集数组['获取的key']
    foreach ($rows as $row){
        echo "username: ".$row['username'].", password: ".$row['password']."<br/>";
    };
}

#MySqli预处理功能（面向对象）
function mysqli_prepare_stmt(){
    #连接数据库
    $conn = create_connection_oop();
    #定义sql语句（？在预处理语句中用于代替参数,可防止拼接风险）
//     $sql = "select * from user where username = ? and password = ?";
//     $stmt->bind_param("ss", $username, $password 
//     $sql = "select * from user where userid < ?";  //?在预处理语句中用于代替参数
    $sql = "update user set username=? where userid = ?";
    
    #实例化Prepared Statement预处理对象
    $stmt = $conn->prepare($sql);
    #实例化后需要将参数值进行绑定并在执行时替换，
    #bind_param第一个参数为数据类型，i整数，s字符串，d小数，b二进制
    $stmt->bind_param("si", $username, $userid);
    #给参数赋值
    $username = 'hahaha';
    $userid = 11;
    
    #正式执行SQL语句,如果是更新类的操作，如update, insert, delete,执行后不做其他操作没有问题
    #execute()方法表示布尔类型，表示执行成功与否
//     $stmt->execute();
    #默认情况下，更新类操作会自动提交，但是也可以手工处理
//     $conn->commit();
    
    #如果是针对查询语句呢，单纯只是执行无法取得查询结果的，需要进行结果绑定
    #定义sql语句
    $sql = "select * from user where userid < ?";
    #实例化预处理
    $stmt = $conn->prepare($sql);
    #绑定参数
    $stmt->bind_param("i", $userid);
    #参数赋值
    $userid = 6;
    #要获取查询结果，还需要绑定结果参数 （取决select查询值）
    $stmt->bind_result($userid, $username, $password, $role, $avatar, $createtime);
    #执行正式sql
    $stmt->execute();
    #调用结果并进行处理（存储结果）
    $stmt->store_result();
    #输出行数（两种方式）
    echo $stmt->affected_rows . "<br>";
    echo $stmt->num_rows . "<br>";
    #遍历结果集（输出绑定的变量）
    while ($stmt->fetch()){
        echo $userid, $username, $password, '<br/>';
    }
}


// test_mysqli_opp();
// mysqli_prepare_stmt();