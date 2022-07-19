<?php
	$login = $_POST['login'];
	$password = $_POST['password'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$telephone = $_POST['telephone'];

	$connect = new mysqli ('localhost', 'mysql', 'mysql', 'accounts');
	$sql = "SELECT COUNT(login) FROM accounts WHERE email LIKE '$email'";
	$mysql = $connect->query("$sql");
	$user = $mysql->fetch_assoc();
	foreach ($user as $key => $value) {
			$us = $user[$key];
		}
		
		if ($us == 0) {
				echo ('good');
			} else {
				echo ('не окей');
				exit();
			}
	$sql = "INSERT INTO accounts (login, password, name, email, telephone) VALUES ('$login', '$password', '$name', '$email', '$telephone')";
 	$mysql = $connect->query("$sql");  	
		
		
	$connect->close();

?>