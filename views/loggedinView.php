<?php
	require_once "models/photoModel.php";
?>

<div class="wrap">
	<section id="photoUpload">

		<form name="uploadForm" action="upload" method="post" id="uploadForm">

			<input type="hidden" id="userId" value="$id"><br>

			<p>
				<label for="photoTitle">Title:</label>
				<input type="text" name="photoTitle" id="photoTitle">
			</p>

			<p>
				<input type="file" id="uploadPic" name="uploadPic">
			</p>

			<input type="submit" name="uploadBtn" id="uploadBtn">
		</form>
	</section>

	<section id="photoAlbum">
		<?php
			foreach($data as $photo) {
				for($i = 0, $j = count($photo); $i < $j; $i++) {

					$id = $photo[$i]["userId"];
					$pic = $photo[$i][""];
					$title = $photo[$i]["photoTitle"];

					echo "<div class='photoId'>$id</div>";
					echo "<div class='photo'>$pic</div>";
					echo "<div class='photoTitle'>$title</div>";

				}
			}
		?>
	</section>
</div>
