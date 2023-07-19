<link rel="stylesheet" href="inc/login.css">

<header>
        <a href="index.php">
            <div>
                <h2>LANKO</h2>
                <h2 class="pot">HOT-POT</h2>
            </div>
        </a>
        <nav>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="register.php">REGISTRATION</a></li>
                <li><a href="login.php">LOGIN</a></li>
                <li><a href="logout.php">LOGOUT</a></li> 
            </ul>
        </nav>
</header>

<?php 
    if(isset($_SESSION['user_type'])) {
        header('Location: index.php');
        exit();
    }

    require_once 'inc/db_connect.php';


    // Check if the login form was submitted successfully
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $pass = $_POST['password'];

        $query = "SELECT * FROM users WHERE email = '$email' ";
        $res = mysqli_query($conn, $query);

        if(mysqli_num_rows($res) == 1) {
            $users = mysqli_fetch_assoc($res);
            
            if (password_verify($pass, $users['password'])) {
                $_SESSION['user_type'] = $users['user_type'];
                $_SESSION['user_id'] = $users['user_id'];
                header('Location: index.php');
                exit;
            } else {
                echo '<h1>Invalid Password</h1>';
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
    <p>Don't have an account? click <a href="registration.php">Here</a> to register</p>
</form>
