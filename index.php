<?php
require('php/database.php');
$message = '';

if (isset($_POST["button"])) {
    session_start();
    $email = $_POST["email"];
    $password = $_POST["password"];

    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = $connection->prepare("SELECT * FROM alumnos WHERE correo=:correo AND password=:pass");
    $query->bindParam(":correo", $email);
    $query->bindParam(":pass", $password);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['user_session'] = $user["correo"];
        header("Location:./php/home.php");
    } else {
        $message = "correo o contraseña incorrectos!!!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Crud with php</title>
</head>

<body>
    <form action="index.php" method="POST" class="form">
        <h1 class="title">Inicia sesión</h1>
        <input class="username" type="email" name="email" placeholder="Ingresa tu correo">
        <input class="password" type="password" name="password" placeholder="Password">
        <button class="button" name="button">Inicia sesión</button>
        <span class="message"><?php echo $message; ?></span>
    </form>
</body>

</html>