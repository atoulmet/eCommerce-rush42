<?php

include("get_connect.php");

$db = get_connect("");
if (!$db)
	exit mysqli_error($db);
if (mysqli_query($db, "CREATE DATABASE IF NOT EXISTS private"))
{
	echo "Base de données créée ou existante<br />";
	if (!mysqli_close($db))
		exit mysqli_error($db);
}
$db = get_connect("private");
if (!$db)
	exit mysqli_error($db);
if (mysqli_query($db, 'CREATE TABLE IF NOT EXISTS users (login VARCHAR(255) NOT NULL PRIMARY KEY, passwd TEXT NOT NULL, admin TINYINT(1))'))
{
	echo "Table créée ou existante<br />";
	if (!mysqli_close($db))
		exit mysqli_error($db);
}
else
	exit mysqli_error($db);



?>
