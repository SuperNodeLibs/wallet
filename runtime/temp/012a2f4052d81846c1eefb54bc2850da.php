<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:51:"/home/www/snb_wallet/thinkphp/tpl/dispatch_jump.tpl";i:1511596070;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>跳转提示</title>
    <link rel="stylesheet" href="static/css/bootstrap.min.css?v=<?php echo mt_rand(); ?>" />
		<link rel="stylesheet" href="static/css/bootstrapValidator.min.css?v=<?php echo mt_rand(); ?>" />
		<link rel="stylesheet" href="static/css/digitalstyle.css?v=<?php echo mt_rand(); ?>" />
		<link rel="stylesheet" href="static/css/base.css?v=<?php echo mt_rand(); ?>">
    <style type="text/css">
        *{ padding: 0; margin: 0; }
        body{ background: #fff; font-family: "Microsoft Yahei","Helvetica Neue",Helvetica,Arial,sans-serif; color: #333; font-size: 16px; }
        .system-message{ padding: 24px 48px; }
        .system-message h1{ font-size: 100px; font-weight: normal; line-height: 120px; margin-bottom: 12px; }
        .system-message .jump{ padding-top: 10px; }
        .system-message .jump a{ color: #333; }
        .system-message .success,.system-message .error{ line-height: 1.8em; font-size: 36px; }
        .system-message .detail{ font-size: 12px; line-height: 20px; margin-top: 12px; display: none; }
    </style>
</head>
<body>
<!--Content-->
<section class="container-fluid">
	<div class="container">
		<div class="col-md-5 login_box">
			<h3 class="login_tit"><span class="glyphicon glyphicon-log-in"></span> 
				<?php if($code == '1') echo '操作成功'; else echo '操作失败';?></h3>
			<div class="form-group">
				<i class="login_tips">
						<?php switch ($code) {case 1:?>
            <h1>:)</h1>
            <p class="success"><?php echo(strip_tags($msg));?></p>
            <?php break;case 0:?>
            <h1>:(</h1>
            <p class="error"><?php echo(strip_tags($msg));?></p>
            <?php break;} ?></i>
			</div>
			<p class="jump">
				页面自动
				<a id="href" href="<?php echo($url);?>">跳转</a> 等待时间： <b id="wait"><?php echo($wait);?></b>
			</p>
		</div>
	</div>
</section>
<!--Content end-->
    <script type="text/javascript">
        (function(){
            var wait = document.getElementById('wait'),
                href = document.getElementById('href').href;
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
