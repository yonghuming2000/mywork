<!doctype html>
<html lang="zh-CN">
<head>
    <title>rank</title>
    <meta name="keywords" content="页面关键词" />
    <meta name="description" content="页面描述" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <link rel="stylesheet" href="/static/css/pintuer-2.0.custom.css">
    <script src="/static/js/jquery-3.4.1.js"></script>
    <script src="/static/js/pintuer-2.0.js"></script>
    <style>
        body{
            background:
            linear-gradient(
            rgba(0, 0, 0, 0.3), 
            rgba(0, 0, 0, 0.3)
        ),
        url(/static/img/bg-boy.jpg);
        background-size: cover;
        }
    </style>
</head>
<body>
<div class="tab text-white" id="tabbox" >
      <ul class="nav nav-tabs nav-block nav-inverse effect-hove">
        <li class="active"><a href="javascript:;">Information</a></li>
        <li><a href="javascript:;">Historical</a></li>
        <li><a href="javascript:;">Team</a></li>
        <li><a href="javascript:;">Player</a></li>
      </ul>
      <div class="tab-body">
        <div class="tab-item active">内容一</div>
        <div class="tab-item">内容二</div>
        <div class="tab-item">内容三</div>
        <div class="tab-item">内容四</div>
      </div>
</div>
<script>
    $(function(){
    $('#tabbox').tab({
        'toggle':'#tabbox>ul>li',
        'target':'#tabbox>.tab-body>.tab-item',
    });
    });
</script>  
</body>
</html>