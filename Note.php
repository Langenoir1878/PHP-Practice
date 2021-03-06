<?php
/**
 * User: ln1878
 * Date: 10/07/2015
 * Time: 12:30 pm
 * @ Galvin Library 2 FL
 * Revised Time: Oct 12, 20:31:38
 * Revised Place: 3001-718 Chicago
 */

namespace yzhan214\as2;

class Note{

    //initiate private vars
	private $subject_line = "";
	private $author_name = "";
	private $id;//will be uniqid();
	private $note_body = "";

    private $char_count;
    private $create_date;
    private $modified_date;
    /*
	function _construct($aSubject, $aAuthor, $aID, $aNoteBody, $aCount, $aDate){
		$this->subject_line = $aSubject;
		$this->author_name = $aAuthor;
		$this->id = $aID;
		$this->note_body = $aNoteBody;
		$this->char_count = $aCount;
		$this->date_dynamics = $aDate;
	
	}//end of _construct()
    */


    /* 
     * @constructor
     */
    public function __construct(){
        $this->id = uniqid();
        //generate the unique id for each note obj
        date_default_timezone_set('America/Chicago');
        $this->create_date = date('j M Y - h:i:s A');
        $this->modified_date = date('j M Y - h:i:s A');
    }


    /*
     * @accessors to return string
     */
    public function getSubject_line(){
    	return $this->subject_line;
    }
    public function getAuthor_name(){
    	return $this->author_name;
    }
    public function getId(){ 
    //important function to get the note by auto-generated unique id
    	return $this->id;
    }
    public function getNote_body(){
    	return $this->note_body;
    }
   
    public function getChar_count(){
    	return $this->char_count;
    } 

    /*
    public function getDate_dynamics(){
    	return $this->date_dynamics;
    }
    
    */
    public function getModified_date(){
        //date_default_timezone_set('America/Chicago');
        //return $this->last_date = date('j M Y - h:i:s A');
        return $this->modified_date;
    }
    public function getCreate_date(){
        return $this->create_date;
    }

    /*
     *@mutators to set values into vars except the id
     */

    public function setSubject_line($sl){
    	$this->subject_line = $sl;
    }
    public function setAuthor_name($an){
    	$this->author_name = $an;
    }
   
    public function setNote_body($nb){
    	$this->note_body = $nb;
    }

    public function setModified_date($md){
        $this->modified_date = $md;
    }
    
    public function setChar_count($cc){
        $this->char_count = $cc;
    }

    /*
     * class function
     */
 	public function callNote(){
 		print 'Testing msg: this is inside the callNote() function';
 	}


}//end of class Note.php



?>