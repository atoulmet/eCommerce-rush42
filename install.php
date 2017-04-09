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

//								CREATE TABLE ORDERS
$db = get_connect("ft_amazon");
if (mysqli_query($db, 'CREATE TABLE IF NOT EXISTS orders (name VARCHAR(255) NOT NULL, numbers TEXT(1096), prix INT UNSIGNED NOT NULL)'))
	    echo "Table créée ou existante<br />";
else
	    echo mysqli_error($db);
if (!mysqli_close($db))
			exit(mysqli_error($db));

//									INSERT PRODUCTS
$db = get_connect("ft_amazon");
if (mysqli_query($db, 'INSERT INTO products(name, img, prix, categories) VALUES("coton", "https://cdn.intra.42.fr/users/medium_coton.jpg" , "10", "All;Bocal;BDE;Student")'))
	  echo "Coton ajoute<br />";
if (mysqli_query($db, 'INSERT INTO products(name, img, prix, categories) VALUES("charly", "https://cdn.intra.42.fr/users/medium_charly.jpg", "10", "All;ADM")'))
	  echo "Charly ajoute<br />";
if (mysqli_query($db, 'INSERT INTO products(name, img, prix, categories) VALUES("aridolfi", "https://cdn.intra.42.fr/users/medium_aridolfi.jpg", "10", "All;Student")'))
	  echo "Antonin ajoute<br />";
if (mysqli_query($db, 'INSERT INTO products(name, img, prix, categories) VALUES("atoulmet", "https://cdn.intra.42.fr/users/medium_atoulmet.jpg", "10", "All;Student;BDE")'))
	  echo "Alexia ajoutee<br />";
if (mysqli_query($db, 'INSERT INTO products(name, img, prix, categories) VALUES("thor", "https://cdn.intra.42.fr/users/medium_thor.jpg", "10", "All;Bocal")'))
	  echo "Thor ajoute<br />";
if (mysqli_query($db, 'INSERT INTO products(name, img, prix, categories) VALUES("varichar", "https://cdn.intra.42.fr/users/medium_varichar.jpg", "10", "All;Pixel;Student;BDE")'))
	  echo "Varchar ajoute<br />";
if (mysqli_query($db, 'INSERT INTO products(name, img, prix, categories) VALUES("mleclair", "https://cdn.intra.42.fr/users/medium_mleclair.jpg", "10", "All;Student")'))
	  echo "mleclair ajoute<br />";
if (mysqli_query($db, 'INSERT INTO products(name, img, prix, categories) VALUES("nmougino", "https://cdn.intra.42.fr/users/medium_nmougino.jpg", "10", "All;Student;Tuteur")'))
	  echo "nmougino ajoute<br />";
if (mysqli_query($db, 'INSERT INTO products(name, img, prix, categories) VALUES("tgauvrit", "https://cdn.intra.42.fr/users/medium_tgauvrit.jpg", "10", "All;Student")'))
	  echo "tgauvrit ajoute<br />";
if (mysqli_query($db, 'INSERT INTO products(name, img, prix, categories) VALUES("bfrochot", "https://cdn.intra.42.fr/users/medium_bfrochot.jpg", "10", "All;Student")'))
	  echo "bfrochot ajoute<br />";
if (mysqli_query($db, 'INSERT INTO products(name, img, prix, categories) VALUES("edeveze", "https://cdn.intra.42.fr/users/medium_edeveze.jpg", "10", "All;Student;Tuteur")'))
	  echo "edeveze ajoutee<br />";
if (mysqli_query($db, 'INSERT INTO products(name, img, prix, categories) VALUES("30_1", "https://cdn.intra.42.fr/users/medium_30_1.jpg", "10", "All;Pixel")'))
	  echo "30_1 ajoute<br />";
else
	exit(mysqli_error($db));
if (!mysqli_close($db))
			exit(mysqli_error($db));

?>
