<?php
    session_start();
    include("php/config.php");
    if(!isset($_SESSION['valid'])){
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hops Admin</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="nav">
        <div class="logo"><img src="./image/kirby.gif" alt="logo">HOPS..</div>
            <ul class="navItems">

                <li><a href="#">Home</a></i></li>
                <li><a href="#">Crud</a></li>
                <li><a href="php/logout.php"><button class="btn">Log out</button></a></li>
            </ul>
        </div>
    </div>

</body>
</html>
