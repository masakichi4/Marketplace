<?php

$db = new mysqli('18.191.245.65','testuser','password','proj272');

if (isset($_GET['rating'])) {
	$rating = (int)$_GET['rating'];

	if(in_array($rating, [1,2,3,4,5])){
			$db->query("INSERT INTO petdonutsnum (rating) VALUES({$rating})");
	}

	header('Location: petdonuts.php');
}

?>