<header>
<?php
	if ($_SESSION['loggued_on_user'])
   	{
		if ($_SESSION['admin'] === 'true')
			echo "<div class = 'status'>Mighty administrator\n</div>";
		echo "Bonjour ".$_SESSION['loggued_on_user'];
		echo "<div class = 'account'><a href='logout.php'>Logout</a></div>";
	}
	else
  	{
		echo '<a href="login.php">Login</a>';
	}
?>
</header>
