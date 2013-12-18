<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 12/18/13
 * Time: 2:10 PM
 */

	class photoModel {
		function submit() {

			$photo = $_SESSION["photo"];

			function checkUpload($userid, $photoName) {
				if($_SERVER['REQUEST_METHOD'] === 'POST') {

					$db = new PDO("mysql:hostname=localhost;dbname=PicBlog_Day9", "root", "root");

					$sql = "SELECT userid FROM users";

					$st = $db->prepare($sql);
					$st->execute(array(":userid"=>$userid, ":photoName"=>$photoName));

                    if (!is_dir("../images/")) {
					    mkdir("../images/".$userid, 0777);
				    }

					$photo = "images/th_".$_FILES["photo"]["name"];

					$file = $_FILES['photo']['tmp_name'];

					if(file_exists($file)) {

						$imagesizedata = getimagesize($file);

						if ($imagesizedata == false) {

							echo "Please upload a photo";

						}else {

							echo $photo;
						}

					}else {

						//not file

					}

				}
			}

			function imageResize($orgfile, $newfile, $w, $h, $target) {

				if ($w > $h) {
					$percentage = ($target / $w);
				} else {
					$percentage = ($target / $h);
				}

				//gets the new value and applies the percentage, then rounds the value
				$w = round($w * $percentage);
				$h = round($h * $percentage);

				$n = imagecreatefromjpeg($orgfile);
				$ar = getimagesize($orgfile);
				$orgw = $ar[0];
				$orgh = $ar[1];

				$cont = imagecreatetruecolor($w, $h);
				imagecopyresampled($cont,$n,0,0,0,0,$w,$h,$orgw,$orgh);
				imagejpeg($cont,$newfile,100);
				imagedestroy($n);

			}

			//Directory to upload files to
			$uploaddir = "/Applications/MAMP/htdocs/sslgroup/images/";

			//The uploaded file's path and name
			$uploadfile = $uploaddir . basename($_FILES["photo"]["name"]);


			//Check if user file was uploaded successfully and if so, display it
			if(move_uploaded_file($_FILES["photo"]["tmp_name"],$uploadfile)) {

				$image = "images/".$_FILES["photo"]["name"];
				$imageThumb = "images/th_".$_FILES["photo"]["name"];

				$wh = list($width, $height) = getimagesize($image);

				imageResize($image, $imageThumb, $wh[0], $wh[1], 100);

				echo '<img src="',$imageThumb,'" />'.'<br>';

			}else {

				echo "<div class='errorMsg'><div class='warning'>!</div>File not uploaded. Please try again</div>";

			}

			checkUpload($photo);

		}

	}