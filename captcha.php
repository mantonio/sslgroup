<?php
	session_start();
	/**
	 * Matt Antonio
	 * Class: SSL
	 * Assignment: Lab 4
	 * Date: 12/06/13
	 */

	$text = array(
		"aargh",
		"angry",
		"blurb",
		"blimp",
		"drone",
		"drool",
		"jumbo",
		"leaps",
		"naggy",
		"snook"
	);

	$rand = rand(0,9);

	$_SESSION["captchatxt"] = $text[$rand];
	$height = 25;
	$width = 65;

	$image = imagecreate($width, $height);
	$black = imagecolorallocate($image, 0, 0, 0);
	$white = imagecolorallocate($image, 255, 255, 255);
	$font_size = 5;

	imagestring($image, $font_size, 5, 5, $text[$rand], $white);
	imagejpeg($image, null, 80);