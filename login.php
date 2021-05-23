<?php
    include_once 'header.php'
?>

<section>
    <h2>LOG IN NOW~</h2>
    <form action="includes/login.inc.php" method="post">
        <input type="text" name="id" placeholder="Username/Email">
        <input type="password" name="pwd" placeholder="Password">
        <button type="submit" name="submit_login">LOG IN</button>
    </form>

    <?php
        if(isset($_GET["error"])){
            $errorType = $_GET["error"];
            if($errorType == "emptyLogin"){
                echo "<p>MISSING FIELDS</p>";
            }
            else if($errorType == "wrongUid"){
                echo "<p>USERNAME DOES NOT EXIST</p>";
            }
            else if($errorType == "wrongPwd"){
                echo "<p>PASSWORD INCORRECT</p>";
            }
        }
    ?>
</section>



<?php
    include_once 'footer.php'
?>