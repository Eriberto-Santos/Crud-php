<?php
require('./database.php');
$connection = connection();

$matricula = $_POST["matricula"];
$fullname = $_POST["fullname"];
$email = $_POST["email"];
$password = $_POST["password"];

$query = $connection->prepare("UPDATE alumnos SET matricula='$matricula',nombre_completo='$fullname',correo='$email', password='$password' WHERE matricula='$matricula'");
$query->execute();

if ($query) {
    header("Location:home.php");
}
