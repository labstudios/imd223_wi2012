<?php
require_once("database.php");
/**
 * Class to act as a base for data models for the music store.
 */
abstract class MusicStore extends Database
{
	protected $data;
	protected $table;
	
	/**
	 * Creates an object. If id provided, will get the data for that item
	 * based on table as set by the class extending MusicStore.
	 * @param	id	int	the id of the desired item
	 */
	public function MusicStore($id = null)
	{
		parent::Database();
		$this->data = new stdClass();
		if($id != null)
		{
			$this->data = $this->getItem("SELECT * FROM `$this->table` WHERE `id` = $id");
		}
	}
	
	/**
	 * Saves the data input into the data model to the database
	 * !!!updating does not currently work!!!
	 * @return void
	 */
	public function save()
	{
		if(isset($this->data->id))
		{
			//update the information
		}
		else
		{
			$this->insert($this->table, $this->data);
			$this->data = $this->getItem("SELECT * FROM `$this->table` ORDER BY `id` DESC LIMIT 1;");
		}
	}
}