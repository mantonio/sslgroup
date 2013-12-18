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

if(isset($_GET["action"])) {

	$action = $_GET["action"];

}else {

	$action = "loggedout";

}

// ----- HEADER ----- \\
$view->getView("views/headerView.php");

