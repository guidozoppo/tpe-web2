<?php

require_once './libs/smarty/Smarty.class.php';

class userView
{

	function __construct() {}

	function showLoginSection($message = "") {
		$smarty = new Smarty();
		$smarty->assign('mensaje', $message);
		$smarty->display("./templates/login.tpl");
	}

	function showRegisterSection($message = "") {
		$smarty = new Smarty();
		$smarty->assign('mensaje', $message);
		$smarty->display("./templates/registroUsuario.tpl");
	}

	function showAdminSection() {
		$smarty = new Smarty();
		$smarty->display("./templates/seccionAdministrador.tpl");
	}

	function showUsersSection($users, $message = "") {
		$smarty = new Smarty();
		$smarty->assign('mensaje', $message);
		$smarty->assign('user_smarty', $users);
		$smarty->display("./templates/users.tpl");
	}

	function showUserSection($mail, $administrador) {
		$smarty = new Smarty();
		$smarty->assign('mail_smarty', $mail);
		$smarty->assign('isAdmin', $administrador);
		$smarty->display("./templates/menuUsuario.tpl");
	}
}
