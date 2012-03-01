<?php

require_once("musicstore.php");

class Genre extends MusicStore
{
	protected $table = "genres";
	
	/*public function dump()
	{
		$this->preOut($this->data);
	}*/
	
	public static function getGenres()
	{
		$db = new Database();
		$genreIds = $db->getArray("SELECT `id` FROM `genres`");
		$genres = array();
		foreach($genreIds as $genreId)
		{
			$genres[] = new Genre($genreId->id);
		}
		return $genres;
	}
	
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