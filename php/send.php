<?php
require('./database.php');

$connection = connection();
$id = $_GET['id'];

//Buscar registro
$query = $connection->prepare("SELECT * FROM alumnos WHERE matricula='$id'");
$query->execute();
$results = $query->fetchAll();

//actualizar

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<body>
    <form action="update.php" method="POST" class="form">
        <h1 class="title">Edita estos datos</h1>
        <input class="username" type="text" name="matricula" value="<?php echo $results[0]['matricula'] ?>">
        <input class="username" type="text" name="fullname" value="<?php print_r($results[0]['nombre_completo']) ?>">
        <input class="username" type="email" name="email" value="<?php print_r($results[0]['correo']) ?>">
        <input class="username" type="password" name="password" value="<?php print_r($results[0]['password']) ?>">
        <button class="button" type="submit">Registrate</button>
    </form>
</body>

</html>