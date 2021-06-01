<?php
try {
    $dbname ='alumnos';
    $user = 'root';
    $password= 'Dani1234';
    $dsn = "mysql:host=localhost;dbname=$dbname";
    $dbh = new PDO($dsn, $user, $password);
    echo 'conectado';
} catch (PDOException $e){
    echo $e->getMessage();
}
?>