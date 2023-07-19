<?php 
    require_once "inc/header.php";
    require_once "inc/db_connect.php";
?>
<link rel="stylesheet" href="inc/registration.css">

<div class="head">
    <h1>REGISTER AN ACCOUNT</h1>
</div>

<p>Already have an accout? Click <a href="login.php">Here</a> to login</p>
<form action="" method="post">
    <h4>NAME</h4>
    <input type="text" name="name" placeholder="Name" class="put">
    <h4>PHONE</h4>
    <input type="number" name="phone" placeholder="Phone" class="put">
    <h4>EMAIL</h4>
    <input type="text" name="email" placeholder="Enter valid email address" class="put">
    <h4>PASSWORD</h4>
    <input type="password" name="password" placeholder="Enter Password" class="put">
    <h4>COMFIRM PASSWORD</h4>
    <input type="password" name="cpassword" placeholder="Re-Enter Password" class="put"><br>
    <input type="submit" value="REGISTER" class="btn">
</form> 

<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email']; 
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        if ($password != $cpassword){
            exit();
        } else{
            $hashpass = password_hash($password, PASSWORD_DEFAULT);
        }

        $checkemail = "SELECT * FROM users WHERE email = 'email'";
        $res = mysqli_query($conn, $checkemail);
        if (mysqli_num_rows($res) > 0) {
            echo "Email already exists";
            exit();
        }
        

        $query = "INSERT INTO `users`(name, phone_number, email, password) VALUES ('$name', '$phone', '$email', '$password')";

        if (mysqli_query($conn, $query)) {
            echo "<h1>User Registered successfully</h1>";
        } else {
            echo "<h1>Error: User registration failed</h1>";
        }
    }
?>