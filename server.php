<?php
	session_start();
	$username ="";
	$email ="";
	$errors = array();
	define('DB_SERVER', "localhost");
	define('DB_USER', "root");
	define('DB_PASS', "");
	define('DB_DATABASE', "interview");
	$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
	

// if the register button is clicked
if (isset($_POST['register'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password_1 = $_POST['password_1'];
	$password_2= $_POST['password_2'];
	if (empty($username)) {
		array_push($errors,"Username is required");
	}
	if (empty($email)) {
		
		array_push($errors,"Email is required");

	}
	if (empty($password_1)) {
		
		array_push($errors,"Password is required");

	}
	if ($password_1 != $password_2){
		array_push($errors, "The two password do not match");
	}
	if(!empty($username))
	{
		$getusername = mysqli_query($con, "SELECT * FROM  users WHERE username = '".$username."' ");
		if(mysqli_num_rows($getusername) > 0)
		{
			array_push($errors, "Username already register");		
		}
		
	}
	// if there are no errors,save user to database
	if (count($errors) == 0) {
		$password = md5($password_1); // encrypt before storing in database (security)
		$sql = "INSERT INTO users (username, email, password) 
		VALUES ('$username','$email','$password_1')";
		mysqli_query($con, $sql);
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "You are now logged in";
		header('location: index.php'); // redirect to home page
	}
}

// log user in from login page
if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password= $_POST['password'];	
	
	if (empty($username)) {
		array_push($errors,"Username is required");
	}
	if (empty($password)) {
		
		array_push($errors,"Password is required");

	}
	if (count($errors) == 0 ){
		$password = $password; //encrypt password before comparing with that from database
		$query = "SELECT * FROM users WHERE username='$username'AND password='$password'";
		$result = mysqli_query($con, $query);
		if (mysqli_num_rows($result) == 1){
			//log user in
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location:index.php'); // redirect to home page
		}else {
			array_push($errors, "wrong username/password combination");
			// header('location: login.php')
		}
	}

}

// logout
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header('location: login.php');
}

?>