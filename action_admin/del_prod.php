<?php

if ($_POST['del_prod'])
{
	$db = get_connect("private");
	$req_pre = mysqli_prepare($db, 'DELETE FROM products WHERE id = ?');
	mysqli_stmt_bind_param($req_pre, "i", $_POST['del_prod']);
	mysqli_stmt_execute($req_pre);
	if (!mysqli_close($db))
		exit(mysqli_error($db));
}

?>
