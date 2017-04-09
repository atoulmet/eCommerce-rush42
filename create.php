<?php

header('Location: index.php');
include_once("get_connect.php");

if (!$_POST['login'] || !$_POST['passwd'] || $_POST['submit'] !== "OK")
{
	echo "Vous devez remplir le formulaire.\n";
	return ;
}
else if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] === "OK")
{
	$db = get_connect("private");
	$passwd = hash('whirlpool', $_POST['passwd']);
	$admin = ($_POST['admin'] == 'true' ? TRUE : FALSE);
	$priv_db = mysqli_query($db, 'SELECT * FROM users');
	while($user = mysqli_fetch_assoc($priv_db))
		if ($user['login'] == $_POST['login'])
		{
			echo "Un compte avec cet identifiant existe déjà.\n";
			return ;
		}
	mysqli_free_result($user);
	$req_pre = mysqli_prepare($db, 'INSERT INTO users(login, passwd, admin) VALUES(?, ?, ?)');
	mysqli_stmt_bind_param($req_pre, "ssi", $_POST['login'], $passwd, $admin);
	mysqli_stmt_execute($req_pre);
	mysqli_close($db);
}

?>
