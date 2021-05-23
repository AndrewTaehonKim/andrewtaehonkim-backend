<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <nav>
        <div class="wrapper">
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php
                    if(isset($_SESSION["userid"])){
                        echo "<li><a href='profile.php'>Profile</a></li>";
                        echo "<li><a href='includes/logout.inc.php'>Log Out</a></li>";
                    }
                    else{
                        echo "<li><a href='login.php'>Log in</a></li>";
                        echo "<li><a href='signup.php'>Sign Up</a></li>";
                    }
                ?>
            </ul>
        </div>
    </nav>
    <div>
        <?php
            if(isset($_SESSION["userid"])){
                echo "<h1>Welcome " . $_SESSION["name"] . "</h1>";
            }
        ?>
    </div>