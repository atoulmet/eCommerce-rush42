<?php

header('Location: index.php');
$private = '../private/passwd';

if (!$_POST['login'] || !$_POST['passwd'] || $_POST['submit'] !== "OK")
{
	echo "Vous devez remplir le formulaire.\n";
	return ;
}
else if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] === "OK")
{
	$passwd = hash('whirlpool', $_POST['passwd']);
	if (file_exists($private))
	{
		$priv_file = unserialize(file_get_contents($private));
		foreach ($priv_file as $user)
			if ($user['login'] == $_POST['login'])
			{
				echo "Un compte avec cet identifiant existe déjà.\n";
				return ;
			}
	}
	else
		if (!file_exists('../private'))
			mkdir('../private');
	$priv_file[] = ['login' => $_POST['login'], 'passwd' => $passwd, 'admin' => $_POST['admin']];
	if (file_put_contents($private, serialize($priv_file)) === FALSE)
	{
		echo "Unexpected error.\n";
		return ;
	}
}

?>
