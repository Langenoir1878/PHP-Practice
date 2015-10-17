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
$noteText = isset($_POST['note_body']) ? $_POST['note_body'] : '';
//test var to store the strlen of the text body
$count = strlen(htmlspecialchars($noteText));


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

<head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
	<title> Add New Note </title>
	<div style="text-align:left;">
<a href="index.php" class="btn btn-primary btn-lg active" role="button"> <h2> &nbsp;&nbsp; Note Dashboard </h2> </a>
</div>
	<link rel="stylesheet" type="text/css" href="stylesheet.css" title="Style">
	<div class = "lay_content" align = "center" >
		<font color = "#FFFFFF"><h1>Create Something Awesome</h1></font>
	</div>


</head>

<body background = "bg.png">

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
$note->setChar_count($count);
//date_dynamics

//save obj by calling saveNote func
$noteRepo->saveNote($note);
	?>
	
	<div style="text-align: center;">

		<br><br><br>
		<h1><font color="#00FF00"> - New Note Added - </font></h1>
		<br>
		<p>Subject: <?php print $noteSubject; ?></p><br>
		<p>Author: <?php print $noteAuthor; ?></p><br>
		<p>Note: <?php print $noteText; ?></p><br>
		
		<?php
    	/*
    	 * display char_count in html:
    	 * <p>Char_count <?php print $char_count; ?></p><br>
     	 */

		?>
		
		<p><font color="red">Total characters: <?php print $count; ?></font></p><br>
	</div>

		
		
  
	<?php else: ?>

	<div class="left_side">
	<h1> &nbsp;&nbsp; Create New Note</h1>
	<form action = "create.php" method = "post">

	<label><font color = "red">&nbsp;&nbsp; * </font> 
		Subject : <input type = "text" name = "subject_line" value = "<?php print $noteSubject; ?>">
	</label><?php print $subjectErr; ?>
	<br>
	<label><font color = "red">&nbsp;&nbsp; * </font> 
		Author name : <input type = "text" name = "author_name" value = "<?php print $noteAuthor; ?>">
	</label><?php print $authorErr; ?>
	<br>
    <label>
		
		<p> &nbsp;&nbsp;&nbsp;&nbsp; <textarea name="note_body" value ="<?php print $noteText; ?>"></textarea></p>
	</label>
	<br><br>
	<label>
		&nbsp;&nbsp; Total characters: <?php print $count; ?>
	</label>
	<br><br>

	<?php
    /*
     * display char_count
     * display date
     *
     */

	?>

    &nbsp;&nbsp;&nbsp;&nbsp; <input type = "submit" value = "Save">
</div>
   </form>
	  <?php endif; ?>
<?php else: ?>
	<div class="left_side">
		<br><br>
	<h1>&nbsp;&nbsp; Create New Note</h1>
	<form action="create.php" method = "POST">
	<p> &nbsp;&nbsp;&nbsp;( Notice: <font color = "red">* </font> Required )</p>
	<label><font color = "red">&nbsp;&nbsp; * </font> Subject : <input type = "text" name="subject_line"></label>
	<br><br>
	<label><font color = "red">&nbsp;&nbsp; * </font> Author name : <input type = "text" name="author_name"></label>
	<br><br>
    <label> &nbsp;&nbsp;&nbsp;&nbsp; <textarea name="note_body" cols = "57" rows = "17" ></textarea></label>
	<br><br>

    &nbsp;&nbsp;&nbsp;&nbsp; <input type = "submit" value = "Save">
    <br><br>
	</form></div>

<?php endif; ?>

</body>
</html>










