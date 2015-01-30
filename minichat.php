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
				<input type="text" name="nickname" />
				<br /><br />
				Message :<br /> 
				<textarea name="message" rows="5" cols="50" style="resize:none"></textarea>
				<br /><br />
				<input type="submit" value="OK" />
			</form>
		</center>

	</body>
</html>
