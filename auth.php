<?php

function auth($login, $passwd)
{
	include_once("get_connect.php");
	$db = get_connect("private");
	$hashed_pw = hash('whirlpool', $passwd);
	$req_pre = mysqli_prepare($db, 'SELECT * FROM users WHERE login = ?');
	mysqli_stmt_bind_param($req_pre, "s", $login);
	mysqli_stmt_execute($req_pre);
	mysqli_stmt_bind_result($req_pre, $user['login'], $user['passwd'], $user['admin']);
	mysqli_stmt_fetch($req_pre);
	if (!mysqli_close($db))
		exit(mysqli_error($db));
	if ($user['login'] === $login && $user['passwd'] === $hashed_pw)
		return (TRUE);
	return (FALSE);
}

?>
