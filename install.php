<?php

include("get_connect.php");

$db = get_connect("");
if (!$db)
	exit(mysqli_error($db));
if (mysqli_query($db, "CREATE DATABASE IF NOT EXISTS private"))
{
	echo "Base de données Private créée ou existante<br />";
	if (!mysqli_close($db))
		exit(mysqli_error($db));
}
$db = get_connect("private");
if (!$db)
	exit(mysqli_error($db));
if (mysqli_query($db, 'CREATE TABLE IF NOT EXISTS users (login VARCHAR(255) NOT NULL PRIMARY KEY, passwd TEXT NOT NULL, admin TINYINT(1))'))
{
	echo "Table créée ou existante<br />";
	if (!mysqli_close($db))
		exit(mysqli_error($db));
}
else
	exit(mysqli_error($db));
$db = get_connect("");
if (!$db)
	exit(mysqli_error($db));
if (mysqli_query($db, "CREATE DATABASE IF NOT EXISTS ft_amazon"))
{
	    echo "Base de données products créée ou existante<br />";
		    if (!mysqli_close($db))
				        exit(mysqli_error($db));
}
$db = get_connect("ft_amazon");
if (!$db)
	    exit(mysqli_error($db));
if (mysqli_query($db, 'CREATE TABLE IF NOT EXISTS products (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255) NOT NULL, prix INT(200) NOT NULL, categories TEXT(1096) NOT NULL)'))
{
	    echo "Table créée ou existante<br />";
		    if (!mysqli_close($db))
				        exit(mysqli_error($db));
}
else
	    exit(mysqli_error($db)) ;
$db = get_connect("ft_amazon");
if (!$db)
	    exit(mysqli_error($db));
mysqli_query($db, 'INSERT INTO products(id, name, prix, categories) VALUES("", "coton", "10", "Bocal")');
?>
