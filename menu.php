<?php 
    session_start()
?>

<link rel="stylesheet" href="inc/menu.css">

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

<h1>MENU PAGE</h1>