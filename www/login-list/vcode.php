<?php
session_start();
getCode();

// $type = $_GET['type'];
// if ($type == 'vcode'){
//     getCode();
// }
// elseif ($type == 'test'){
//     echo $_SESSION['vcode'];
// }

function getCode($vlen=4, $width=80, $height=25){
    header("content-type:image/png");
    
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $vcode = substr(str_shuffle($chars), 0, $vlen);
    $_SESSION['vcode'] = $vcode;
//     setcookie("vcode", $vcode, time()+3600*24*30*12);
    
    $image = imagecreate($width,$height);
    $imgColor = imagecolorallocate($image,100,200,200);
    
    $color = imagecolorallocate($image,0,0,0);
    imagestring($image, 5, 20, 5, $vcode, $color);
    
    for($i=0; $i<50; $i++){
        imagesetpixel($image, rand(0,$width), rand(0,$height), $color);
    }
    
    imagepng($image);
    imagedestroy($image);  
}
