<?php
/**
 * Created by YZ-MAC:ln1878
 * Date: 10/12/2015
 * Time: 21:21:21
 * @ 3001-718 Chicago
 * Navigation to a specific note item view
 */
	require_once 'FileNoteRepository.php';
	require_once 'Note.php';
	//instantiate the repo
	$noteRepo = new \yzhan214\as2\FileNoteRepository();

	//temp vars like the demo6
	$noteId = isset($_GET['id'])? $_GET['id']:'';
	$note = $noteRepo->getNoteById($noteId);

?>



<?php if($note): ?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>View<?php print $note->getSubject_line(); ?></title>
	</head>
	<body>
		<p><?php print $note->getSubject_line(); ?></p>
		<p><?php print $note->getAuthor_name(); ?></p>
		<p><?php print $note->getNote_body(); ?></p>
		<p>
			<form action = "edit.php" method = "POST">
				<input type = "hidden" name = "id" value = "<?php print $note->getId();?>">
				<input type = "submit" value = "Edit">
			</form>
		<p>
			<form action = "delete.php" method = "POST">
				<input type = "hidden" name = "id" value = "<?php print $note->getId();?>">
				<input type = "submit" value = "Delete">
			</form>
		</p>
	</body>
	</html>





<?php else: ?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Oops</title>
	</head>
	<body>
		<h1>Note Not Found!</h1>
		<a href = "Index.php"> Back to the Note Dashboard </a>
	</body>
	</html>




<?php endif; ?>

















