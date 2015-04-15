<?php require_once("templates/top.php");
	$query="SELECT * FROM $tbl_categories WHERE id=".$_GET['id'];
	$adr=mysql_query($query);
	if(!$adr){
		exit($query);
	}
	$text=mysql_fetch_array($adr);
?>
		<h1><?php echo $text["name"];?></h1>
<?php
	$query="SELECT * FROM $tbl_tovars WHERE cat_id=".$_GET['id'];
	$cat=mysql_query($query);
	if(!$cat){
		exit($query);
	}
	while($tovs=mysql_fetch_array($cat)){
		echo "<div class='fon'>
			<a href='#' data=".$tovs['id'].">
			<img src='media/uploads/".$tovs[picturesmall]."'/>
			<div class='name'>
			".$tovs['name']."
			</div>
			</div>";
	}
?>
<script>$(function(){
	var fx={
		'initModal':function(){
			if($('.modal-window').length==0){
				$('<div>').attr('id','jquery-overlay').appendTo('body');
				return $('<div>').addClass('modal-window').appendTo('body');
		}else{
			return $('.modal-window')}
	}
	};
	$('.fon a').bind('click',function(){
		var data=$(this).attr('data');
		modal=fx.initModal();
$('<a>')
	.attr('href','#')
	.addClass('modal-close-btn')
	.html('&times')
	.click(function(event){
		event.preventDefault();
		modal.remove();
		$('#jquery-overlay').remove();
})
.appendTo(modal);
	$.ajax({
		'type':'post',
		'url':'ajax.php',
		'data':'id='+data,
		'success':function(data){
		modal.append(data)
		},
		'error':function(){
		modal.appendTo(msq)
		}
	})
})
});
</script>
<?php require_once("templates/bottom.php");?>