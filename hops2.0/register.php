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
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    //verify email

                    $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

                    if(mysqli_num_rows($verify_query) !=0){
                        echo "<div class='message'>
                            <p>This email is used, Try another One Please!</p>
                            </div> <br>";
                        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                    }
                    else{

                        mysqli_query($con, "INSERT INTO users(Username,Email,Password) VALUES('$username','$email','$password')") or die("Error Occured");

                        echo "<div class='message'>
                            <p>Registration successfully!</p>
                            </div> <br>";
                        echo "<a href='index.php'><button class='btn'>Login Now</button>";
                    }
                }else{
            ?>
            <header><span class="multiText"></span></header>
            <form action="" method="post">
                <!--Username-->
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>
                <!--Email-->
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
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already have an account? <a href="index.php">Sign In</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>

    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
    
    
    <script>
        var typingEffect = new Typed(".multiText",{ 
            strings : ["Sign Up"],
            loop : true,
            typeSpeed : 100,
            backSpeed: 80,
            backDelay : 1500, 
        })
    </script>

</body>
</html>