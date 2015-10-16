<?php
/**
 * User: ln1878
 * Date: 10/07/2015
 * Time: 12:30 pm
 * @ Galvin Library 2 FL
 * Revised Time: Oct 12, 20:31:38
 * Revised Place: 3001-718 Chicago
 */

require_once 'Note.php';
require_once 'FileNoteRepository.php';

//Shortend Post variable names if set
$noteSubject = isset($_POST['subject_line']) ? $_POST['subject_line'] : '';
$noteAuthor = isset($_POST['author_name']) ? $_POST['author_name'] : '';
$noteText = isset($_POST['noteText']) ? $_POST['note_body'] : '';



//validation of required form fields
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

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset = "UTF-8">
	<title> Add New Note </title>
</head>

<body>

<?php if($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
	<?php if($formIsValid): ?>

		<?php 
//instantiate the repository and obj
$noteRepo = new \yzhan214\as2\FileNoteRepository();
$note = new \yzhan214\as2\Note();
//set vars
$note->setSubject_line($noteSubject);
$note->setAuthor_name($noteAuthor);
$note->setNote_body($noteText);
//char_count,
//date_dynamics

//save obj by calling saveNote func
$noteRepo->saveNote($note);
	?>
		<h1>New Note Added</h1>
		<p>Subject: <?php print $noteSubject; ?></p><br>
		<p>Author: <?php print $noteAuthor; ?></p><br>
		<p>Note: <?php print $noteText; ?></p><br>
		<?php
    	/*
    	 * display char_count
    	 * display date
     	 *
     	 */

		?>
	
		<p><a href="Index.php">Note Dashboard</a></p>
  
	<?php else: ?>

	<h1>Create New Note</h1>
	<form action = "create.php" method = "post">

	<label><font color = "red">* </font> 
		Subject : <input type = "text" name = "subject_line" value = "<?php print $noteSubject; ?>">
	</label><?php print $subjectErr; ?>
	<br><br>
	<label><font color = "red">* </font> 
		Author name : <input type = "text" name = "author_name" value = "<?php print $noteAuthor; ?>">
	</label><?php print $authorErr; ?>
	<br><br>
    <label>
		Note : <input type = "text" name="note_body" value ="<?php print $noteText; ?>">
	</label>
	<br><br>

	<?php
    /*
     * display char_count
     * display date
     *
     */

	?>

    <input type = "submit" value = "Save">

   </form>
	  <?php endif; ?>
<?php else: ?>
	
	<h1>Create New Note</h1>
	<form action="create.php" method = "POST">
	<p> ( Notice: <font color = "red">* </font> Required )</p>
	<label><font color = "red">* </font> Subject : <input type = "text" name="subject_line"></label>
	<br><br>
	<label><font color = "red">* </font> Author name : <input type = "text" name="author_name"></label>
	<br><br>
    <label> Note : <input type = "text" name="note_body" ></label>
	<br><br>

	<?php
    /*
     * display char_count
     * display date
     *
     */

	?>

    <input type = "submit" value = "Save">
	</form>

<?php endif; ?>

</body>
</html>










