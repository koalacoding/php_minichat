<?php
	// We will use a cookie to store the nickname.
	setcookie('nickname', $_POST['nickname'], time() + 365*24*3600, null, null, false, true);;
	// We try to connect to the SQL database.
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test2;charset=utf8', 'root', '');
	}
	// In case of error.
	catch(Exception $e)
	{
	        die('Error : '.$e->getMessage());
	}

	// Inserting into the SQL database the nickname and the message the user entered.
	if (isset($_POST['nickname']) AND isset($_POST['message'])) {
		/* The SESSION variable "nickname" will be the nickname the user wrote
		while sending a message. */
		$_SESSION['nickname'] = $_POST['nickname'];

		$request = $bdd->prepare('INSERT INTO minichat(nickname, message) VALUES(:nickname, :message)');
		$request->execute(array(
			'nickname' => $_POST['nickname'],
			'message' => $_POST['message']));

		$request->closeCursor();
	}

	// Redirects the user to minichat.php.
	header('Location: minichat.php');
?>