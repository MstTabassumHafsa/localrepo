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
    <title>Search page</title>

    <!-- Font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


    <!-- custom css file link -->
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/style2.css">

</head>
<body>

    <?php include 'header.php'; ?>









    <?php include 'footer.php'; ?>
    <!-- custom js file link -->
     <script src="js/script1.js"></script>
    
</body>
</html>