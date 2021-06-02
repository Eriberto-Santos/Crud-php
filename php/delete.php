<?php
include("./database.php");
$connetion = connection();

$id = $_GET['id'];

$delete = $connetion->prepare("DELETE FROM alumnos WHERE matricula='$id'");
$delete->execute();

if ($delete) {
    Header("Location: home.php");
}
