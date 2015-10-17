<?php
/**
 * Created by YZ-MAC:ln1878
 * Date: 10/12/2015
 * Time: 19:04:22
 * @ 3001-718 Chicago
 */
require_once 'Note.php';
require_once 'FileNoteRepository.php';

//instantiate teh repository to get all the existing notes
$noteRepo = new \yzhan214\as2\FileNoteRepository();
$noteList = $noteRepo->getAllNotes();

//html section
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
<style>
.lay_content {
    background-image: url("bg.png");
    background-size: 1459px 121px;
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
</style>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
<title>Index_YZ</title>
<link rel="stylesheet" type="text/css" href="stylesheet.css" title="Style">
<div class = "lay_content" align = "center">
<font color = "#FFFFFF"><h2>My Note Dashboard</h2></font>
<br>
<div style="text-align:left;">
<a href="Index.php" class="btn btn-primary btn-lg active" role="button">
	<img src="home.png" style="width:28px;height:28px;"> HOME </a>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="profile.php" class="btn btn-primary btn-lg active" role="button">
	<img src="user.png" style="width:28px;height:28px;"> DESIGNER PROFILE </a>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<a href="create.php" class="btn btn-primary btn-lg active" role="button">
	<img src="new.png" style="width:28px;height:28px;"> NEW NOTE </a>
</div>
</div>
</head>

<body>
<link rel="stylesheet" type="text/css" href="stylesheet.css" title="Style">
<br>
<div class = "left_side">
	
	<p><font face= "verdana" size = "2"> &nbsp; NOTES HISTORY : </font></p>

	<br>
<ul>
	
	<?php
	//display the list of notes
	foreach($noteList as $note){
		print '<li><a href="view.php?id=' . $note->getId(). '">' . $note->getSubject_line() .  
		'<font color= "green"> &nbsp; -By: &nbsp;' . $note->getAuthor_name() . '</font><font color="grey"> &nbsp; ' 
		. " &nbsp; ( Date created: " . $note->getCreate_date() . " &nbsp; Last modified: " . $note->getModified_date() 
		.') </font><font color = "red"> -'. $note->getChar_count() . ' characters </font> </a></li>';
	}
	/*
	foreach ($noteList as $note ) {
		print_r($noteList);
		//testing the array
	}
	*/
	//previous: <li><a> NOTE X </a></li>
	?>
	
</ul>

<br>
</div>

</body>
</html>