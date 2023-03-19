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
       <?php
            $selector =$_GET["selector"];
            $validator =$_GET["validator"];
            
            if (empty($selector) || empty($validator)) {
               echo "Could Not validate your request!";
            }else {
               if (ctype_xdigit($selector) !==false && ctype_xdigit($validator) !==false ) {
                ?>
                    <form action="includes/reset-password.inc.php" method="post">
                       <input type="hidden" name="selector" value="<?php  echo $selector ?>">
                       <input type="hidden" name="selector" value="<?php  echo $validator ?>">
                       <input type="password" name="pwd" placeholder="entre a new password" value="">
                       <input type="password" name="pwd-repeat"   placeholder="Reset a new password" value="">
                       <button type="submit" name="reset-password-submit">Reset password</button>

                    </form>

                <?php
               }
            }
       ?>

   </div>
</div>
    </section>
</body>
</html>