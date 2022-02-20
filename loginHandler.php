<?php

session_start();
$errmsg_array = array();
$errflag = false;

    $databaseHost = "localhost";
    $databaseUsername = "root";
    $databasePassword = "";
    $databaseName = "admission2018";

    $conn = new mysqli($databaseHost,$databaseUsername,$databasePassword,$databaseName);
    
if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['pass'];
        
        $password = md5($password);
    if ($email == '') {
            $errmsg_arr[] = 'You must enter your Email';
            $errflag = true;
    }
    if ($password == '') {
            $errmsg_arr[] = 'You must enter your Password';
            $errflag = true;
    }

        $result = $conn->prepare("SELECT * FROM student_data WHERE email=? AND password=?");
        $result->bind_param("ss", $email, $password);
        $result->execute();
        $rows = $result->get_result();
    if ($rows > 0) {
        $_SESSION['email'] = $email;
        //header("Location: ../Online-College-Admission-System-PHP-MySQL/home/index.php");
        header("Location: ./home/index.php");
	}
    else {  
        echo "<script language='javascript'>alert('Email ID/Password not found');
        window.location.href='/Online-College-Admission-System-PHP-MySQL/#login-modal';
         </script>";
    }
        if($errflag) {
            $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
            session_write_close();
            header("location: ../Online-College-Admission-System-PHP-MySQL/");
            exit();
        }    
    }
?>