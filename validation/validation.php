<?php
	session_start();
	$servername = "localhost";
	$username = "dbms"; #Change User name when You run on another PC
	$password = "dbms"; #Change Password when You run on another PC
	// Create connection
	$con = new mysqli($servername, $username, $password);
	// require_once('./../db_config.php');
	$flag = 0;
	

	mysqli_select_db($con, 'kidsitter');

	if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}
	
	$method = $_POST['Login-method'];
	echo $method;
	if($method == 'User'){
		$name = $_POST['user'];
		$pass = $_POST['password'];
		// echo "input: " . $name . " " . $pass . " " . "<br>";
		$enc_pass = md5($pass);

		$sql = "SELECT username, password FROM user";
		$result = $con->query($sql);
		

		if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			// echo "name: " . $row["username"]. " - password: " . $row["password"]. " ". "<br>";
				if($row["username"] == $name && $row["password"] == $enc_pass){
					$_SESSION['user'] = $row["username"];
					$flag = 1;
					break;
				}
			}
		} 
		if($flag == 1){
			header('location: ..\index\index.php');
			// echo $_SESSION['user'];
		}
		else{
			header('location: ..\login\login.php');
		}
	}
	
	else if($method == 'Admin'){
		$name = $_POST['user'];
		$pass = $_POST['password'];
		// echo "input: " . $name . " " . $pass . " " . "<br>";
		$enc_pass = md5($pass);

		$sql = "SELECT username, password FROM admin";
		$result = $con->query($sql);
		

		if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			// echo "name: " . $row["username"]. " - password: " . $row["password"]. " ". "<br>";
				if($row["username"] == $name && $row["password"] == $enc_pass){
					$_SESSION['user'] = $row["username"];
					$flag = 1;
					break;
				}
			}
		} 
		if($flag == 1){
			header('location: ..\index\index.php');
		}
		else{
			header('location: ..\login\login.php');
		}
	}
	else if($method == 'Baby Sitter'){
		$name = $_POST['user'];
		$pass = $_POST['password'];
		// echo "input: " . $name . " " . $pass . " " . "<br>";
		$enc_pass = md5($pass);

		$sql = "SELECT username, password FROM baby_sitter";
		$result = $con->query($sql);
		

		if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			// echo "name: " . $row["username"]. " - password: " . $row["password"]. " ". "<br>";
				if($row["username"] == $name && $row["password"] == $enc_pass){
					$_SESSION['user'] = $row["username"];
					$flag = 1;
					break;
				}
			}
		} 
		if($flag == 1){
			header('location: ..\index\index.php');
		}
		else{
			header('location: ..\login\login.php');
		}
	}
	else{
		header('location: ..\login\login.php');
	}
	$con->close();
?>
