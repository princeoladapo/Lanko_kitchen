<?php 
    session_start()
?>

<link rel="stylesheet" href="inc/login.css">

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

<?php
    if(isset($_SESSION['user_type'])) {
        header('Location: index.php');
        exit();
    }

    require_once 'inc/db_connect.php';


    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $pass = $_POST['password'];

        $query = "SELECT * FROM users WHERE email = '$email' ";
        $res = mysqli_query($conn, $query);

        if(mysqli_num_rows($res) == 1) {
            $users = mysqli_fetch_assoc($res);

            if($pass == $users['password']) {
                $_SESSION['user_id'] = $users['user_id'];
                $_SESSION['phone_number'] = $users['phone_number'];
                $_SESSION['name'] = $users['name'];
                $_SESSION['user_type'] = $users['user_type'];

                header('location: index.php');
                exit;
            } else {
                echo '<h1>Invalid Password<h1/>';
            }
        } else {
        echo '<h1>Invalid Email</h1>';
        }
    }
?>


<h1>Login</h1>
<form action="" method="post">
    EMAIL <input type="email" name="email" placeholder="Enter Email Address"  class="put"><br>
    PASSWORD <input type="password" name="password" id="" placeholder="Enter Password"  class="put"><br>
    <input type="submit" value="Login" class="btn">
    <p>Don't have an account? click <a href="register.php">Here</a> to register</p>
</form>
