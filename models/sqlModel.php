<?
class sql{
	public function getUsers(){
		$db = new PDO("mysql:hostname=localhost; dbname=PicBlog_Day9", "root","root");
		$st = $db->prepare("select * from users");
		$st->execute();
		$obs = $st->fetchAll();
		return $obs;
	}
	public function getid($username = ''){
		$db = new PDO("mysql:hostname=localhost; dbname=PicBlog_Day9", "root","root");
		$sql = "select * 
				from users 
				where username = :username";
		$st = $db->prepare($sql);
		$st->execute(array(":username"=>$username));
		return $st->fetchAll();
	}
	public function getUsername($userid = ''){
		$db = new PDO("mysql:hostname=localhost; dbname=PicBlog_Day9", "root","root");
		$sql = "select username from users where userid = :userid";
		$st = $db->prepare($sql);
		$st->execute(array(":userid"=>$userid));
		return $st->fetchAll();
	}
	
	public function update($username='',$password='',$userid=''){
		$db = new PDO("mysql:hostname=localhost; dbname=PicBlog_Day9", "root","root");
		$sql = "update users
				set username = :username, 
				password = :password
				where userid = :userid";
		$st = $db->prepare($sql);
		$st->execute(array(":username"=>$username,":password"=>$password,":userid"=>$userid));
	}
	
	public function add($username='',$email='',$password=''){
		$db = new PDO("mysql:hostname=localhost; dbname=PicBlog_Day9", "root","root");
		$sql = "insert into users(username,password,email)
				values(:username,:password,:email)";
		$st = $db->prepare($sql);
		$st->execute(array(":username"=>$username,":password"=>$password,":email"=>$email));
	}
	
	public function delete($userid=''){
		$db = new PDO("mysql:hostname=localhost; dbname=PicBlog_Day9", "root","root");
		$sql = "delete from users
				where userid = $userid";
		$st = $db->prepare($sql);
		$st->execute();
	}
}
?>