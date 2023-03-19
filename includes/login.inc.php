<?php
if (isset($_REQUEST['login-submit'])) {
    require '../dbh.inc.php';

    $mailuid =$_REQUEST['mailuid'];
    $password =$_REQUEST['pwd'];

    if (empty($mailuid) || empty($password)) {
        header("location: ../logout.php?error=emptyfileds");
        exit();
    }else {
        $sql = "SELECT * FROM users WHERE uidUsers =? OR emailUsers=?;";
        $stmt = mysqli_stmt_init($conx);
        if (!mysqli_stmt_prepare($stmt , $sql)) {
            header("location: ../index.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt , "ss" , $mailuid,$mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) { 
                $pwdCheck = password_verify($password ,$row['pwdUsers']);
                if ($pwdCheck == false) {
                    header("location: ../index.php?error=Wrong-password");
                    exit(); 
                }else if($pwdCheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUid'] = $row['uidUsers'];

                    header("location: ../index.php?login=success");
                    exit();
                }
            }else {
                header("location: ../index.php?error=no-user");
                exit();
            }
        }
    }
}
else{
    header("location: ../index.php");
    exit();
}