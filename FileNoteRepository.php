<?php
/**
 * User: ln1878
 * Date: 10/07/2015
 * Time: 12:30 pm
 * @ Galvin Library 2 FL
 * Revised Time: Oct 12, 21:16:38
 * Revised Place: 3001-718 Chicago
 */

namespace yzhan214\as2;

require_once 'INoteRepository.php';
require_once 'Note.php';

class FileNoteRepository implements INoteRepository{

	private $fileName = "data.txt"; //pointer to a local file

// put contents into local file
public function saveNote($note){
	$dataArray = $this->getAllNotes();
	//in the id location storing the object
	$dataArray[$note->getId()] = $note;
	$serialData = serialize($dataArray);
	//opens the file and write
	file_put_contents($this->fileName, $serialData);
}

//return an array, unserialized
public function getAllNotes(){
	//get the data in the file into a string var
	$data = file_get_contents($this->fileName);
	//unserialization check
	if($data){
		$dataArray = unserialize($data);
		return $dataArray;
	}
	else{
		return array();//empty array
	}

}

//return an Note item in the array list 
public function getNoteById($id){

	$noteList = $this->getAllNotes();
	//check the existance of certain note item
	if (array_key_exists($id, $noteList)){
		//exist, then return this item
		return $noteList[$id];
	} 
	/*
	else{
		return array();//empty array
	}
	*/
}

//unset the item and re-put contents into local file
public function deleteNote($id){

	$noteList = $this->getAllNotes();
	//check the existance of certain note item
	if (array_key_exists($id, $noteList)){
		//unset the item
		unset($noteList[$id]);
		//update the remaining data into local file
		$serialData = serialize($noteList);
		file_put_contents($this->fileName, $serialData);
	}
}









}//end of class
?>