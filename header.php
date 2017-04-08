<header>
<?php
	if ($_SESSION['loggued_on_user'])
   	{
		echo "Bonjour ".$_SESSION['loggued_on_user'];
		echo '<a href="logout.php">Logout</a>';
		if ($_SESSION['admin'] === 'true')
			echo "Mighty administrator";
	}
	else
  	{
		echo '<a href="login.php">Login</a>';
	}
?>
</header>
