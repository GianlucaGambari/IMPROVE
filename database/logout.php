<?php
	session_start();
	require_once ("connect.php");

	if(isset($_COOKIE['userlogin'])){

			parse_str($_COOKIE['userlogin'], $array);
			$cookie = $array['value'];

			unset($_COOKIE['userlogin']);
			setcookie('userlogin', '', time()-3600, '/');

			$con = db_connection();

			if ($statement_delete_cookie = mysqli_prepare($con, "DELETE FROM cookies WHERE id=?")) {

		    mysqli_stmt_bind_param($statement_delete_cookie, "s", $cookie);
		    mysqli_stmt_execute($statement_delete_cookie);
		    mysqli_stmt_close($statement_delete_cookie);
		    mysqli_close($con);
			}

	}
	if(isset($_SESSION['username_successful']))
		   session_destroy();

		header('Location: ../index.php');

?>
