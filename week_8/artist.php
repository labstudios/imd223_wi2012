<?php
require_once("musicstore.php");

class Artist extends MusicStore
{
	protected $table = "artists";
	
	public static function getArtists()
	{
		$db = new Database();
		$artistIds = $db->getArray("SELECT `id` FROM `artists`");
		$artists = array();
		foreach($artistIds as $artistId)
		{
			$artists[] = new Artist($artistId->id);
		}
		return $artists;
	}
	
	public function __get($var)
	{
		switch($var)
		{
			case "id":
				return $this->data->id;
			break;
			case "name":
			case "artist":
				return $this->data->artist;
			break;
			default:
				return null;
			break;
		}
	}
}
