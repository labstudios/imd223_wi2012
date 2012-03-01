<?php
require_once("header.php")
?><!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Store!</title>
    <style>
    	.album{
    		margin-top: 15px;
    	}
    	.album header{
    		font-weight: bold;
    	}
    </style>
</head>
<body>
    <?php
    	foreach(CD::getCDs() as $cd)
    	{
    		?>
    		<article class="album">
				<header><?php echo $cd->title; ?></header>
				<div class="price">Price: $<?php echo $cd->price; ?></div>
				<div class="genre"><?php echo $cd->genre; ?></div>
				<div class="artists"><?php echo implode(", ", $cd->artists); ?></div>
			</article>
    		<?php
    	}
    ?>
</body>
</html>