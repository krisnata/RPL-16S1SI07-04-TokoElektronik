<?php
session_start();
$sid = session_id();
include "includes/koneksi.php";
include "includes/config.php";

if (isset($_POST["firstname"])) {

	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	$mobile = $_POST['mobile'];
	$address1 = $_POST['address'];
	$address2 = $_POST['province'];
	$name = "/^[a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";

if(empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($repassword) ||
	empty($mobile) || empty($address1) || empty($address2)){
		
		echo"('Please Fill')";
		exit();
	} else {
		if(!preg_match($name,$firstname)){
		 echo"('$firstname is not valid')";
		exit();
	}
	if(!preg_match($name,$lastname)){
		 echo"('$lastname is not valid')";
		exit();
	}
	if(!preg_match($emailValidation,$email)){
		echo"('$email is not valid')";
		exit();
	}
	if(strlen($password) < 9 ){
		echo"('Password is weak')";
		exit();
	}
	if(strlen($repassword) < 9 ){
		echo"('Password is weak')";
		exit();
	}
	if($password != $repassword){
		echo"('Password is not same')";
	}
	if(!preg_match($number,$mobile)){
		echo "<script> alert('mobile number $mobile is not valid'); window.location = '$base_url'+'registermember.php';</script>";
		exit();
	}
	if(!(strlen($mobile) == 12)){
		echo"('mobile number must be 12 digit')";
		exit();
	}
	//existing email address in our database

	$sql = mysql_query("SELECT Id_member FROM tbl_member WHERE email = '$email' LIMIT 1") ;
	
	if(mysql_num_rows($sql) > 0){
		echo "<script> alert('email is used try another email'); window.location = '$base_url'+'registermember.php';</script>";
		exit();
	} else {
		$password = md5($password);
		$sql = "INSERT INTO `tbl_member` 
		(`Id_member`, `username`, `nama_lengkap`, `email`, 
		`password`, `no_telp`, `alamat`, `provinsi`) 
		VALUES (NULL, '$firstname', '$lastname', '$email', 
		'$password', '$mobile', '$address1', '$address2')";
	if (mysql_query($sql)) {
		echo "<script> alert('registration success'); window.location = '$base_url'+'index.php';</script>";
		exit();
	}
	
	}
	
}

}

?>






















































