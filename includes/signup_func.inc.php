<?php

    function createUser($conn, $name, $email, $uid, $pwd){
        $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../signup.php?error=stmtFailed");
            exit();
        }
        // hash pasword
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $uid, $hashedPwd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../login.php?error=none");
        exit();
    }

    