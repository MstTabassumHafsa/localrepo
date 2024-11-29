<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_id'])){
    header('location:login_form.php');
}

// Define the $user_id variable
$user_id = $_SESSION['user_id'];

if(isset($_POST['add_product'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/'.$image;

    $select_product_name = mysqli_query($conn, "SELECT name FROM `donates` WHERE name = '$name'") or die('query failed');
    
    if(mysqli_num_rows($select_product_name) > 0){
        $message[] = 'product name is already added';
        // Redirect to avoid form resubmission
        header("Location: donate.php");
        exit(); 
    }else{
        $add_product_query = mysqli_query($conn, "INSERT INTO `donates`(name, price, image) VALUES('$name', '$price', '$image')") or die('query failed');
    
        if($add_product_query){
            if($image_size > 2000000){
                $message[] = 'image size is too large';
            }else{
                move_uploaded_file($image_tmp_name, $image_folder);
                $message[] = 'product added successfully!';
                            
            }
            }else{
                $message[] = 'product could not be added!';
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exchange Book</title>

    <!-- Font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


    <!-- custom css file link -->
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>

<?php include 'header.php'; ?>



<!-- products CRUD section starts -->

<!-- show products -->

<section class="show-products">

    <div class="box-container">

        <?php
        
            $select_products = mysqli_query($conn, "SELECT * FROM `donates`") or die('query failed');
            if(mysqli_num_rows($select_products) > 0){
                while($fetch_products = mysqli_fetch_assoc($select_products)){

            ?>
            <div class="box">
                <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
                <div class="name"><?php echo $fetch_products['name']; ?></div>
                <div class="price-details">
                <span class="delivery-charge">Delivery Charge: $</span>
                <span class="price"><?php echo $fetch_products['price']; ?></span>
                </div>

                <!-- <h1>delivery charge:</h1>
                <div class="price">$<?php echo $fetch_products['price']; ?>/-</div> -->
                <!-- <a href="admin_products.php?update=<?php echo $fetch_products['id']; ?>" class="option-btn">update</a> -->
                <!-- <a href="donate.php?delete=<?php echo $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('delete this products');" >delete</a> -->
                <a href="contact.php" class="btn">contact/request for the book</a>

            </div>        
            <?php
                }
            }else{
                echo '<P class="empty">no product added yet!</p>';
            }
        ?>

    </div>

</section>




    <!-- custom admin js file link     -->
    <script src="js/admin_script.js"></script>

</body>
</html>