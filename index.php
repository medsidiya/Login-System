<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = 'stylesheet' href = 'css/style.css'>
</head>
<body>
<body>
<section class="container forms">
    <div class="form login">
        <div class="form-content">
            <header>Login</header>
            <?php 
            if (isset($_GET['login'])) {
              if($_GET['singup']='succes'){
                echo "<div class='message'>Login Success</div>";
              }
            else{
              echo "<div class='message'>Login out</div>"; 
            }
          }
            ?>
            <form action="./includes/login.inc.php">
                <div class="field input-field">
                    <input type="text" placeholder="Username" name="mailuid" class="input">
                </div>

                <div class="field input-field">
                    <input type="password" placeholder="Password" name="pwd" class="password">
                    <i class='bx bx-hide eye-icon'></i>
                </div>

                <?php 
                    if (isset($_GET['newpwd'])) {
                    if($_GET['newpwd']='passwordupdated'){
                        echo "<p class='message'>Your password has been reset</p>";
                    }
                }
                    ?>

                <div class="form-link">
                    <a href="reset-password.php" class="forgot-pass">Forgot password?</a>
                </div>

                <div class="field button-field">
                    <button  type="submit" name="login-submit">Login</button>
                </div>
            </form>

            <div class="form-link">
                <span>Don't have an account? <a href="./singnup.php" class="link signup-link">Signup</a></span>
            </div>
        </div>

            </div>
            </div>
        </section>
</body>
</html>