<?php

function	get_connect($host, $login, $passwd, $base)
{
	$db = mysqli_connect($host, $login, $passwd, $base);
	if (!$db)
	{
		echo 'Erreur de connection à la base de données\n';
		return (NULL);
	}
	return $db;
}

?>
