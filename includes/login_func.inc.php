<?php
    require_once 'errors.inc.php';

    function loginUser($conn, $id, $pwd){
        $uid = userExists($conn, $id, $id);
        
        if($uid === false){
            header("location: ../login.php?error=wrongUid");
            exit();
        }

        $hashedPwd = $uid["usersPwd"];
        $checkPwd = password_verify($pwd, $hashedPwd);
        if($checkPwd === false){
            header("location: ../login.php?error=wrongPwd");
            exit();
        }
        else if ($checkPwd === true){
            session_start();
            $_SESSION["userid"] = $uid["usersID"];
            $_SESSION["name"] = $uid["usersName"];
            $_SESSION["Uid"] = $uid["usersUid"];
            header("location: ../index.php");
            exit();
        }
    }