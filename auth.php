<?php
	$login = $_POST['login'];
	$password = $_POST['password'];

	$connect = new mysqli ('localhost', 'mysql', 'mysql', 'accounts');
	$sql = "SELECT COUNT(*) FROM accounts WHERE login ='$login' AND password = '$password'";
	$mysql = $connect->query("$sql");
	$user = $mysql->fetch_assoc();

	foreach ($user as $key => $value) {
			$us = $user[$key];
		};
		
		if ($us == 1) {
		    session_start();
				$_SESSION['login'] = $_POST['login'];
				
				echo ('good');

			} else {
				echo ('не окей');

			};
?>