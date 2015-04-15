<?php

  error_reporting(E_ALL & ~E_NOTICE);

  // Устанавливаем соединение с базой данных
  require_once("../../config/config.php");
  // Подключаем блок авторизации
  require_once("../authorize.php");
  // Подключаем классы формы
  require_once("../../config/class.config.dmn.php");
  require_once("../../utils/utils.resizeimg.php");

  if(empty($_POST))
  {
    // Отмечаем флажок hide
    $_REQUEST['hide'] = true;
  }
  try
  {
    $name       = new field_text("name",
                                  "Название",
                                  true,
                                  $_POST['name']);
								  $name->size = 33;
	$body       = new field_textarea("body",
                                  "Содержание",
                                  true,
                                  $_POST['body']);
	$mturl      = new field_text("url",
                                  "url",
                                  true,
                                  $_POST['url']);
								  $mturl->size = 33;
    $hide       = new field_checkbox("hide",
                                      "Отображать",
                                      $_REQUEST['hide']);
    $form = new form(array(
	                       "name" => $name,
                           "body" => $body,
						   "url" => $mturl,
                           "hide" => $hide),
                     "Добавить",
                     "field");

    // Обработчик HTML-формы
    if(!empty($_POST))
    {
		$error=$form->check();
		if(!$error){
			if($form->fields['hide']->value){
				$showhide="show";
			}else{
				$showhide="hide";
			}
			$query="INSERT INTO $tbl_maintext VALUES(NULL,
												'{$form->fields['name']->value}',
												'{$form->fields['body']->value}',
												'{$form->fields['url']->value}',
												'ru',
												'$showhide',
												NOW())";
	$cat=mysql_query($query);
		if(!$cat){
			exit($query);
		}?>
		<script>document.location.href='index.php';</script>
		<?
    }
	}
    // Начало страницы
    $title     = 'Добавление статьи';
    $pageinfo  = '<p class=help></p>';
    // Включаем заголовок страницы
    require_once("../utils/top.php");
?>
<div align=left>
<FORM>
<INPUT class="button" TYPE="button" VALUE="На предыдущую страницу"
onClick="history.back()">
</FORM>
</div>
<?
    // Выводим сообщения об ошибках, если они имеются
    if(!empty($error))
    {
      foreach($error as $err)
      {
        echo "<span style=\"color:red\">$err</span><br>";
      }
    }
?>
<div class="table_user">
<?
    // Выводим HTML-форму
    $form->print_form();
?>
</div>
<?
  }
  catch(ExceptionObject $exc)
  {
    require("../utils/exception_object.php");
  }
  catch(ExceptionMySQL $exc)
  {
    require("../utils/exception_mysql.php");
  }
  catch(ExceptionMember $exc)
  {
    require("../utils/exception_member.php");
  }

  // Включаем завершение страницы
  require_once("../utils/bottom.php");
?>
