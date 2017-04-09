<?php

function	get_connect($base)
{
	$db = mysqli_connect('db', 'root', 'root', $base);
	if (!$db)
		exit(mysqli_error($db));
	return $db;
}

?>
