<?php
	
	switch($_POST['option'])
	{
		case 2:
			echo "This red striped spatula is great for hot food!";
		break;
		case 3:
			echo "This green striped spatula is super sonic and could flip cats if needed.";
		break;
		case 1:
		default:
			echo "This blue striped spatula is best for colde food.";
		break;
	}
?>