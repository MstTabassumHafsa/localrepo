<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_id'])){
    header('location:login_form.php');
}

// Define the $user_id variable
$user_id = $_SESSION['user_id'];

if(isset($_POST['sent'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = $_POST['number'];
    $msg = mysqli_real_escape_string($conn, $_POST['message']);

    // Check if the message is already in the database
    $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

    if(mysqli_num_rows($select_message) > 0){
        $message[] = 'message sent already';
    }else{
        // Insert the message into the database
        mysqli_query($conn, "INSERT INTO `message` (user_id, name, email, number, message) VALUES('$user_id','$name','$email','$number','$msg')") or die('query failed');
        $message[] = 'message sent successfully';
    }

    // After database insertion, set up data for Formspree
    $formspree_url = 'https://formspree.io/f/mqazwojk';
    $data = [
        'name' => $name,
        'email' => $email,
        'number' => $number,
        'message' => $msg
    ];

    // Use cURL to send the form data to Formspree
    $ch = curl_init($formspree_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    $response = curl_exec($ch);
    curl_close($ch);

    // You can handle the response from Formspree here if needed
    // e.g., $response_data = json_decode($response, true);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>

    <!-- Font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/style2.css">

</head>
<body>

<?php include 'header.php'; ?>

<div class="heading">
    <h3>contact us</h3>
    <p><a href="home.php">home</a>/contact</p>
</div>

<section class="contact">
    <form action="" method="post">
        <h3>Contact us</h3>
        <input type="text" name="name" required placeholder="enter your name" class="box">
        <input type="email" name="email" required placeholder="enter your email" class="box">
        <input type="number" name="number" required placeholder="enter your number" class="box">
        <textarea name="message" required placeholder="enter your message" class="box" cols="30" rows="10"></textarea>
        <input type="submit" value="send message" name="sent" class="btn">
    </form>
</section>

<?php include 'footer.php'; ?>

<!-- custom js file link -->
<script src="js/script1.js"></script>

</body>
</html>
