<?php
/*session_start();*/
require_once("DBConn.php");
session_start();
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$re_password=$_POST['re_password'];
	$address=$_POST['address'];
	$country=$_POST['country'];
	$phone=$_POST['phone'];
	$_SESSION["uname"]=$name;
	if($password==$re_password)
	{
		
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			echo "<script type='text/javascript'>alert('invalid email format.');window.location='signup.html'</script>";
		}
		else if(!(preg_match('/^[0-9]{10}+$/', $phone))){
			echo "<script type='text/javascript'>alert('invalid phone number.');window.location='signup.html'</script>";
		}
		else{
		$sql = "insert into signup values('".$name."','".$email."','".$password."','".$phone."','".$address."','".$country."')";
		if($conn->query($sql) === TRUE){
			echo "<script type='text/javascript'>alert('register successfully.please login to continue');window.location='../homepage.html'</script>";
			/*header("location:signup.html");*/
		}
		else{
			echo "<script type='text/javascript'>alert('user already exists.please try again.');window.location='signup.html'</script>";
		}
		}
	}
	else{
		echo "<script type='text/javascript'>alert('password and re_password dont match.');window.location='signup.html'</script>";
	}
mysqli_close($conn);
session_destroy();
?>