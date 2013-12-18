<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 12/18/13
 * Time: 2:09 PM
 */

require_once "models/userModel.php";
require_once "models/viewModel.php";
require_once "models/photoModel.php";

$view = new viewModel();
$photo = new photoModel();

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

	$view->getView("views/loggedinView.php");

}elseif($action == "upload") {

	$photo->submit();

}

