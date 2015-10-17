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
	<style>
	.lay_content {
    background-image: url("bg.png");
    background-size: 1459px 1245px;
    background-color: black;
 	font-style: oblique;
    padding: 20px;
    margin-left: 10px;
    margin-right: 10px;
    margin-top: 10px;
	}
	.left_side {
	margin-left: 10px;
	width: 98%;
    border:1px solid #00FF00;
	}
	.right_side{
		margin-right: 20px
	}
	.row_form{
		display: inline-block;
		margin-left: 10px;
	}

	</style>
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
		<title><?php print $note->getSubject_line(); ?></title>

		<link rel="stylesheet" type="text/css" href="stylesheet.css" title="Style">
		<div class = "lay_content" align = "center">
		<font color = "#FFFFFF">
			<h2><?php print $note->getSubject_line(); ?></h2>
			<p><?php print $note->getAuthor_name(); ?></p>

		</font>
		<font color = "grey">
			<p><?php print $note->getCreate_date(); ?><p>
			</font>
			<br>
		</div>
		<div class = "row_form" >
			<a href="Index.php" class="btn btn-primary btn-lg active" role="button">
			<img src="home.png" style="width:28px;height:28px;"> HOME </a>
			&nbsp; &nbsp;
			<form action = "edit.php" method = "POST" style='display: inline-block'>
				<input type = "hidden" name = "id" value = "<?php print $note->getId();?>">
				<input type = "submit" value = "Edit">
			</form>
				<input type = "hidden" name = "id" value = "<?php print $note->getId();?>">
			&nbsp; &nbsp;
			<script type = "text/javascript">
			function button_clicked(){
				//if-else control structure
				if (confirm('Cautious: Note will be deleted')){
					form.submit();
				}else{ // bug pranks
					alert("That was really scary! But I'm going to delete it anyway ~ 0_< Ah ha ha ha!");

				}
			}
			</script>
			<form action = "delete.php" method = "POST" style = 'display: inline-block'>
				<input type = "hidden" name = "id" value = "<?php print $note->getId();?>">
				<input type = "submit" value = "Delete" onclick = "button_clicked();">
			</form>

			<br>
			<br>
			
		</div>

	</head>
	<body background = "bg.png">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" title="Style">
		<br><br>
		<div class = "left_side">
		
		<p><?php print $note->getNote_body(); ?></p>

		</div>
		<br>
	
	</body>
	</html>





<?php else: ?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
		<title>Oops</title>
		<link rel="stylesheet" type="text/css" href="stylesheet.css" title="Style">
	</head>
	<body>
		<div style="text-align: center">
			<br><br>
		<h1>Note Not Found!</h1>
		<img src="dino.png">
		<br><br>
		<a href = "Index.php"> Back to the Note Dashboard </a>
		</div>
	</body>
	</html>




<?php endif; ?>

















