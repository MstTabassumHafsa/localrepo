<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_id'])){
    header('location:login_form.php');
}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `user_form` WHERE id='$delete_id' ") or die('query failed');
    header('location:admin_users.php');
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>users</title>

    <!-- Font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


    <!-- custom css file link -->
    <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>

<?php include 'admin_header.php'; ?>   

<section class="users">

    <h1 class="title">user accounts</h1>

    <div class="box-container">
        <?php
            $select_users = mysqli_query($conn, 'SELECT * FROM `user_form`') or die('query failed'); 
            while($fetch_users = mysqli_fetch_assoc($select_users)){
        ?>
        <div class="box">
            <p>username: <span><?php echo $fetch_users['name']; ?></span></p>
            <p>email: <span><?php echo $fetch_users['email']; ?></span></p>
            <p>user type: <span style="color:<?php if($fetch_users['user_type'] == 'admin' ){echo 'red'; } ?>"><?php echo $fetch_users['user_type']; ?></span></p>
            <a href="admin_users.php?delete=<?php echo $fetch_users['id']; ?>" onclick="return confirm('delete this user?');" class="delete-btn">delete user</a>

        </div>
        <?php
            };
        ?>

    </div>

</section>








    <!-- custom admin js file link     -->
    <script src="js/admin_script.js"></script>

</body>
</html>