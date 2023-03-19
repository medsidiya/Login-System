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
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <div class="main">
    <div class="section-default">
    <h1>Singup</h1>
    <form action="./includes/singnup.inc.php" methode="POST">
       <input type="text" name="uid" placeholder ="Username"><br>
       <input type="email" name="mail" placeholder ="Email"><br>
       <input type="password" name="pwd" placeholder ="password"><br>
       <input class="inp" type="password" name="pwd-repeat" placeholder ="repeat-password"><br>
       <button type="submit" name="singnup-submit" class="butt">singnup</button>
      </form>
      
      <form action="./includes/login.inc.php"  class="login" methode="POST">
        <input type="text" name="mailuid" placeholder ="Username"><br>
        <input type="password" name="pwd" placeholder ="password"><br>
        <button type="submit" name="login-submit" class="butt">login</button>
    </form>
    </div>
  </div>
</body>
</html>