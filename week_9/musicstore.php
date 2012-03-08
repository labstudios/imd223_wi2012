<?php
require_once("database.php");

abstract class MusicStore extends Database
{
	protected $data;
	protected $table;
	
	public function MusicStore($id = null)
	{
		parent::Database();
		$this->data = new stdClass();
		if($id != null)
		{
			$this->data = $this->getItem("SELECT * FROM `$this->table` WHERE `id` = $id");
		}
	}
	
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