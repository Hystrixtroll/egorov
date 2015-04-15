<?php require_once("templates/top.php");
	if($_GET["id"]){
		$file=$_GET["id"];
	}else{
		$file="id";
	}
	$query="select * from $tbl_catalogs where id='$file'";
	$adr=mysql_query($query);
	if(!$adr){
		exit($query);
	}
	$text=mysql_fetch_array($adr);
?>
		<h1><?php echo $text ["name"];?></h1>
		<div class="maintext"><?php echo $text ["body"];?></div>
<?php require_once("templates/bottom.php");?>