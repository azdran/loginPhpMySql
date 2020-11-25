<?php
	require 'database.php';

	$message = '';

	if (!empty($_POST['email']) && !empty($_POST['password'])) {
	 	$sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':email',$_POST['email']);
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		$stmt->bindParam(':password', $password);

		if ($stmt->execute()) {
			$message = 'Regisro Exitoso';
		} else {
			$message = 'Se produjo un Error creando tu Contraseña ';
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	
	<title>Registrate</title>	
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
	<?php require 'partials/header.php' ?>
	<?php if(!empty($message)):  ?>
		<p><?= $message ?></p>
		<?php endif; ?>

	<h1>Regitrate</h1>
	<span> or <a href="login.php">Login</a></span>

		<form action="singup.php" method="post">
			<input type="text" name="email" placeholder="Ingrese su correo">
			<input type="password" name="password" placeholder="Ingrese tu Contraseña">
			<input type="password" name="confir_password" placeholder="Confirma tu Contraseña">
			<input type="submit" value="Enviar"> 
		</form>



</body>
</html>