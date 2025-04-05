<?php

include 'components/connect.php';

$success_msg = [];  // ✅ Initialize messages
$warning_msg = [];
$error_msg = [];

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['submit'])){
   $id = create_unique_id();
   $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
   $number = filter_var($_POST['number'], FILTER_SANITIZE_STRING);
   $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
   $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
   $c_pass = $_POST['c_pass'];

   if (!password_verify($c_pass, $pass)) {
      $warning_msg[] = 'Passwords do not match!';
   } else {
      $select_users = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
      $select_users->execute([$email]);

      if ($select_users->rowCount() > 0) {
         $warning_msg[] = 'Email already taken!';
      } else {
         $insert_user = $conn->prepare("INSERT INTO `users`(id, name, number, email, password) VALUES(?,?,?,?,?)");
         $insert_user->execute([$id, $name, $number, $email, $pass]);
         
         if ($insert_user) {
            $success_msg[] = 'Registration successful! You can now login.';
            setcookie('user_id', $id, time() + 60*60*24*30, '/');
         } else {
            $error_msg[] = 'Something went wrong!';
         }
      }
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- header section starts -->
    <?php include 'components/user_header.php'; ?>
    <!-- header section ends -->

    <!-- register section starts -->
    <section class="form-container">
        <form action="" method="post">
            <h3>create an account!</h3>
            <input type="text" name="name" required maxlength="50" placeholder="enter your name" class="box">
            <input type="email" name="email" required maxlength="50" placeholder="enter your email" class="box">
            <input type="number" name="number" required min="0" max="9999999999" maxlength="10" placeholder="enter your number" class="box">
            <input type="password" name="pass" required maxlength="20" placeholder="enter your password" class="box">
            <input type="password" name="c_pass" required maxlength="20" placeholder="confirm your password" class="box">
            <p>already have an account? <a href="login.php">login now</a></p>
            <input type="submit" value="register now" name="submit" class="btn">
        </form>
    </section>
    <!-- register section ends -->

    <!-- footer section starts -->
    <?php include 'components/footer.php' ?>
    <!-- footer section ends -->

    <!-- sweetalert cdn link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- custom js file link -->
    <script src="JS/script.js"></script>

    <!-- Message Alert Section -->
    <?php include 'components/message.php'?>
</body>
</html>
