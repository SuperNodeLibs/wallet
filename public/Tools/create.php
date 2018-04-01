<?php
$server = "127.0.0.1";
$user = "root";
$pass = "root";
$data = "wallet";

if(trim($_POST['fild'])&&$_POST['table']){
	$server = $_POST['server'];
	$user = $_POST['acct'];
	$pass = $_POST['pwd'];
	$data = $_POST['data'];
	$nolen = explode(",", strtolower($_POST['nolen']));
	$fild = explode("\n", $_POST['fild']);
	$index = "";
	if($_POST['editable']!="1"){
		$sql = "CREATE TABLE `".$_POST['table']."` (\n";
		for($i = 0; $i<sizeof($fild); $i++){
			if($fild[$i]=="")continue;
			$line = explode("\t", trim($fild[$i]));
			if($i==0) $index = trim($line[0]);
			if(in_array(strtolower(trim($line[1])), $nolen)){
				$sql .= "`".trim($line[0])."` ".trim($line[1])." ".(trim(strtoupper($line[3])) == "Y"?"NOT":"")." NULL ";
				if(trim(strtoupper($line[3])) != "Y" && trim(strtoupper($line[4])) == "")
					$sql .= "DEFAULT NULL";
				else if(trim(strtoupper($line[3])) != "Y" && trim(strtoupper($line[4])) != "")
					$sql .= "DEFAULT '".trim(strtoupper($line[4]))."'";
				$sql .= " COMMENT  '".trim($line[5])."'";
			}else{
				$sql .= "`".trim($line[0])."` ".trim($line[1])."( ".trim($line[2])." ) ".(trim(strtoupper($line[3])) == "Y"?"NOT":"")." NULL ";
				if(trim(strtoupper($line[3])) != "Y" && trim(strtoupper($line[4])) == "")
					$sql .= "DEFAULT NULL";
				else if(trim(strtoupper($line[3])) != "Y" && trim(strtoupper($line[4])) != "")
					$sql .= "DEFAULT '".trim(strtoupper($line[4]))."'";
				$sql .= " COMMENT  '".trim($line[5])."'";
			}
			if($i==0)
				$sql .= " AUTO_INCREMENT ";
			$sql .= ",\n";
		}
		$sql .= "INDEX ( `".$index."` ) \n";
		$sql .= ") DEFAULT CHARSET=utf8;";
	}else{
		$sql = "ALTER TABLE `".$_POST['table']."` \n";
		for($i = 0; $i<sizeof($fild); $i++){
			if($fild[$i]=="")continue;
			$line = explode("\t", trim($fild[$i]));
			if($i==0) $index = trim($line[0]);
			if(in_array(strtolower(trim($line[1])), $nolen)){
				$sql .= "ADD `".trim($line[0])."` ".trim($line[1])." ".(trim(strtoupper($line[3])) == "Y"?"NOT":"")." NULL ";
				if(trim(strtoupper($line[3])) != "Y" && trim(strtoupper($line[4])) == "")
					$sql .= "DEFAULT NULL";
				else if(trim(strtoupper($line[3])) != "Y" && trim(strtoupper($line[4])) != "")
					$sql .= "DEFAULT '".trim(strtoupper($line[4]))."'";
				$sql .= " COMMENT  '".trim($line[5])."'";
			}else{
				$sql .= "ADD  `".trim($line[0])."` ".trim($line[1])."( ".trim($line[2])." ) ".(trim(strtoupper($line[3])) == "Y"?"NOT":"")." NULL ";
				if(trim(strtoupper($line[3])) != "Y" && trim(strtoupper($line[4])) == "")
					$sql .= "DEFAULT NULL";
				else if(trim(strtoupper($line[3])) != "Y" && trim(strtoupper($line[4])) != "")
					$sql .= "DEFAULT '".trim(strtoupper($line[4]))."'";
				$sql .= " COMMENT  '".trim($line[5])."'";
			}$sql .= ",\n";
		}
		$sql = chop(trim($sql));
		$sql = substr($sql, 0, strlen($sql)-1);
		$sql .= " DEFAULT CHARSET=utf8;";		
	}
	echo $sql;
	
	//exit;
	mysql_connect($server, $user, $pass);
	mysql_select_db($data);
	mysql_query("set names 'UTF8'");
	mysql_query($sql);
	mysql_query("ALTER TABLE  `".$_POST['table']."` ADD PRIMARY KEY (  `".$index."` )");
	mysql_close();
	echo "运行完毕！";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>数据表建立</title>
<style type="text/css">
*{
	font-size:12px;
}
#main{
	width:650px;
	height:300px;
	margin:0 auto;
	border:1px solid #000;
	padding:10px;
}
#top{
	height:80px;
}
#specal{
	height:40px;
}
#line{
	padding:10px;
	width:90%;
	height:1px;
	color:#999999;
}
#fun{
	text-align: center;
}
</style>
</head>

<body>
<form method="post">
<div id="main">
<div id="top">
数据库服务器：<input type="text" name="server" value="<? echo $server;?>" size="15" /> 帐号：<input type="text" name="acct" value="<? echo $user;?>" size="15" />密码：
<input type="password" name="pwd" value="<? echo $pass;?>" size="15" />
<p>数据库：<input type="text" name="data" value="<? echo $data;?>" size="15" />
表名：<input type="text" name="table" size="15" />
<input name="editable" type="checkbox" id="editable" value="1" <? if($_POST['editable']) echo "checked='checked'";?> />
修改此表
</div>
<div id="specal">
无须长度字段：<input type="text" name="nolen" value="text,date,datetime,double" size="60" />
*多个采用,号分割
</div>
<div id="field">
数据字段内容：<textarea name="fild" cols="60" rows="10"></textarea>
<hr id="line" />
</div>
<div id="fun">
<input type="submit" name="提交" value="提交" /><input type="reset" name="重置" value="重置" />
</div>
</div>
</form>
</body>
</html>
