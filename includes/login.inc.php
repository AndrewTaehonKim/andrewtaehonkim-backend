<?php
    if(isset($_POST["submit_login"])){

        $id = $_POST["id"];
        $pwd = $_POST["pwd"];

        require_once 'dbh.inc.php';
        require_once 'errors.inc.php';
        require_once 'login_func.inc.php';
        
        if (emptyLogin($id, $pwd) !== false){
            
            header("location: ../login.php?error=emptyLogin");
            exit();
        }
        
        loginUser($conn, $id, $pwd);
    }
    else{
        header("location: ../login.php");
    }