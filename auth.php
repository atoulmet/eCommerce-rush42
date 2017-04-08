<?php

function auth($login, $passwd)
{
	$pw_path = "../private/passwd";
	$pw_serialized = file_get_contents($pw_path);
	$pw_table = unserialize($pw_serialized);
	$hashed_pw = hash('whirlpool', $passwd);
	foreach ($pw_table as $user)
	{
		if ($user['login'] == $login && $user['passwd'] == $hashed_pw) {
			return (true);
		}
	}
	return (false);
}

?>
