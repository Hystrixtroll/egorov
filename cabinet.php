<?php require_once("templates/top.php");
if($_SESSION ['id_user_position']){
	$query="SELECT * FROM $tbl_users WHERE id=".$_SESSION['id_user_position'];
	$info=mysql_query($query);
	if (!$info){
		exit ($query);
	}
	$userInfo=mysql_fetch_array($info);
	echo "<h1>Личный кабинет пользователя - ".$userInfo['username']."</h1>";
	echo "<h4>Почтовый адрес - ".$userInfo['email']."</h4>";
	echo "<h4>Дата регистрации - ".$userInfo['datered']."</h4>";
	echo "<h4>Время последнего посещения - ".$userInfo['lastvisit']."</h4>";
	}else{
		echo "<span style='color:red'>";
		echo "Ошибка входа";
		echo "</span><br/>";
	}
require_once("templates/bottom.php");