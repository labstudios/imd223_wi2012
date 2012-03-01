<?php
	require_once("header.php");
	
	$artists = Artist::getArtists();
	$genres = Genre::getGenres();
?><!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Add a new CD</title>
    <style>
    	label{
    		display: block;
    	}
    </style>
</head>
<body>
	<form method="post" action="addcd.php" enctype="multipart/form-data">
    	<label>
    		Title: <input type="text" name="title" />
    	</label>
    	<label>
    		Price: <input type="text" name="price" />
    	</label>
    	<label>
    		Genre:
    		<select name="genre">
    			<option value="">Select a genre</option>
    			<?php
    				foreach($genres as $genre)
    				{
    					?>
    					<option value="<?php echo $genre->id; ?>"><?php echo $genre->name; ?></option>
    					<?php
    				}
    			?>
    		</select>
    	</label>
    	<h4>Artists</h4>
    	<?php
    		foreach($artists as $artist)
    		{
    			?>
    			<label><input type="checkbox" name="artists[]" value="<?php echo $artist->id; ?>" /> <?php echo $artist->name; ?></label>
    			<?php
    		}
    	?>
    	<input type="submit" />
    </form>
</body>












</html>