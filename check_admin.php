<?php

function check_admin($login)
{
	$db = get_connect("private");
	if (!$db)
		exit mysqli_error($db);
	$hashed_pw = hash('whirlpool', $passwd);
	$req_pre = mysqli_prepare($db, 'SELECT * FROM users WHERE login = ?');
	mysqli_stmt_bind_param($req_pre, "s", $login);
	mysqli_stmt_execute($req_pre);
	mysqli_stmt_bind_result($req_pre, $user['login'], $user['passwd'], $user['admin']);
	mysqli_stmt_fetch($req_pre);
	mysqli_close($db);
	if ($user['login'] == $login && $user['admin'] == TRUE)
		return (TRUE);
	return (FALSE);
}

?>
