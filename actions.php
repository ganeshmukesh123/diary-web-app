<?php
include('connection.php');

if(isset($_GET['actions'])){

	$allOK = true;
	$error="";

	if($_GET['actions']=='signup'){
		
		//echo 1;
		if(!$_POST['email']){
			$error="An email address is required.";
		}
		else if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) === false){
			$error = "An email address is invalid.";
		}
		else if(!$_POST['username']){
			$error = "An username is required.";
		}
		else if(!$_POST['password']) {
			$error = "Password is required.";
		}
		if($error!=""){
			echo $error;
			exit();
		}
		else{
			$query = "SELECT * FROM `diary_users` WHERE `email` = '".mysqli_real_escape_string($conn,$_POST['email'])."' LIMIT 1";
			$result = mysqli_query($conn,$query);
			if(mysqli_num_rows($result)>0){
				$allOK=false;
				$error = "Entered email address already exist,please try something else.<br>";
				echo $error;
			}

			$query = "SELECT * FROM `diary_users` WHERE `username` = '".mysqli_real_escape_string($conn,$_POST['username'])."' LIMIT 1";
			$result = mysqli_query($conn,$query);
			if(mysqli_num_rows($result)>0){
				$allOK=false;
				$error = "Entered username already exist,please try something else.";
				echo $error;
			}
			if($allOK){
				$query="INSERT INTO `diary_users` (`email`,`username`,`password`) VALUES('".mysqli_real_escape_string($conn,$_POST['email'])."','".mysqli_real_escape_string($conn,$_POST['username'])."','".mysqli_real_escape_string($conn,$_POST['password'])."')";
				$result=mysqli_query($conn,$query);


				$id=mysqli_insert_id($conn);
				$_SESSION['id']=$id;

				$query="Select * FROM `diary_users` WHERE `user_id`='".$id."'";
				$result=mysqli_query($conn,$query);
				$row=mysqli_fetch_assoc($result);

				$query="UPDATE `diary_users` SET `password`='".md5(md5($id).md5($row['password']))."' WHERE `user_id`='".$id."'";
				//instead of $id we can use $row['user_id']
				$result=mysqli_query($conn,$query);
				echo 1;

			}
		}

	}
	if($_GET['actions']=='login'){
		//echo 0;
		if(!$_POST['username']){
			$error = "An username is required.";
		}
		else if(!$_POST['password']) {
			$error = "Password is required.";
		}
		if($error!=""){
			echo $error;
			exit();
		}
		else{
			$query = "SELECT * FROM `diary_users` WHERE `username` = '".mysqli_real_escape_string($conn,$_POST['username'])."' LIMIT 1";
			$result = mysqli_query($conn,$query);
			$row = mysqli_fetch_assoc($result);
			if($row['password'] == md5(md5($row['user_id']).md5($_POST['password']))){
				$_SESSION['id']=$row['user_id'];
				echo 1;
			}
			else{
				$error = "Incorrect username or password.";
			}
			
		}
	}

	if($_GET['actions']=="updateContent"){
		$query = "UPDATE `diary_users` SET `content`='".trim($_POST['content'])."' WHERE `user_id`='".$_SESSION['id']."'";
		$result = mysqli_query($conn,$query);
		echo 1;
	}
}
if(isset($_GET['function'])){
	if($_GET['function']=='logout'){
		session_unset();
		header('Location: '.'http://localhost:8080/diary-web-app/index.php');
	}
}
?>