<?php

@include 'config.php';

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword'] );
    $user_type = $_POST['user_type'];

    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){

        $error[] = 'user already exist';

    }else{

        if($pass != $cpass){
            $error[] = 'password not matched!';
        }else{
            $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
            mysqli_query($conn, $insert);
            header('location:login_form.php');
        }
    }
};


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register form</title>

    <!-- Font Awesome icon library -->
    <script src="https://kit.fontawesome.com/92d70a2fd8.js" crossorigin="anonymous"></script>

    <!-- custom css file link -->
    <link rel="stylesheet" href="css/style1.css">

</head>
<body>



<?php
if(isset($error)){
    foreach($error as $error){
        echo '
        <div class = "message">
        <span>'.$error.'</span>
        <i class="fas fa-times" onclick = "this.parentElement.remove();" ></i>
        </div>';
        }
    }
?>
    <div class="form-container">

        <form action="" method = "post">
            <h3>register now</h3>
            
            <input type="text" name="name" required placeholder="enter your name">
            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="password" name="cpassword" required placeholder="confirm your password">
            <select name="user_type">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>already have an account?<a href="login_form.php">login now</a></p>
        </form>


    </div>
</body>
</html>