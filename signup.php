<?php
    include_once 'header.php'
?>

<section>
    <h2>WELCOME TO THE SIGN UP PAGE!</h2>
    <form action="includes/signup.inc.php" method="post">
        <input type="text" name="name" placeholder="Full Name">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="uid" placeholder="Username">
        <input type="password" name="pwd" placeholder="Password">
        <input type="password" name="pwd_repeat" placeholder="Retype Password">
        <button type="submit" name="submit_signup">SIGN UP</button>
    </form>

    <?php
        if(isset($_GET["error"])){
            $errorType = $_GET["error"];
            if($errorType == "emptyInput"){
                echo "<p>MISSING FIELDS</p>";
            }
            else if($errorType == "invalidUid"){
                echo "<p>INVALID USERNAME</p>";
            }
            else if($errorType == "invalidEmail"){
                echo "<p>INVALID EMAIL</p>";
            }
            else if($errorType == "invalidRepeatPwd"){
                echo "<p>PASSWORDS DO NOT MATCH</p>";
            }
            else if($errorType == "userExists"){
                echo "<p>USERNAME ALREADY EXISTS</p>";
            }
            else if($errorType == "stmtFailed"){
                echo "<p>SOMETHING WENT WRONG :(</p>";
            }
            else if($errorType == "none"){
                echo "<p>CONGRADULATIONS~ YOU ARE NOW SIGNED UP!</p>";
            }
        }
    ?>
</section>



<?php
    include_once 'footer.php'
?>