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
        <header>Reaset your password</header>
         <p>An Email will be send to you with instraction on how to reset your password.</p>
         <form action="includes/reset-request.inc.php" method="post">
            <input type="text" name="email" placeholder="entre your email address.." >
            <button type="submit" name="reset-request-submit">Receive a new password by email</button>
         </form>
        <?php
              if (isset($_GET['reset'])) {
                if($_GET['reset']='success'){
                  echo "<div class='message'>Check your Email Success</div>";
                }
            }


        ?>
   </div>
</div>
    </section>
</body>
</html>