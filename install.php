<?php

include_once("get_connect.php");

//								CREATE DB PRIVATE
$db = get_connect("");
if (mysqli_query($db, "CREATE DATABASE IF NOT EXISTS private"))
	echo "Base de données Private créée ou existante<br />";
else
	exit(mysqli_error($db));
if (!mysqli_close($db))
	exit(mysqli_error($db));

//								CREATE TABLE USER
$db = get_connect("private");
if (mysqli_query($db, 'CREATE TABLE IF NOT EXISTS users (login VARCHAR(255) NOT NULL PRIMARY KEY, passwd TEXT NOT NULL, admin TINYINT(1))'))
	echo "Table créée ou existante<br />";
else
	exit(mysqli_error($db));
if (!mysqli_close($db))
	exit(mysqli_error($db));

//								CREATE DB FT_AMAZON
$db = get_connect("");
if (mysqli_query($db, "CREATE DATABASE IF NOT EXISTS ft_amazon"))
	    echo "Base de données products créée ou existante<br />";
else
	exit(mysqli_error($db));
if (!mysqli_close($db))
			exit(mysqli_error($db));

//								CREATE TABLE PRODUCTS
$db = get_connect("ft_amazon");
if (mysqli_query($db, 'CREATE TABLE IF NOT EXISTS products (ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255) NOT NULL, img TEXT(1096), prix INT UNSIGNED NOT NULL, categories TEXT(1096) NOT NULL)'))
	    echo "Table créée ou existante<br />";
else
	    echo mysqli_error($db);
if (!mysqli_close($db))
			exit(mysqli_error($db));

//									INSERT PRODUCTS
$db = get_connect("ft_amazon");
if (mysqli_query($db, 'INSERT INTO products(name, img, prix, categories) VALUES("coton", "https://cdn.intra.42.fr/users/medium_coton.jpg" , "10", "Bocal;BDE;Student")'))
	  echo "Coton ajoute<br />";
if (mysqli_query($db, 'INSERT INTO products(name, img, prix, categories) VALUES("charly", "https://cdn.intra.42.fr/users/medium_charly.jpg", "10", "ADM")'))
	  echo "Charly ajoute<br />";
if (mysqli_query($db, 'INSERT INTO products(name, img, prix, categories) VALUES("aridolfi", "https://cdn.intra.42.fr/users/medium_aridolfi.jpg", "10", "Student")'))
	  echo "Antonin ajoute<br />";
if (mysqli_query($db, 'INSERT INTO products(name, img, prix, categories) VALUES("atoulmet", "https://cdn.intra.42.fr/users/medium_atoulmet.jpg", "10", "Student;BDE")'))
	  echo "Alexia ajoute<br />";
if (mysqli_query($db, 'INSERT INTO products(name, img, prix, categories) VALUES("thor", "https://cdn.intra.42.fr/users/medium_thor.jpg" "10", "Bocal")'))
	  echo "Thor ajoute<br />";
if (mysqli_query($db, 'INSERT INTO products(name, img, prix, categories) VALUES("varichar", "https://cdn.intra.42.fr/users/medium_varichar.jpg", "10", "Pixel;Student;BDE")'))
	  echo "Varchar ajoute<br />";
else
	exit(mysqli_error($db));
if (!mysqli_close($db))
			exit(mysqli_error($db));

?>
