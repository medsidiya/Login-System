<?php
    session_start();
    ?>

    <!DOCTYPE html>
<html lang = 'en'>
    <head>
        <meta charset = 'UTF-8'>
        <meta http-equiv = 'X-UA-Compatible' content = 'IE=edge'>
        <meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
        <title>Document</title>
    <link rel = 'stylesheet' href = 'css/style.css'>
</head>
<body>
<body>
    <section class="container forms">

        <!-- Signup Form -->

<div class="form signup">
    <div class="form-content">
        <header>Signup</header>
        <?php 
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "emptyfields") {
                    echo '<p class="singnuperror">Fill in all fields!</p>';
                }
                else if($_GET['error'] == "invalidemail"){
                    echo '<p class="singnuperror">Email is not correct!</p>';
                }
                else if($_GET['error'] == "invaliduid"){
                    echo '<p class="singnuperror">Please entre your name !</p>';
                }
                else if($_GET['error'] == "passwordcheck"){
                    echo '<p class="singnuperror">password is not correct!</p>';
                }
                else {
                    echo '<p class="singnupsuccess">singnup success!</p>';
                }
            }
        ?>
        
        <form action="./includes/singnup.inc.php">
            <div class="field input-field">
                <input type="text" placeholder="Username" name="uid" class="input">
            </div>
            <div class="field input-field">
                <input type="email" placeholder="Email" name="mail" class="input">
            </div>

            <div class="field input-field">
                <input type="password" placeholder="Create password" name="pwd" class="password">
            </div>

            <div class="field input-field">
                <input type="password" placeholder="Confirm password" name="pwd-repeat" class="password">
                <i class='bx bx-hide eye-icon'></i>
            </div>

            <div class="field button-field">
                <button  type="submit" name="singnup-submit">Signup</button>
            </div>
        </form>

        <div class="form-link">
            <span>Already have an account? 
                <a href="./index.php" class="link login-link">Login</a>//
                <a href="./includes/logout.inc.php" class="link login-link">Logout</a>

            </span>
        </div>
    </div>

</div>

     
    </section>
</body>
</html>