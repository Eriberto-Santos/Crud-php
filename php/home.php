<?php
session_start();
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
                <h3><?php echo $_SESSION['user_session']?></h3>
                <a class="logout" href="./logout.php">Salir</a>
            </div>
        </header>
        <h1>Welcome to Home</h1>
    </body>

    </html>
<?php
} else {
    header("Location:../index.php");
}
?>