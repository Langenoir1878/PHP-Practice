<?php
/**
 * User: ln1878
 * Date: 10/07/2015
 * Time: 12:30 pm
 * @ Galvin Library 2 FL
 */

namespace yzhan214\as2;

class Note{

	private $subject_line;
	private $author_name;
	private $note_id;
	private $note_body, $char_count, $date_created, $date_edited;

	function _construct($aSubject, $aAuthor, $aID, $aNoteBody, $aCount, $aCreateDate, $aEditDate){
		$this->subject_line = $aSubject;
		$this->author_name = $aAuthor;
		$this->note_id = $aID;
		$this->note_body = $aNoteBody;
		$this->char_count = $aCount;
		$this->date_created = $aCreateDate;
		$this->date_edited = $aEditDate;
	
	}//end of _construct()

    /*
     * @accessors
     */
    public function getSubject_line(){
    	return $this->subject_line;
    }
    public function getAuthor_name(){
    	return $this->author_name;
    }
    public function getNote_id(){
    	return $this->note_id;
    }
    public function getNote_body(){
    	return $this->note_body;
    }
    public function getChar_count(){
    	return this->char_count;
    }
    public function getDate_created(){
    	return $this->date_created;
    }
    public function getDate_edited(){
    	return $this->date_edited;
    }




    /*
     *@mutators
     */

    public function setSubject_line($sl){
    	$this->subject_line = $sl;
    }
    public function setAuthor_name($an){
    	$this->author_name = $an;
    }
    public function setNote_id($ni){
    	$this->note_id = $ni;
    }
    public function setNote_body($nb){
    	$this->note_body = $nb;
    }
    public function setChar_count($cc){
    	$this->char_count = $cc;
    }
    public function setDate_created($dc){
    	$this->date_created = $dc;
    }
    public function setDate_Edited($de){
    	$this->date_edited = $de;
    }


    /*
     * class function
     */
 	public function callNote(){
 		print '$subject_line' . '';
 	}


}//end of class Note.php



?>