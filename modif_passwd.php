<?php

if (session_start() === false)
{
	echo "Erreur inattendue\n";
	exit ;
}
$pw_folder = "../private";
$pw_path = "../private/passwd";

?>
<!DOCTYPE html>
<html>
	<head lang="fr">
        <meta charset="utf-8">
        <title>Modifier le mot de passe</title>
        <link rel="stylesheet" type="text/css" href="#" />
	</head>

	<body>
	    <form method="post" action="modif_passwd.php">
	        <p>
		        Identifiant: <input type="text" name="login" />
		        <br />

		        Ancien mot de passe: <input type="password" name="oldpw" />
		        <br/>

		        Nouveau mot de passe: <input type="password" name="newpw" />

		        <input type="submit" name="submit" value="OK"/>
	        </p>
	    </form>

		<a href="./index.php">Retourner à l'accueil</a>
	</body>
</html>
<?php

$i = 0;
if ($_POST['submit'] == 'OK')
{
	if ($_POST['login'] === '')
	{
		echo "Veuillez renseigner votre login\n";
		exit ;
	}
	if ($_POST['oldpw'] === '' || $_POST['newpw'] === '')
	{
		echo "Veuillez renseigner un mot de passe !\n";
		exit ;
	}
	else
	{
		$pw_serialized = file_get_contents($pw_path);
		$pw_table = unserialize($pw_serialized);
		foreach ($pw_table as $user)
		{
			if ($user['login'] == $_POST['login'])
			{
				$old_pw_hash = hash('whirlpool', $_POST['oldpw']);
				if ($old_pw_hash == $user['passwd'])
				{
					$new_pw_hash = hash('whirlpool', $_POST['newpw']);
					$pw_table[$i]['passwd'] = $new_pw_hash;
					$pw_serialized = serialize($pw_table);
					file_put_contents($pw_path, $pw_serialized);
					echo "Modification reussie\n";
					exit ;
				}
				else
				{
					echo "Erreur de mot de passe\n";
					exit ;
				}
			}
			$i++;
		}
				echo "Aucun login correspondant\n";
				exit ;
		}
	}
if ($_POST['submit'] == '') {
	exit ;
}
else {
	echo "Error\n";
	exit ;
}

?>
