<!DOCTYPE html>
<html>
<head>
	<title>Challenge</title>
	<link rel="stylesheet" type="text/css" href="css/style_login.css">
</head>
<body>
	<div class="header">
		<h2>Welcom to LAKA</h2>
	</div>
	
	<form method="post" action="login.php">	
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn"
						name="login_user">
				Login
			</button>
		</div>
	</form>

</body>
</html>
