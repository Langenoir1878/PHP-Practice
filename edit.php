<?php
/**
 * User: ln1878
 * Date: 10/08/2015
 * Time: 14:30 pm
 * @ Galvin Library 2 FL
 *
 * Revised Time: Oct 13, 19:58:08
 * Revised Place: 3001-718 Chicago
 */
require_once 'Note.php';
require_once 'FileNoteRepository.php';

$noteRepo = new \yzhan214\as2\FileNoteRepository();

?>

<?php if($_SERVER['REQUEST_METHOD']=='POST' && !empty($_POST['id'])): ?>

<?php
//view.php page
$note = $noteRepo->getNoteById($_POST['id']);
//entering the html sections
?>
<style>
.lay_content {
    background-image: url("bg.png");
    background-size: 1878px 1245px;
    background-color: black;
 	font-style: oblique;
    padding: 20px;
    margin-left: 10px;
    margin-right: 10px;
    margin-top: 10px;
}
.left_side {
	margin-left: 20px;
	width: 98%;
    border:1px solid #00FF00;
}
</style>
<body background = "bg.png">
	<div class="lay_content">
<h1><font color="white"> Update Note</font></h1>
<form method = "post" action = "edit.php">
	<input type = "hidden" name = "noteId" value = "<?php print $_POST['id'];?>">
	<label><font color="white"> Subject: <input type = "text" name="subject_line" value = "<?php print $note->getSubject_line(); ?>"></font></label>
	<br><br>
	<label><font color="white"> Author: <input type = "text" name="author_name" value = "<?php print $note->getAuthor_name(); ?>"></font></label>
	<br><br>
	<label><font color="white"> Note: <input type = "text" name="note_body" value = "<?php print $note->getNote_body(); ?>"></font></label>
	<br><br>
    <?php
    /*
     * add the labels for char_count & date_dynamics below
     */







    ?>

    <input type="submit" value="Save">

</form></div>
</body>




<?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['noteId'])): ?> 

	<?php
	//edit function


	/*
	 * shorten the private vars of note.php for local use
	 */

	//subject_line
	$noteSubject = isset($_POST['subject_line'])?($_POST['subject_line']):'';
	//author_name
	$noteAuthor = isset($_POST['author_name'])?($_POST['author_name']):'';
	//note_body
	$noteText = isset($_POST['note_body'])?($_POST['note_body']):'';

  	/*
  	 * validation * form fields
  	 */
  	$formIsValid = true;
	$subjectErr = '';
	$authorErr = '';

	if (empty($noteSubject)){
	$formIsValid = false;
	$subjectErr = 'Please enter the subject';
	}
	if (empty($noteAuthor)){
	$formIsValid = false;
	$authorErr = 'Please enter the author name';

	}

	?>


<?php if ($formIsValid): ?>
	<?php
	// process valid data and save note update
	$aNote = $noteRepo->getNoteById($_POST['noteId']);
	
	$aNote->setSubject_line($noteSubject);
	$aNote->setAuthor_name($noteAuthor);
	$aNote->setNote_body($noteText);

	//char_count,
	//date_dynamics


	//save obj by calling saveNote func
	$noteRepo->saveNote($aNote);
	?>
 
 	<!DOCTYPE html>
 	<html lang="en">
 	<head>
		<meta charset="UTF-8">
		<title> Web Editor</title>
	</head>
	<body>
		<h1>Note updated</h1>
		<p><a href = "Index.php"> Back to the note dashboard</a></p>
	</body>
 	</html>


<?php else: ?>

	<!DOCTYPE html>
 	<html lang="en">
 	<head>
		<meta charset="UTF-8">
		<title> Web Editor</title>
	</head>
	<body>
		<h1> Edit Note </h1>
		<form action="edit.php" method = "post">
			<input type = "hidden" name = "noteId" value = "<?php print $_POST['noteId'];?>">
			<label><font color = "red">* </font> 
			Subject : <input type = "text" name="subject_line" value ="<?php print $noteSubject; ?>">
			</label><?php print $subjectErr; ?>
			<br>
			<label><font color = "red">* </font> 
			Author name : <input type = "text" name="author_name" value ="<?php print $noteAuthor; ?>">
			</label><?php print $authorErr; ?>
			<br>
    		<label>
			Note : <input type = "text" name="note_body" value ="<?php print $noteText; ?>">
			</label>
			<br>

			<?php
    		/*
     		 * display char_count
     		 * display date
     		 *
     		 */

			?>

    		<input type = "submit" value = "Save">

  		</form>
  	</body>
  	</html>

  <?php endif; ?>

<?php else: ?>
	<!DOCTYPE html>
 	<html lang="en">
 	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
	<title> En? </title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css" title="Style">
</head>
<body>
	<div style="text-align: center">
		<br><br>
	<h1>No Note Selected</h1>
	<br>
	<img src = "no_dino.png">
	<br><br>
	<p><a href = "Index.php"> Back to the Note Dashboard </a></p>
	</body>
 	</html>
<?php endif; ?>







