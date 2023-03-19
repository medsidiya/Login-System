<?php

if (isset($_REQUEST['singnup-submit'])) {
   require '../dbh.inc.php';
   
   $username =$_REQUEST['uid'];
   $email =$_REQUEST['mail'];
   $password =$_REQUEST['pwd'];
   $passwordRepeat =$_REQUEST['pwd-repeat'];

   if (empty($username) || empty($email) || empty($password) ||empty($passwordRepeat) ) {
       header("location: ../singnup.php?error=emptyfields&uid=".$username ."&mail".$email);
       exit();
   }
   else if(!filter_var($email , FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/" , $username) ){
        header("location: ../singnup.php?error=invalidemail&uid=");
        exit();
   }
    else if(!filter_var($email , FILTER_VALIDATE_EMAIL)){
        header("location: ../singnup.php?error=invalidemail&uid=".$username);
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/" , $username)){
        header("location: ../singnup.php?error=invaliduid&uid=".$email);
        exit();
    }
    else if($password !== $passwordRepeat ){
        header("location: ../singnup.php?error=passwordcheck&uid=".$username ."&mail".$email);
        exit();
    }
    else{
        $sql ="SELECT uidUsers from users WHERE uidUsers=?";
        $stmt = mysqli_stmt_init($conx);

        if (!mysqli_stmt_prepare($stmt , $sql)) {
            header("location: ../singnup.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt , "s" ,$username );
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if ($resultCheck > 0) {
                header("location: ../singnup.php?error=sqlerror&mail=".$email);
                exit();
            }
            else{
                $sql ="INSERT INTO users (uidUsers , emailUsers , pwdUsers) VALUE (?,?,?)";
                $stmt = mysqli_stmt_init($conx);

                if (!mysqli_stmt_prepare($stmt , $sql)) {
                    header("location: ../singnup.php?error=sqlerror");
                    exit();
                }
                else {
                    $hashedpwd = password_hash($password , PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt , "sss" ,$username ,$email ,$hashedpwd );
                    mysqli_stmt_execute($stmt);
                    header("location: ../singnup.php?singnup=succes");
                    exit();
                
                }

            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conx);
}
else{
    header("location: ../singnup.php");
    exit();
}
?>
