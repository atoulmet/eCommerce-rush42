<?php
function check_admin($login)
{
	$pw_path = '../private/passwd';
	$pw_serialized = file_get_contents($pw_path);
	$pw_table = unserialize($pw_serialized);
	foreach ($pw_table as $user)
		if ($user['login'] == $login && $user['admin'] == "true")
			return (true);
	return (false);
}
?>
