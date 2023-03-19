<?php

if (isset($_POST["reset-request-submit"])) {
    
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    
    $url = "www.medzodevlp55@gmail.com/create-new-password.php?selector=" .$selector . "&validator=" . 
    bin2hex($token);

    $expires = date("U") + 1800;

    require '../dbh.inc.php';

    $userEmail = $_POST["email"];

    $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?";
    $stmt = mysqli_stmt_init($conx);
    if (!mysqli_stmt_prepare($stmt ,$sql)) {
        echo "There is an error!";
        exit();
    }else {
        mysqli_stmt_bind_param($stmt  , "s" , $userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO  pwdreset (pwdResetEmail ,pwdResetSelector, pwdResetToken ,pwdResetExpires ) 
    VALUES(?,?,?,?)";

$stmt = mysqli_stmt_init($conx);
if (!mysqli_stmt_prepare($stmt ,$sql)) {
    echo "There is an error!";
    exit();
}else {
    $hashedToken = password_verify($token , PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt  , "ssss" , $userEmail ,$selector , $hashedToken ,$expires);
    mysqli_stmt_execute($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($conx);

$to = $userEmail;

$subject = "Reset your password for mtudu";

$message = "<p>we received a password reset request. the link to reset your password 
make this request you can ignore this email
</p>";
$message .= "<P>Here is your password reset link:<br>";
$message .= '<a href="  '.$url.' ">'  .$url.  '</a></P>';

$headers = "From: medzo <www.medzodevlp55@gmail.com>\r\n";
$headers .= "Replay-To: www.medzodevlp55@gmail.com\r\n";
$headers .= "Content-type: text/html\r\n";

mail($to ,$subject ,$message ,$headers);

header("Location: ../reset-password.php?reset=success ");
}
else {
    header("Location: ../index.php");
    exit();
}