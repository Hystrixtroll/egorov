<?php
	$dblocation="localhost";
	$dbname="egorov";
	$dbuser="root";
	$dbpass="";
	//таблица
	$tbl_maintexts="maintexts";
	$tbl_catalogs="catalogs";
	$tbl_users="users";
	$tbl_accounts="system_accounts";
	$tbl_tovars="tovars";
	$tbl_categories="categories";
	$dbcnx=mysql_connect($dblocation, $dbuser, $dbpassword);
	if(!$dbcnx){
		exit("no connect to server MySql");
	}
	$dbuse=mysql_select_db($dbname, $dbcnx);
		if(!$dbuse){
		exit("no db");
	}
	@mysql_query('SET NAMES "utf8"');