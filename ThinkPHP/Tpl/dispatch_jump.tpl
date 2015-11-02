<?php
    if(C('LAYOUT_ON')) {
        echo '{__NOLAYOUT__}';
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="__PUBLIC__/Common/promattpl/style.css" rel='stylesheet' type='text/css' />
<title>跳转提示</title>
<style type="text/css">
.msg{
	margin-top: 220px;
}
.success,.error{
	font-size: 1.6em;
	font-weight: 800px;
	color: green;
    font-family: "SimHei","YouYuan","STLiti";
    padding-left: 35px;
}

.jump {
	margin: 30px 0px;
	padding-left: 35px;
	font-family: "SimHei";
}
</style>
</head>
<body>
<div class="wrap">
<div class="banner">
<div class="msg">
<?php if(isset($message)) {?>

<p class="success"><?php echo($message); ?></p>
<?php }else{?>

<p class="error"><?php echo($error); ?></p>
<?php }?>
<p class="detail"></p>
<p class="jump">
页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo 3; ?></b>
</p>
</div>
</div>
</div>
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>
</body>
</html>
