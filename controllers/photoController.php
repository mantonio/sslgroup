<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 12/18/13
 * Time: 2:09 PM
 */
session_start();

require_once "models/userModel.php";
require_once "models/viewModel.php";
require_once "models/photoModel.php";
require_once "models/sqlModel.php";

$view = new viewModel();
$sql = new sql();

if(isset($_GET["action"])) {

	$action = $_GET["action"];

}else {

	$action = "loggedout";

}

// ----- HEADER ----- \\
$view->getView("views/headerView.php");

if($action == "loggedout" || $action == "") {
	
	$view->getView("views/loggedoutView.php");

}elseif($action == "register" || $action == "login") {
	$un = $_POST["regUser"];
	$pun = '/^[a-zA-Z0-9]+$/';
	
	$pw = $_POST["regPass"];
	$ppw = '/^[a-zA-Z0-9]+$/';
	
	//$em = $_POST["email"];
	//$pem = '/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/';
	
	if(!preg_match($pun, $un)){
		$view->getView("views/loggedoutView.php");
		echo "Please check input fields and try again";
	}else if(!preg_match($ppw, $pw)){
		$view->getView("views/loggedoutView.php");
		echo "Please check input fields and try again";
	}else{
		$view->getView("views/loggedinView.php");
		$_SESSION["username"] = $_POST["regUser"];
		$sql->add($_POST["regUser"],$_POST["regPass"],$_POST["email"]);
	}
}

