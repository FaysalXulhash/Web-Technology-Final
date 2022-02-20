<?php
@ob_start();
session_start();

// Database Connection
include 'variables.php';
//Register
try
	{
	$conn = new mysqli($databaseHost,$databaseUsername,$databasePassword,$databaseName);
	// User Registeration Page
	if (isset($_POST['addRegister']))
		{
		$fullname = $_POST['fullname'];
		$gender = $_POST['gender'];
		
		$pnumber = $_POST['pnumber'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
		if ($password == $password2)
			{
			$password = md5($password);
			$sql = "INSERT INTO `student_data` VALUES 
				(NULL,'$fullname','$gender','$pnumber','$email','$password')";
			if ($conn->query($sql))
				{
				echo "Registration Successful";
				}
			  else
				{
				echo "An Error Occured Contact SysAdmin";
				}
			}
		}
	}

	catch(Exception $e)
		{
			echo "Connection failed: " . $e->getMessage();
		}
	
	// User Login
	if(isset($_POST['login']))
	{
		$email = $_POST['email'];
		$password = $_POST['pass'];

		if(empty($email) && empty($password))
		{
			// Do Nothing
		}
		else
		{
			$sql = "SELECT FULLNAME,EMAIL,PASSWORD FROM `student_data`";
		}
	}

?>
