<?php
    session_start()
?>

<link rel="stylesheet" href="inc/product.css">

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
    require_once "inc/db_connect.php";
?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Enter Product Name"><br>
    <input type="file" name="docc" id=""><br>
    <input type="text" name="desc" placeholder="Enter Product Description"><br>
    <input type="number" name="price" id="" placeholder="Insert Initial Price"><br>
    <input type="number" name="sprice" id="" placeholder="Insert Selling Price"><br>
    <input type="submit" name="" id="">
</form>

<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $image = $_FILES['docc'];
        $desc = $_POST['desc'];
        $price = $_POST['price'];
        $sprice = $_POST['sprice'];
        $storage = "storage/";
        $move = $storage . basename($image['name']);
        $ess =  basename($image['name']);
        if(!in_array($image['type'], ['image/jpg'])){
            echo "<h1>File type not supported</h1>";
            echo "<h1>Choose another image</h1>";
        }else{
            if(move_uploaded_file($image['tmp_name'], $move)){
                echo "<h1>File Uploaded Successfully!</h1>";
            } else{
                echo "<h1>File Upload Failed!</h1>";
            }
        }
        

        $query = "INSERT INTO product(name, `image-url`, description, initial_price, selling_price) VALUES ('$name', '$ess', '$desc', '$price', '$sprice')";

        if (mysqli_query($conn, $query)) {
            echo "<h1>Product created successfully</h1>";
        } else {
            echo "<h1>Error: Product Creation failed</h1>";
        }
    }
?>