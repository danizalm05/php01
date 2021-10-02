<?php
session_start();
include('DB.php');



$errors = array(); 
$_SESSION['success'] = "";

 
// REGISTER USER
if (isset($_POST['reg_user'])) {// Register New user
	
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password_1 = $_POST['password_1'];
	$password_2 = $_POST['password_2'];

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { array_push($errors, "Username is required"); }
	if (empty($email)) { array_push($errors, "Email is required"); }
	if (empty($password_1)) { array_push($errors, "Password is required"); }

	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
	     
    	$password = md5($password_1);//encrypt the password before saving in the database
		$parm=array(':email'=>$email,
		            ':username'=>$username, 
		            ':password'=>$password 
		     );
			 
	    $q='INSERT INTO users  VALUES';  
        $holders = ' (\'\',:email,:username,:password)';    
        $sql = $q. $holders;

        DB::query($sql, $parm);
	 
	    $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
		$_SESSION['success'] = "You are now logged in";
		echo ' <script> location.replace("login.php"); </script> ';
		//header('location:indx.php');
	}

}

 // LOGIN USER
 
if (isset($_POST['login_user'])) {
	
    //include('scanip.php'); 
	$username = $_POST['username'];
	$password = $_POST['password'];
    
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	if (count($errors) == 0) {
		$password = md5($password);
		 
	   $sql="SELECT *  FROM users 
	         WHERE username='$username' AND password='$password'";
        
        $users_raw = DB::query($sql,array());
		   
        $users_counter = count($users_raw); 
	  if ($users_counter == 1) {
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
		    
			
			echo '<script> location.replace("../index.php");</script>';
			 
			 
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

?>