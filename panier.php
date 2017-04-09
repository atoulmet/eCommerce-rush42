<?php

header('Location: index.php');
if (session_start() === false)
{
	echo "Erreur inattendue\n";
	exit ;
}
if ($_POST['add_panier'])
{
	if (!isset($_SESSION['panier']))
	{
		$tmp[] = $_POST['add_panier'];
		$_SESSION['panier'] = array();
		$_SESSION['panier'] = array_merge($_SESSION['panier'], $tmp);
	}
	else
	{
		$tmp[] = $_POST['add_panier'];
		$_SESSION['panier'] = array_merge($_SESSION['panier'], $tmp);
	}
}

?>
