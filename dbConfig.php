<?php
@ob_start();
session_start();
$path = "../profile_images";
// Database Connection

$databaseHost = "localhost";
$databaseUsername = "root";
$databasePassword = "";
$databaseName = "admission2018";
	
	$conn = new mysqli($databaseHost,$databaseUsername,$databasePassword,$databaseName);
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
	//Register


try
{
$msg = " ";
// User Registeration Page
if (isset($_POST['addRegister']))
	{
	$fullname = $_REQUEST['fullname'];
	$gender = $_REQUEST['gender'];
	$pnumber = $_REQUEST['pnumber'];
	$email = $_REQUEST['email'];
	$password = $_REQUEST['password'];
	$profile_image=$_FILES['profile_image']['tmp_name'];
	$password2 = $_REQUEST['password2'];

	if ($password === $password2){
		$query = $conn->prepare( "SELECT `email` FROM `student_data` WHERE `email` = ?" );			
		$query->bind_param( "s", $email );
		$query->execute();
		if($query->num_rows > 0 ){	
			$msg = "<p style='text-align:center; color:red;'>This Email ID is already registered. Try Login</p>";
			echo $msg;
			exit;
		} else{	
			$password = md5($password);
			$final_save_dir = 'profile_images/';
			move_uploaded_file($_FILES['profile_image']['tmp_name'], $final_save_dir . $_FILES['profile_image']['name']);
			$image = $final_save_dir . $_FILES['profile_image']['name'];

			try {
				$connection = new mysqli($databaseHost,$databaseUsername,$databasePassword,$databaseName);
				$sql = "INSERT INTO student_data VALUES (NULL,?,?,?,?,?,NULL,?,1)";
				$stmt = $connection->prepare($sql);
				$stmt->bind_param("ssssss", $fullname, $gender, $pnumber, $email, $password, $image);
				$update = $stmt->execute();

			} catch (Exception $ex) {echo $ex->getMessage();	}
				
					if ($update){
						$msg = "<p style='text-align:center; color:green;'>Registration Successful. You Can Login now</p>";
					}else{
						$msg = "An Error Occured Contact SysAdmin";
						echo $msg;
						exit;
					}
		}
	} else {
		echo "password not matched";
		exit;
	}
}

}catch(Exception $e){
		$msg =  "Connection failed: " . $e->getMessage();
		echo $msg;
		exit;
	}
?>