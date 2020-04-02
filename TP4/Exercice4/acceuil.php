<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
</head>
<body>
	<h3>Entrez vos identifiants:</h3>
	<form action="authentification.php" method="GET">
		<table>
			<tr>
				<td>Email</td>
				<td>: <input type="text" name="email" style="width: 200px; height: 20px"></td><br>	
			</tr>
			<tr>
				<td>Mot de passe</td>
				<td>: <input type="password" name="password" style="width: 200px; height: 20px"></td><br>
			</tr>
			<tr>
				<td><input type="submit" name="Envoyez"></td>
			</tr>
		</table>
	</form>
</body>
</html>