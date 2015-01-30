<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Mini chat</title>
	</head>

	<body>

		<center>
			<form action="minichat_post.php" method="post">
				Nickname :<br />
				<input type="text" name="nickname" value="<?php if (isset($_COOKIE['nickname'])) { echo $_COOKIE['nickname']; } ?>"/>
				<br /><br />
				Message :<br /> 
				<textarea name="message" rows="5" cols="50" style="resize:none"></textarea>
				<br /><br />
				<input type="submit" value="OK" />
			</form>
		</center>

		<?php
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

			// We get all the entries from the minichat table.
			$request = $bdd->query('SELECT * FROM minichat ORDER BY id DESC LIMIT 0, 15');

			/* We use a for loop to show every message one by one.
			htmlspecialchars is used to prevent the execution of HTML code
			if a nickname or a message contains HTML tags. */
			while ($messages = $request->fetch()) {
				echo '<p><strong>' . htmlspecialchars($messages['nickname'])
				 . '</strong> : ' . htmlspecialchars($messages['message']) . '<p>';
			}

			$request->closeCursor();
		?>

	</body>
</html>
