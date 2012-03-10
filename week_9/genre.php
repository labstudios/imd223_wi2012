<?php

require_once("musicstore.php");

class Genre extends MusicStore
{
	protected $table = "genres";
	
	/**
	 * Gets all the Genres in the database and returns as an array of Genre instances
	 * @return Array	an array of Genre instances
	 */
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