<?php
// header.php
session_start();                     


$home      = 'index.php';
$about     = 'discover.php';
$register  = 'register.php';
$login     = 'login.php';
$logout    = 'logout.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http_equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style01.css">

    <title>PHP Project 02</title>
</head>
<body>
    <div class="menu">
      <div class="container flex">
         <div class="main_menu">
        </div>
        <div class="logo">
            <img src="img/logo.png" alt="King">
        </div>

        <ul>
            <li><a href="<?= $home; ?>">Home</a></li>
            <li><a href="<?= $about; ?>">About_Us</a></li>
              
           <?php if (empty($_SESSION['useruid'])): ?>
            
                <li><a href="<?= $register; ?>">register  </a></li>
                <li><a href="<?= $login; ?>">Login </a></li>
            <?php else: ?>
               <li><a href="<?= $logout; ?>">logout</a></li>
            <?php endif; ?>

           
        </ul>
      </div>
    </div>
 