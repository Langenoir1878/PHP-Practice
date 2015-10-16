<?php
/**
 * Created by YZ-MAC:ln1878
 * Date: 10/12/2015
 * Time: 19:49:56
 * @ 3001-718 Chicago
 */

 namespace yzhan214\as2;
 interface INoteRepository{
 	public function saveNote($note);
 	public function getAllNotes();
 	public function getNoteById($id);
 	public function deleteNote($noteId);
 }
 ?>