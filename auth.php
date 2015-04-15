<?php require_once("templates/top.php");
require_once("utils/utils.users.php");
	$name=new field_text('name', 'Имя', true, $_POST['name']);
	$name->size = 41;
	$pass=new field_password('pass', 'Пароль', true, $_POST['pass']);

	$form=new form(array('name'=>$name,
						'pass'=>$pass,),
						'Вход',
						'field');
	if($_POST){
		$error=$form->check();
		if(!$error){
			$authed=enter($form->fields['name']->value,
			$form->fields['pass']->value);

			if($authed){ ?>
				<script>
					document.location.href='cabinet.php'
				</script>
			<?php }else{
					$error[]='Логин или пароль неверный';
					if($error) {
						foreach ($error as $err) {
							echo "<span style='color:red'>";
							echo $err;
							echo "</span><br/>";
						}
					}
				}
		}else{
			if($error) {
				foreach ($error as $err) {
					echo "<span style='color:red'>";
					echo $err;
					echo "</span><br/>";
				}
			}
		}
}

$form->print_form();
require_once("templates/bottom.php");