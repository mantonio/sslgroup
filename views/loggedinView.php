<?
foreach($data as $par){ }


?>

<p>Welcome, <?= $par["username"] ?></p>

<section>
	<form name="uploadForm" action="?action=upload" method="post" id="uploadForm">
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
	<div class="photo"></div>
</section>