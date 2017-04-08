<header>
<?php
	if ($_SESSION['loggued_on_user'])
   	{
		echo "Bonjour ".$_SESSION['loggued_on_user'];
		echo '<a href="logout.php">Logout</a>';
	}
	else
  	{
		echo '<a href="login.php">Login</a>';
	}
?>
</header>
