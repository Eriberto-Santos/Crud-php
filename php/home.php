<?php
session_start();
include('./database.php');
$connection = connection();

//Insertar registros
if (isset($_POST["insert"])) {
    $matricula = $_POST["matricula"];
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = $connection->prepare("INSERT INTO alumnos VALUE('$matricula','$fullname','$email', '$password')");
    $out = $query->execute();

    if ($out) {
        echo "insertado correctamente";
    } else {
        echo "hubo problemas";
    }
}

//mostrar todos los registros
$queryAll = $connection->prepare("SELECT * FROM alumnos");
$queryAll->execute();
$results = $queryAll->fetchAll(PDO::FETCH_OBJ);


if (isset($_SESSION['user_session'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/normalize.css">
        <link rel="stylesheet" href="../css/style.css">
        <title>Document</title>
    </head>

    <body>
        <header class="main-header">
            <div class="main-header__container">
                <h3><?php echo $_SESSION['user_session'] ?></h3>
                <a class="logout" href="./logout.php">Salir</a>
            </div>
        </header>
        <main class="main">
            <div class="form-container">
                <h2 class="title">Ingresa datos</h2>
                <form action="home.php" method="POST" class="form">
                    <input class="username" type="text" name="matricula" placeholder="Matricula">
                    <input class="username" type="text" name="fullname" placeholder="Tu nombre completo">
                    <input class="username" type="email" name="email" placeholder="Tu correo">
                    <input class="username" type="password" name="password" placeholder="Password">
                    <button class="button" name="insert">Registrate</button>
                </form>
            </div>
            <div class="table-container">
                <table border="1px solid #000">
                    <thead>
                        <tr>
                            <th>Matricula</th>
                            <th>Nombre Completo</th>
                            <th>Correo</th>
                            <th COLSPAN="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($results as $key => $value) {
                            echo
                            "
                            <tr>
                            <td>$value->matricula</td>
                            <td>$value->nombre_completo</td>
                            <td>$value->correo</td>
                            <td><a class='edit' href='send.php?id=$value->matricula'>Editar</a></td>
                            <td><a class='delete' href='delete.php?id=$value->matricula'>Eliminar</a></td>
                            </tr>
                            ";
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </body>

    </html>
<?php
} else {
    header("Location:../index.php");
}
?>