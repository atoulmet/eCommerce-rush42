<?php

if (session_start() === FALSE || session_destroy() === FALSE)
{
	echo "Erreur inattendue\n";
	exit ;
}
echo "Loggued out\n";
echo "</br>";
echo "<a href='./index.php'>Retourner à l'accueil</a>";

?>
