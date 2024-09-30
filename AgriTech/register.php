<?php
	include './backend/db.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$pword = $_POST['pword'];
		$cpword = $_POST['cpword'];
		if(((trim($name) && trim($email) && trim($pword)) != "") && ($pword == $cpword)){
			if($_POST['option'] == 'customer'){
				$stmt = $db -> prepare('INSERT INTO clients(client_name, client_email, client_pwd) VALUES(:name, :email, :pword)');
				$stmt -> execute(['name' => $name, 'email' => $email, 'pword' => $pword]);
			}
			else if($_POST['option'] == 'staff'){
				$stmt = $db -> prepare('INSERT INTO staff(staff_name, staff_email, staff_pwd) VALUES(:name, :email, :pword)');
				$stmt -> execute(['name' => $name, 'email' => $email, 'pword' => $pword]);
			}
			else{ header('Location: ./login.php'); }

			header('Location: ./login.php');
		}
		else{echo "<script type='text/javascript'>alert('Invalid Credentials');</script>";}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AgriTech | Register</title>
	<link rel="stylesheet" href="./css/login.css">
	<link rel="stylesheet" href="./fontawesome-free-6.5.2-web/css/all.css">
	<link rel="icon" href="./images/projectimg3.jpg">
</head>
<body>
	<style> form{gap: 1%;} </style>
   	<nav>
		<a href="./index.php">
			<i class="fa fa-arrow-left"></i>
			<i class="fa fa-home"></i>
			<span>Home</span>
		</a>
	</nav>
	<form method="POST" action="register.php">
		<h1>Register</h1>
		<input name="name" type="name" placeholder="Enter Username" autocomplete>
		<input name="email" type="email" placeholder="Enter Email" autocomplete>
		<input name="pword" type="password" placeholder="Enter Password" autocomplete>
		<input name="cpword" type="password" placeholder="Confirm Password" autocomplete>
		<select name="option" id="">
			<option value="" disabled selected>Register as:</option>
			<option value="staff">Staff</option>
			<option value="customer">Customer</option>
		</select>
		<input name="submit" type="submit" value="Register">
		<p>Already have an account? <a href="./login.php">Login</a></p>
	</form>
</body>
</html>