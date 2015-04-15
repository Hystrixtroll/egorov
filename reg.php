<?php require_once("templates/top.php");
	$name=new field_text('name', 'Имя', true, $_POST['name']);
	$name->size = 41;
	$email=new field_text_email('email', 'E-mail', true, $_POST['email']);
	$email->size = 41;
	$pass=new field_password('pass', 'Пароль', true, $_POST['pass']);
	$passconf=new field_password('passconf', 'Повторите пароль', true, $_POST['passconf']);
	$form=new form(array('name'=>$name,
						'email'=>$email,
						'pass'=>$pass,
						'passconf'=>$passconf),
						'Регистрация',
						'field');
	if($_POST){
		$error=$form->check();

	if($form->fields['pass']!=
		$form->fields['passconf']-value){
			$error[]="Пароль не совпадает";
		}

	$query="SELECT COUNT(*) FROM
		$tbl_users WHERE username=
		'{$form->fields['name']->value}'";
	$usr=mysql_query($query);

	if(!$usr){
		exit($query);
	}

	if(mysql_result($usr, 0)){
		$error[]='Такой логин уже существует';
	}

	if(!$error){
		$query="INSERT INTO $tbl_users
		VALUES (NULL,
		'{$form->fields['name']->value}',
		'{$form->fields['pass']->value}',
		'{$form->fields['email']->value}',
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