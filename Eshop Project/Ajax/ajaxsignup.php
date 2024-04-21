<?php
include("../connection.php");


	$ufname = mysqli_real_escape_string($connection,$_POST['ufname']);
	$ulname = mysqli_real_escape_string($connection,$_POST['ulname']);
	$uemail = mysqli_real_escape_string($connection,$_POST['uemail']);
	$umobile = mysqli_real_escape_string($connection,$_POST['umobile']);
	$ucountry = mysqli_real_escape_string($connection,$_POST['ucountry']);
	$ustate = mysqli_real_escape_string($connection,$_POST['ustate']);
	$ucity = mysqli_real_escape_string($connection,$_POST['ucity']);
	$pstlcode = mysqli_real_escape_string($connection,$_POST['pstlcode']);
	$uaddress = mysqli_real_escape_string($connection,$_POST['uaddress']);
	$praddress = mysqli_real_escape_string($connection,$_POST['praddress']);
	$upass = mysqli_real_escape_string($connection,$_POST['upass']);
	$cfmpass = mysqli_real_escape_string($connection,$_POST['cfmpass']);

	$sql = "INSERT INTO `signup` (`ufname`,`ulname`,`uemail`,`umobile`,`ucountry`,`ustate`,`ucity`,`pstlcode`,`uaddress`,`praddress`,`upass`,`cfmpass`)VALUES('$ufname','$ulname','$uemail','$umobile','$ucountry','$ustate','$ucity','$pstlcode','$uaddress','$praddress','$upass','$cfmpass')";
	$run = mysqli_query($connection,$sql);
	if($run){
		echo 1;
	}else{
		echo 2;
	}
