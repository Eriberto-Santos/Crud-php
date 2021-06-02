<?php
try {
    $dbname = 'alumno';
    $user = 'root';
    $password = '';
    $dsn = "mysql:host=localhost;dbname=$dbname";
    $connection = new PDO($dsn, $user, $password);
    echo "conectado";
} catch (PDOException $e) {
    echo $e->getMessage();
}

return $connection;