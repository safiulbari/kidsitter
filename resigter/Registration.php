<?php
	$servername = "localhost";
	$username = "dbms";
	$password = "dbms";

	// Create connection
	$con = new mysqli($servername, $username, $password);
	// require_once('./../db_config.php');

	$flag = 0;

	mysqli_select_db($con, 'kidsitter');

	$method = $_POST['Login-method'];
	
	$username = $_POST['user'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$location = $_POST['location'];

	if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}
	#echo $phone;

	$enc_pass = md5($password);

	if($method == 'User'){
		if(!empty($phone)){
			$sql = "INSERT INTO user (username, password, email, phone, address)
			VALUES ('$username', '$enc_pass', '$email', '$phone', '$location')";
			$query = mysqli_query($con, $sql);
			$flag = 1;
		}
		else{
			$sql = "INSERT INTO user (username, password, email, address)
			VALUES ('$username', '$enc_pass', '$email', '$location')";
			$query = mysqli_query($con, $sql);
			$flag = 1;
		}

		if ($flag == 1) {
			
			echo "New record created successfully";
			header('location: ..\login\login.php');

		} else {
			echo "Error: " . $sql . "<br>" . $con->error;
		}
	}

	else if($method == 'Admin'){
		if(!empty($phone)){
			$sql = "INSERT INTO admin (username, password, email, phone, address)
			VALUES ('$username', '$enc_pass', '$email', '$phone', '$location')";
			$query = mysqli_query($con, $sql);
			$flag = 1;
		}
		else{
			$sql = "INSERT INTO admin (username, password, email, address)
			VALUES ('$username', '$enc_pass', '$email', '$location')";
			$query = mysqli_query($con, $sql);
			$flag = 1;
		}

		if ($flag == 1) {
			
			echo "New record created successfully";
			header('location: ..\login\login.php');

		} else {
			echo "Error: " . $sql . "<br>" . $con->error;
		}
	}

	else if($method == 'Baby Sitter'){
		if(!empty($phone)){
			$sql = "INSERT INTO baby_sitter (username, password, email, phone, address)
			VALUES ('$username', '$enc_pass', '$email', '$phone', '$location')";
			$query = mysqli_query($con, $sql);
			$flag = 1;
		}
		else{
			$sql = "INSERT INTO baby_sitter (username, password, email, address)
			VALUES ('$username', '$enc_pass', '$email', '$location')";
			$query = mysqli_query($con, $sql);
			$flag = 1;
		}

		if ($flag == 1) {
			
			echo "New record created successfully";
			header('location: ..\login\login.php');

		} else {
			echo "Error: " . $sql . "<br>" . $con->error;
		}
	}

	else{
		header('location:..\resigter\Registration.php');
	}

	$con->close();
?>