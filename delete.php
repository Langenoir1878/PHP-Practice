<?php
/**
 * User: ln1878
 * Date: 10/07/2015
 * Time: 12:30 pm
 * @ Galvin Library 2 FL
 *
 * Revised Time: Oct 13, 19:43:08
 * Revised Place: 3001-718 Chicago
 */
require_once 'Note.php';
require_once 'FileNoteRepository.php';

$noteRepo = new \yzhan214\as2\FileNoteRepository();

?>

<?php if($_SERVER['REQUEST_METHOD']=='POST' && !empty($_POST['id'])): ?>
<?php
/*
 * if-else control structure to display the delete confirmation page
 *
 */




?>
<?php $noteRepo->deleteNote($_POST['id']); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Delete Note</title>
</head>
<body>
	<h1>Note deleted</h1>
	<p><a href = "Index.php"> Back to the note dashboard</a></p>
</body>
</html>



<?php else: ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> My Note </title>
</head>
<body>
	<h1>No Note Selected</h1>
	<p><a href = "Index.php"> Back to the note dashboard</a></p>
</body>
</html>

<?php endif; ?>












