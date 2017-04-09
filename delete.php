<?php

include_once("get_connect.php");

if (!$_POST['login'] || !$_POST['passwd'] || $_POST['submit'] !== "SUPPRIMER")
{
	echo "Vous devez remplir le formulaire.\n";
	return ;
}
else if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] === "SUPPRIMER")
{
	$db = get_connect("private");
	if (($req_pre = mysqli_prepare($db, 'SELECT * FROM users WHERE login = ?')) === FALSE)
	{
		mysqli_close($db);
		exit (mysqli_error($db));
	}
	mysqli_stmt_bind_param($req_pre, "s", $_POST['login']);
	mysqli_stmt_execute($req_pre);
	mysqli_stmt_bind_result($req_pre, $user['login'], $user['passwd'], $user['admin']);
	mysqli_stmt_fetch($req_pre);
	$passwd = hash('whirlpool', $_POST['passwd']);
	if ($passwd !== $user['passwd'])
	{
		mysqli_close($db);
		echo "Identifiants erronés\n";
		exit ;
	}
	mysqli_close($db);
	$db = get_connect("private");
	$req_pre = mysqli_prepare($db, 'DELETE FROM users WHERE login = ?');
	mysqli_stmt_bind_param($req_pre, "s", $_POST['login']);
	mysqli_stmt_execute($req_pre);
	mysqli_close($db);
	include("logout.php");
}

?>
