<?php

if (session_start() === false)
{
	echo "Erreur inattendue\n";
	exit ;
}

?>
<footer>
	<?php

	if ($_SESSION['admin'] === 'true')
		echo '<p><a href="admin.php">- acceder au panneau admin -</a><br /></p>';

	?>
	<small>© copyright 2017 - by <em>atoulmet</em> & <em>aridolfi</em> - All rights reserved.</small>
</footer>
