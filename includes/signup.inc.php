<?php
    // If user correctly enters data
    if(isset($_POST["submit_signup"])){

        $name = $_POST["name"];
        $email = $_POST["email"];
        $uid = $_POST["uid"];
        $pwd = $_POST["pwd"];
        $pwd_repeat = $_POST["pwd_repeat"];

        require_once 'dbh.inc.php';
        require_once 'errors.inc.php';
        require_once 'signup_func.inc.php';

        if(emptyInputSignup($name, $email, $uid, $pwd, $pwd_repeat) !== false){
            header("location: ../signup.php?error=emptyInput");
            exit();
        }
        if(invalidUid($uid) !== false){
            header("location: ../signup.php?error=invalidUid");
            exit();
        }
        if(invalidEmail($email) !== false){
            header("location: ../signup.php?error=invalidEmail");
            exit();
        }
        if(invalidRepeatPwd($pwd, $pwd_repeat) !== false){
            header("location: ../signup.php?error=invalidRepeatPwd");
            exit();
        }
        if(userExists($conn, $uid, $email) !== false){
            header("location: ../signup.php?error=userExists");
            exit();
        }

        createUser($conn, $name, $email, $uid, $pwd);

    }
    else{
        header("location: ../signup.php");
    }