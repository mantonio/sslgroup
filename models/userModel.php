<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 12/18/13
 * Time: 2:20 PM
 */ 
 
 class userModel{
	 public function checkUser($data){
		$db = new PDO("mysql:hostname=localhost; dbname=PicBlog_Day9","root","root");	
		$q = "select username, password from users
				where username = :username and password = :password";
		$st = $db->prepare($q);
		$st->execute(array(":username"=>$data["username"],":password"=>$data["password"]));
		$st->fetchAll();
		
		$isGood = $st->rowCount();
		if($isGood > 0){
			$_SESSION['is_valid'] = TRUE;
			return 1;
		}else{
			$_SESSION['is_valid'] = FALSE;
			return 0;
		}
	}
 }