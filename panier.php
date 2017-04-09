<?php

if (session_start() === false)
{
	    echo "Erreur inattendue\n";
		    exit ;
}
if ($_POST['add_panier'])
{
	if (!isset($_SESSION['panier'])
		$_SESSION['panier'] = array_merge(array(), $_POST['add_panier']);
	else
		$_SESSION['panier'] = array_merge($_SESSION['panier'], $_POST['add_panier']);
}

?>
