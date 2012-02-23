<?php
    require_once("database.php");
    
    $db = new Database();
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>From the Database</title>
    <style>
        .album{
            margin-bottom: 15px;
        }
        .album header{
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php
    $cds = $db->getArray("SELECT * FROM `cds`;");
    
    foreach($cds as $cd)
    {
        $genre = $db->getItem("SELECT `genre` FROM `genres` WHERE `id` = $cd->genre_id;");
        $artistIds = $db->getArray("SELECT * FROM `artists_has_cds` WHERE `cd_id` = $cd->id;");
        $artists = array();
        foreach($artistIds as $artistId)
        {
            $artist = $db->getItem("SELECT `artist` FROM `artists` WHERE `id` = $artistId->artist_id;");
            $artists[] = $artist->artist;
        }
        ?>
		<article class="album">
			<header><?php echo $cd->title; ?></header>
			<div class="price">Price: $<?php echo $cd->price; ?></div>
			<div class="genre"><?php echo $genre->genre; ?></div>
			<div class="artists"><?php echo implode(", ", $artists); ?></div>
		</article>
		<?php
    }
?>
</body>
</html>