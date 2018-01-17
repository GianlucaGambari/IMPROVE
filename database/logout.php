<?php
	session_start();
	if(isset($_COOKIE['userlogin'])){
			//parse_str($_COOKIE['userlogin'], $array);
			unset($_COOKIE['userlogin']);
			setcookie('userlogin', '', time()-3600, '/');

	}
	if(isset($_SESSION['username_successful']))
		   session_destroy();

		header('Location: ../index.php');

?>
