<?php  
	
	session_start();

	require 'database.php';

	if (isset($_SESSION['user_id'])) {
		$records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
		$records->bindParam(':id', $_SESSION['user_id']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);
		
		$user = null;

		if(count($results) > 0){
			$user = $results;
		}

	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIENVENIDO A TU APP</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>

	<?php require 'partials/header.php' ?>

	<?php if(!empty($user)):  ?>
	<br>BIENVENIIDO. <?= $user['email'] ?>
	<br> Sesión Iniciada Correctamente
	<a href="logout.php">Logout</a>

	<?php else:  ?>
  		  <h1>Por Favor Registrate o Inicia Sesión</h1>
    
    <a href="login.php">Inica Sesión</a> or 
    <a href="singup.php">Registrarse</a>
    <?php endif; ?>

</body>
</html>