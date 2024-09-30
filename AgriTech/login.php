<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		include './backend/db.php';
		session_start();
		$name = $_POST['name'];
		$pword = $_POST['pword'];
		$_SESSION['name'] = $name;

		$client_stmt = $db -> query('SELECT * FROM  clients');
		$staff_stmt = $db -> query('SELECT * FROM  staff');

		if(trim($name) && trim($pword) != ""){
			if($_POST['option'] == 'customer'){
				while($record = $client_stmt -> fetch(PDO::FETCH_OBJ)){
					if($record -> client_name == $name && $record -> client_pwd == $pword){
						header('Location: ./user.php');
					}
				}
			}
			else if($_POST['option'] == 'staff'){
				while($record = $staff_stmt -> fetch(PDO::FETCH_OBJ)){
					if($record -> staff_name == $name && $record -> staff_pwd == $pword){
						header('Location: ./staff.php');
					}
				}
			}
			else if($_POST['option'] == 'admin'){
				if($admin_name == $name && $admin_pwd == $pword){
					header('Location: ./admin.php');
					exit();
				}
			}
			else{ header('Location: ./login.php'); }
			
		}
		else{echo "<script type='text/javascript'>alert('Invalid Credentials');</script>";}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AgriTech | Login</title>
	<link rel="stylesheet" href="./css/login.css">
	<link rel="stylesheet" href="./fontawesome-free-6.5.2-web/css/all.css">
	<link rel="icon" href="./images/projectimg3.jpg">
</head>
<body>
   	<nav>
		<a href="./index.php">
			<i class="fa fa-arrow-left"></i>
			<i class="fa fa-home"></i>
			<span>Home</span>
		</a>
	</nav>
	<form method="post" action="login.php">
		<h1>Log In</h1>
		<input name="name" type="name" placeholder="Enter Username">
		<input name="pword" type="password" placeholder="Enter Password">
		<select name="option" id="">
			<option value="" disabled selected>Select an option</option>
			<option value="admin">Admin</option>
			<option value="staff">Staff</option>
			<option value="customer">Customer</option>
		</select>
		<input type="submit" value="Log In">
		<p>Don't have an account? <a href="./register.php">Register</a></p>
	</form>
</body>
</html>