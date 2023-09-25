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
    <link rel="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" href="">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="nav">
        <div class="logo"><img src="./image/kirby.gif" alt="logo">HOPS..</div>
            <ul class="navItems">

                <li><a href="#">Home</a></i></li>
                <li><a href="crud.php">Crud</a></li>
                <li><a href="php/logout.php"><button class="btn">Log out</button></a></li>
            </ul>
        </div>
    </div>


    <div class="container">
        <div class="wrapper">
            <div class="cols cols0">
                <span class="topline">Welcome</span>
                <h1><span class="multiText"></span></h1>
                <p>Remember to do your task our admin or gengar will hunt you!!</p>
            </div>
            <div class="cols cols1">
                <div class="imgbox">
                    <img src="./image/gengar.gif" class="float-end" id="">
                </div>
            </div>
        </div>

    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        var typingEffect = new Typed(".multiText",{ 
            strings : ["Admin"],
            loop : true,
            typeSpeed : 100,
            backSpeed: 80,
            backDelay : 1500, 
        })
    </script>

</body>
</html>