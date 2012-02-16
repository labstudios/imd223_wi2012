<?php
	//create mysqli object
	$db = new mysqli('localhost', 'example', 'pass123', 'shopcart');
	//Check to ensure the connection worked
	if($db->connect_errno)
	{
		die("Database connection failure: ". $db->connect_error);
	}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>From the Database</title>
</head>
<body>
    <?php
    	//get the CDs in our cds table.
    	$cds = $db->query("SELECT * FROM `cds`;");
    	if($db->errno)
		{
			echo $db->error;
		}
    	//traverse CD results
    	while($cdrow = $cds->fetch_assoc())
    	{
    		//Filter $cdrow as an object
    		$cdrow = (Object) $cdrow;
    		//Get the genre result set for this CD
    		$genreResult = $db->query("SELECT `genre` FROM `genres` WHERE `id` = $cdrow->genre_id;");
    		//check for query error
    		if($db->errno)
    		{
    			echo $db->error;
    		}
    		//get the row from the result set and store genre in a variable
    		$genreRow = (Object) $genreResult->fetch_assoc();
    		$genre = $genreRow->genre;
    		//Get the ids of the artists for this CD
    		$artistsResult = $db->query("SELECT * FROM `artists_has_cds` WHERE `cd_id` = $cdrow->id;");
    		if($db->errno)
    		{
    			echo $db->error;
    		}
    		//Get the artists for the artist ids we collected
    		$artists = array();
    		while($artistIdRow = $artistsResult->fetch_assoc())
    		{
    			$artistIdRow = (Object) $artistIdRow;
    			$artistResult = $db->query("SELECT `artist` FROM `artists` WHERE `id` = $artistIdRow->artist_id;");
    			if($db->errno)
	    		{
	    			echo $db->error;
	    		}
	    		//get the artist and push into $artists array
	    		$artist = (Object) $artistResult->fetch_assoc();
	    		$artists[] = $artist->artist;
    		}
    		//Output CD Data
    		?>
    		<article class="album">
    			<header><?php echo $cdrow->title; ?></header>
    			<div class="price">Price: $<?php echo $cdrow->price; ?></div>
    			<div class="genre"><?php echo $genre; ?></div>
    			<div class="artists"><?php echo implode(", ", $artists); ?></div>
    		</article>
    		<?php
    	}
    ?>
</body>
</html>




