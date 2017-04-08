<?php

function	get_connect($base)
{
	$db = mysqli_connect('db', 'root', 'root', $base);
	if (!$db)
	{
		echo mysqli_error($db);
		return (NULL);
	}
	return $db;
}

?>
