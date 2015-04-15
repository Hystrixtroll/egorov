<?php
require_once("config/config.php");
$_POST['id']=intval($_POST['id']);
$query="SELECT * FROM $tbl_tovars WHERE id=".$_POST['id'];
$adr=mysql_query($query);
	if(!$adr){
		exit($query);
	}
	$text=mysql_fetch_array($adr);
?>
<img src="media/uploads/<?php echo $text[picturesmall]?>"/>;
<h3><?php echo $text ["name"];?></h3>
<p><?php echo $text ["body"];?></p>