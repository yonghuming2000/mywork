<?php

include "common.php";

if (!isset($_SESSION['islogin']) or $_SESSION['islogin'] != 'true'){
    die ("你还没有登录,无法返回本页面.</br>");
}
echo '欢迎登录安全测试平台';

