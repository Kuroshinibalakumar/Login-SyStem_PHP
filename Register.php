<?php 
    include_once 'header.php';
?>
    <section class = "Register_form ">
    <h2> Register_form</h2>
    <div class ="Register-form-form">
    
    <form action="includes/Register.inc.php" method="post">
    <input type="text" name="name" placeholder="Full name">
    <input type="email" name="email" placeholder="Email">
    <input type="text" name="uid" placeholder="Username">
    <input type="password" name="pwd" placeholder="Password">
    <input type="password" name="pwdrepeat" placeholder="Repeat password">
    <button type="submit" name="submit">Register</button>
</form>

    </div>
 
   <?php 
if (isset($_GET["error"])) 
{
    if ($_GET ["error"] == "emptyinput"){
        echo "<p> Fill in all fields! </p>";
    } 
    
     else if ($_GET ["error"] == "invaliduid") { 
        echo "<p>Choose a proper username!</p>";
    }

    else if ($_GET ["error"] == "invaliemail") { 
        echo "<p>Choose a proper email! </p>" ; 
    }
    else if ($_GET ["error"] == "passwordsdontmatch") { 
        echo "<p>password doesn't match!</p>" ;
    }
     else if ($_GET ["error"] == "stmtfailed") { 
        echo "<p> Samething want wrong, try againt! </p>";
    }
    else if ($_GET ["error"] == "usernametaken"){ 
        echo "<p>username already taken ! </p>";
    }

    else if ($_GET ["error"] == "none" ) { 
        echo "<p> you have signed up!</p>";
    }
}

   ?>

      </section>
    


<?php 
    include_once 'footer.php';
?>