<?php session_start();
require_once("config/config.php");
require_once("config/class.config.php");
?>
<!doctype html>
<html>
	<head>
		<title>������ ����</title>
		<meta charset="utf-8">
		<meta name="description" content="������� ��������">
		<meta name="keywords" content="�������, ��������, �������, �����">
		<link rel="stylesheet" type="text/css" href="media/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="media/css/style.css"/>
	</head>
	<body>
		<div id="header">
			<img src="media/img/logo.png" class="logo"/>
			<div class="logotext">
<?php
	if ($_SESSION['id_user_position']){
?>
		<a href="cabinet.php">������� ������������</a>
		<a href="index.php">�����</a>
<?php
	}else{
?>
		<a href="auth.php">����</a>
		<a href="reg.php">�����������</a>
<?php
	}
?>
			</div>
		</div>
		<div class="topmenu">
			<a href="index.php?url=index">�������</a>
			<a href="index.php?url=services">������</a>
			<a href="index.php?url=about">� ��������</a>
			<a href="index.php?url=job">��������</a>
			<a href="index.php?url=contacts">��������</a>
		</div>
		<div>
			<div class="col-md-2">
				<div class="menu">
					<?php
					$query="select * from $tbl_catalogs where showhide='show'";

					$cat=mysql_query($query);
					if(!$cat){
						exit($query);
					}
					while($tt=mysql_fetch_array($cat))
					{echo"<a class='btn btn-success' href='cat.php?id=".$tt['id']."'>".$tt['name']."</a>";
				}
					?>
				</div>
			</div>
			<div class="col-md-8">