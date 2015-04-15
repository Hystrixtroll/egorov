<?php require_once("templates/top.php");?>
<a href="index_en.php ?url=<?php
echo $_GET ['url']?>">English</a>
<?php
	if($_GET["url"]){
		$file=$_GET["url"];
	}else{
		$file="index";
	}
	$query="select * from $tbl_maintexts where url='$file'
	AND lang='ru'";
	$adr=mysql_query($query);
	if(!$adr){
		exit($query);
	}
	$text=mysql_fetch_array($adr);
?>
		<h1><?php echo $text ["name"];?></h1>
		<div class="maintext"><?php echo $text ["body"];?></div>
<?php require_once("templates/bottom.php");?>