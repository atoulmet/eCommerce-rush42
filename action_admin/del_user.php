<?php

if ($_POST['del_user'])
{
	$db = get_connect("private");
	$req_pre = mysqli_prepare($db, 'DELETE FROM users WHERE login = ?');
	mysqli_stmt_bind_param($req_pre, "s", $_POST['del_user']);
	mysqli_stmt_execute($req_pre);
	if (!mysqli_close($db))
		exit(mysqli_error($db));
}

?>
