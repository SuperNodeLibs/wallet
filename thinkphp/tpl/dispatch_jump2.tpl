<!--Content-->
<section class="container-fluid">
	<div class="container">
		<div class="col-md-5 login_box">
			<h3 class="login_tit"><span class="glyphicon glyphicon-log-in"></span> 
				<?php if($code == '1') echo '操作成功'; else echo '操作失败';?></h3>
			<div class="form-group">
				<i class="login_tips">
						<?php switch ($code) {?>
            <?php case 1:?>
            <h1>:)</h1>
            <p class="success"><?php echo(strip_tags($msg));?></p>
            <?php break;?>
            <?php case 0:?>
            <h1>:(</h1>
            <p class="error"><?php echo(strip_tags($msg));?></p>
            <?php break;?>
        <?php } ?></i>
			</div>
			<p class="jump">
				页面自动
				<a id="href" href="<?php echo($url);?>">跳转</a> 等待时间： <b id="wait"><?php echo($wait);?></b>
			</p>
		</div>
	</div>
</section>
<!--Content end-->