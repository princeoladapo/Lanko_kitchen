<?php 
    session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lanko Hot-Pot</title>
    <link rel="stylesheet" href="inc/styler.css">
</head>
<body>
    <header>
        <a href="index.php">
            <div>
                <h2>LANKO</h2>
                <h2 class="opt">HOT-POT</h2>
            </div>
        </a>
        <nav>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="menu.php">MENU</a></li>
                <li><a href="login.php">LOGIN</a></li>
                <?php if (isset($_SESSION["user_type"]) && $_SESSION ["user_type"] == "admin") {?>
                    <li><a href="product.php">CREATE PRODUCT</a></li>
                    <li><a href="logout.php">LOGOUT</a></li>
                <?php } else if  (isset($_SESSION["user_type"]) && $_SESSION ["user_type"] == "user") { ?>
                    <li><a href="order.php">ORDER FOOD</a></li>
                    <li><a href="logout.php">LOGOUT</a></li>
                <?php } ?>    
            </ul>
        </nav>
    </header>

    <div class="ban">
        <h1>LANKO HOT-POT</h1>
        <h2>No.1 Amala plug in Lagos</h2>
    </div>
    
