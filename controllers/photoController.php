<?php

session_start();

require_once "models/userModel.php";
require_once "models/viewModel.php";
require_once "models/photoModel.php";
require_once "models/sqlModel.php";
require_once "models/userModel.php";

$view = new viewModel();
$photo = new photoModel();
$sql = new sql();
$userModel = new userModel();


if(isset($_GET["action"])) {
	$action = $_GET["action"];
}else {
	$action = "loggedout";
}

// ----- HEADER ----- \\
$view->getView("views/headerView.php");

if($action == "loggedout" || $action == "") {
	$data = $sql->getUsers();
	$view->getView("views/loggedoutView.php",$data);

}elseif($action == "upload") {

	$photo->submit();

	$view->getView("views/loggedinView.php");

}elseif($action == "register") {

	$un = $_POST["regUser"];
	$pun = '/^[a-zA-Z0-9]+$/';

	$pw = $_POST["regPass"];
	$ppw = '/^[a-zA-Z0-9]+$/';
	
	$data = $sql->getid($un);
	
	//$em = $_POST["email"];
	//$pem = '/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/';
	
	if(!preg_match($pun, $un)){
		$view->getView("views/loggedoutView.php");
		echo "Please check input fields and try again";
	}else if(!preg_match($ppw, $pw)){
		$view->getView("views/loggedoutView.php");
		echo "Please check input fields and try again";
	}else{
		$id = $_POST["userId"];
		$photos["data"] = $photo->getPhotos($id);
		$view->getView("views/loggedinView.php",$data,$photos);
		$_SESSION["username"] = $_POST["regUser"];
		$sql->add($_POST["regUser"],$_POST["regPass"],$_POST["email"]);
	}

}elseif($action == "login") {
	$data = array("username"=>$_POST["username"],
				  "password"=>$_POST["password"]);
	
	$_SESSION["username"] = $_POST["username"];
	$username = $_SESSION["username"];
	$uname = $sql->getid($username);
	
	$test = $userModel->checkUser($data);
	$msg = "Invalid Login";
	
	if($test == 1){
		$id = $_POST["userId"];
		$photos["data"] = $photo->getPhotos($id);
		
		$view->getView("views/loggedinView.php",$uname,$photos);
	}else{
		$view->getView("views/loggedoutView.php");
		echo $msg;
	}
}

if($action == "upload") {
	   
}



