<?php 
    include_once 'header.php';
?>
    <section class = "login ">
    <h2> login system </h2>
    <div class ="login_form">
    <form action="includes/login.inc.php" method="post">
       <input type="taxt" name="uid" placeholder="User name/Email ....">
        <input type="pass word" name="pwd"  placeholder="Pass Word  ....">
        >
        <button type = "login" name = "submit" >login </button>
    </form>
    </div>

     <?php 
if (isset($_GET["error"])) 
{
    if ($_GET ["error"] == "emptyinput"){
        echo "<p> Fill in all fields! </p>";
    } 
    
     else if ($_GET ["error"] == "wornglogin"){
        echo "<p>Incorrect login information !</p>";
    }
}

   ?>
    </section>
    
    


<?php 
    include_once 'footer.php';
?>