<?php

require_once("musicstore.php");

class Genre extends MusicStore
{
	protected $table = "genres";
	
	/*public function dump()
	{
		$this->preOut($this->data);
	}*/
	
	public function __get($var)
	{
		switch($var)
		{
			case "id":
				return $this->data->id;
			break;
			case "name":
			case "genre":
				return $this->data->genre;
			break;
			default:
				return null;
			break;
		}
	}
	
}