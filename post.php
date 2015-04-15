<?php require_once("templates/top.php");
	$name=new field_text('name', 'Название', true, $_POST['name']);
	$name->size = 28;
	$body=new field_textarea('textarea', 'Текст', true, $_POST['textarea']);

	$form=new form(array('name'=>$name,
						'textarea'=>$body),
						'Запостить',
						'field');
	if($_POST){
		$error=$form->check();

	$query="SELECT COUNT(*) FROM
		$tbl_maintexts WHERE name=
		'{$form->fields['name']->value}'";
	$usr=mysql_query($query);

	if(!$usr){
		exit($query);
	}

	if(!$error){
		$query="INSERT INTO $tbl_maintexts
		VALUES (NULL,
		'{$form->fields['name']->value}',
		'{$form->fields['body']->value}',
		NOW(),
		NOW(),
		'unblock')";
	$cat=mysql_query($query);
	if(!$cat){
		exit($query);
	}
?>

				<script>
				document.location.href='index.php';
				</script>

<?php
		}
		if($error) {
			foreach ($error as $err) {
				echo "<span style='color:red'>";
				echo $err;
				echo "</span><br/>";
			}
		}
}

$form->print_form();
require_once("templates/bottom.php");