<?php
require_once("musicstore.php");
require_once("genre.php");
require_once("artist.php");

class CD extends MusicStore
{
	protected $table = "cds";
	
	public static function getCDs()
	{
		$db = new Database();
		$cdIds = $db->getArray("SELECT `id` FROM `cds`");
		$cds = array();
		foreach($cdIds as $cdId)
		{
			$cds[] = new CD($cdId->id);
		}
		return $cds;
	}
	
	public function __get($var)
	{
		switch($var)
		{
			case "id":
				return $this->data->id;
			break;
			case "name":
			case "title":
				return $this->data->title;
			break;
			case "cost":
			case "price":
				return $this->data->price;
			break;
			case "genre":
				$genre = new Genre($this->data->genre_id);
				return $genre->name;
			break;
			case "artists":
				$artistIds = $this->getArray("SELECT `artist_id` FROM `artists_has_cds` WHERE `cd_id` = $this->id");
				$artists = array();
				foreach($artistIds as $artistId)
				{
					$artist = new Artist($artistId->artist_id);
					$artists[] = $artist->name;
				}
				return $artists;
			break;
			default:
				return null;
			break;
		}
	}
}