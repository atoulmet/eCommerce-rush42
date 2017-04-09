<?php

header('Location: index.php');
if (session_start() === FALSE || session_destroy() === FALSE)
{
	echo "Erreur inattendue\n";
	exit ;
}
echo "Loggued out<br />\n";

?>
