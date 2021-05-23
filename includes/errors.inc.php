<?php
// ERRORS FOR SIGN UP
    function emptyInputSignup($name, $email, $uid, $pwd, $pwd_repeat){
        $result;
        if(empty($name) || empty($email) || empty($uid) || empty($pwd) || empty($pwd_repeat)){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function invalidUid($uid){
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $uid)){
            $results = true;
        }
        else{
            $results = false;
        }
        return $results;
    }

    function invalidEmail($email){
        $result;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL, $uid)){
            $results = true;
        }
        else{
            $results = false;
        }
        return $results;
    }

    function invalidRepeatPwd($pwd, $pwd_repeat){
        $result;
        if($pwd != $pwd_repeat){
            $results = true;
        }
        else{
            $results = false;
        }
        return $results;
    }
    function userExists($conn, $uid, $email){
        $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../signup.php?error=userExists");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ss", $uid, $email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($userData = mysqli_fetch_assoc($resultData)){
            return $userData;
        }
        else{
            $result = false;
            return $result;
        }
        mysqli_stmt_close($stmt);
    }
// ERRORS FOR LOG IN
    function emptyLogin($uid, $pwd){
        $result;
        if(empty($uid) || empty($pwd)){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }
    