<?php session_start();
require_once("config/config.php");
require_once("config/class.config.php");
?>
<!doctype html>
<html>
	<head>
		<title>Крутой сайт</title>
		<meta charset="utf-8">
		<meta name="description" content="Главная страница">
		<meta name="keywords" content="главная, страница, крутого, сайта">
		<link rel="stylesheet" type="text/css" href="media/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="media/css/style.css"/>
		<script src="media/js/jquery-1.11.2.min.js"></script>
		<script> $(function(){
			$('.topmenu a:eq(0)').bind('mouseover',
			function(){
				$('#header').css({
					'background':'green'
				});
			})
			$('.topmenu').bind('mouseout',
			function(){
				$('#header').css({
					'background':'url(media/img/gezekr46.gif)'
				});
			})
		});
		</script>
	</head>
	<body>
		<div id="header">
			<img src="media/img/logo.png" class="logo"/>
			<div class="logotext">
<?php
	if ($_SESSION['id_user_position']){
?>
		<a href="cabinet.php">Кабинет пользователя</a>
		<a href="log_out.php">Выход</a>
<?php
	}else{
?>
		<a href="auth.php">Вход</a>
		<a href="reg.php">Регистрация</a>
<?php
	}
?>
			</div>
		</div>
		<div class="topmenu">
			<a href="index.php?url=index">Главная</a>
			<a href="index.php?url=services">Услуги</a>
			<a href="index.php?url=about">О компании</a>
			<a href="index.php?url=job">Вакансии</a>
			<a href="index.php?url=contacts">Контакты</a>
		</div>
		<div>
			<div class="col-md-2">
				<div class="menu">
					<?php
					$query="select * from $tbl_categories where showhide='show'";

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