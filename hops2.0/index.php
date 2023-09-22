<?php
    session_start();
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
                <li><a href="#"></a></i></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></a></li>
                <li><a href="#"></a></a></li>
            </ul>
        </div>
    </div>
    
    <div class="container">
        <div class="box form-box">

            <?php
            
                include("php/config.php");
                if(isset($_POST['submit'])){
                    $email = mysqli_real_escape_string($con,$_POST['email']);
                    $password = mysqli_real_escape_string($con,$_POST['password']);

                    //result email

                    $result = mysqli_query($con,"SELECT * FROM users WHERE Email='$email' AND Password='$password' ") or die("Select Error");
                    $row = mysqli_fetch_assoc($result);

                    if(is_array($row) && !empty($row)){
                        $_SESSION['valid'] = $row['Email'];
                        $_SESSION['username'] = $row['Username'];
                        $_SESSION['age'] = $row['Age'];
                        $_SESSION['id'] = $row['Id'];
                    }
                    else{
                        echo "<div class='message'>
                        <p>Wrong username or Password</p>
                        </div> <br>";
                        echo "<a href='index.php'><button class='btn'>Go Back</button>";
                    }
                    if(isset($_SESSION['valid'])){
                        header("Location: home.php");
                    }
                }else{

            
            ?>
            <header>Login</header>
            <form action="" method="post">
                <!--Username-->
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>
                <!--Password-->
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>
                <!--Submit-->
                <div class="field input">
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Don't have an account? <a href="register.php">Sign up now</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>

</body>
</html>