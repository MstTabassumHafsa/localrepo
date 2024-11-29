<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_id'])){
    header('location:login_form.php');
}

// Define the $user_id variable
$user_id = $_SESSION['user_id'];

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about</title>

    <!-- Font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


    <!-- custom css file link -->
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/style2.css">
 
</head>
<body>

<?php include 'header.php'; ?>

<div class="heading">
    <h3>about us</h3>
    <p><a href="home.php">home</a>/about</p>
</div>
    
<section class="about">

<div class="flex">
    <div class="image">
        <img src="image/deal-img.jpg" alt="">
    </div>

    <div class="content">
        <h3>why choose us?</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima perspiciatis tenetur tempore nobis facilis error porro. Omnis minus ea consequuntur tenetur debitis amet voluptatibus iusto. Quibusdam, fugit. Excepturi, dolorem libero.Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus enim quibusdam obcaecati sequi rem optio. Ipsam atque deserunt numquam quisquam tenetur? Sequi illum pariatur aut omnis eaque aliquid doloremque facilis!</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit officia ab deserunt dignissimos architecto! Accusamus soluta quos eius quo dolorem?</p>
        <a href="contact.php" class="btn">contact us</a>
    </div>

</div>

</section>








    <?php include 'footer.php'; ?>
    <!-- custom js file link -->
     <script src="js/script1.js"></script>
    
</body>
</html>