<?php

header('Location: index.php');
$private = '../private/passwd';

if (!$_POST['login'] || !$_POST['passwd'] || $_POST['submit'] !== "OK")
	return ;
else if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] === "OK")
{
	$passwd = hash('whirlpool', $_POST['passwd']);
	if (file_exists($private))
	{
		$priv_file = unserialize(file_get_contents($private));
		foreach ($priv_file as $user)
			if ($user['login'] == $_POST['login'])
				return ;
	}
	else
		if (!file_exists('../private'))
			mkdir('../private');
	$priv_file[] = ['login' => $_POST['login'], 'passwd' => $passwd];
	file_put_contents($private, serialize($priv_file));
}

?>
