<?php

include("get_connect.php");

$db = get_connect("");
if ($db)
	if (mysqli_query($db, "CREATE DATABASE IF NOT EXISTS private"))
	{
		echo "Base de données créée ou existante\n";
		if (!mysqli_close($db))
		{
			echo mysqli_error($db);
			exit ;
		}
	}
$db = get_connect("private");
if ($db)
	if (mysqli_query($db, 'CREATE TABLE IF NOT EXISTS users (login VARCHAR(255) NOT NULL PRIMARY KEY, passwd TEXT NOT NULL, admin TINYINT(1))'))
		echo "Table créée ou existante\n";
	else
	{
		echo mysqli_error($db);
		exit ;
	}



?>
