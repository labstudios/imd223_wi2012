<?php
require_once("musicstore.php");
require_once("genre.php");
require_once("artist.php");

class CD extends MusicStore
{
	protected $table = "cds";
	private $artistIds = array();
	
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
	
	public function addArtist($artist)
	{
		$id = 0;
		if($artist instanceof Artist)
		{
			$id = $artist->id;
		}
		else
		{
			$id = $artist;
		}
		if(array_search($id, $this->artistIds) === false)
		{
			$this->artistIds[] = $id;
		}
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
	
	public function __set($var, $val)
	{
		switch($var)
		{
			case "id":
				
			break;
			case "name":
			case "title":
				$this->data->title = $val;
			break;
			case "cost":
			case "price":
				$this->data->price = $val;
			break;
			case "genre":
				if($val instanceof Genre)
				{
					$this->data->genre_id = $val->id;
				}
				else
				{
					$this->data->genre_id = $val;
				}
			break;
			case "artists":
				foreach($val as $v)
				{
					$this->addArtist($v);
				}
			break;
			case "artist":
				$this->addArtist($val);
			break;
			default:
				return null;
			break;
		}
	}
	
	public function save()
	{
		parent::save();
		self::preOut($this->artistIds);
		foreach($this->artistIds as $id)
		{
			$this->sqlCall("INSERT INTO `artists_has_cds` (`artist_id`, `cd_id`) VALUES ($id, $this->id)");
		}
	}
}











