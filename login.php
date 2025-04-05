<?php
include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
}else{
    $user_id = '';
}

if(isset($_POST['submit'])){
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); 
    $pass = $_POST['pass'];

    $select_users = $conn->prepare("SELECT * FROM `users` WHERE email = ? LIMIT 1");
    $select_users->execute([$email]);
    $row = $select_users->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        if (password_verify($pass, $row['password'])) { 
            setcookie('user_id', $row['id'], time() + 60*60*24*30, '/');
            header('location:home.php');
            exit(); 
        } else {
            $warning_msg[] = 'Incorrect password!';
        }
    } else {
        $warning_msg[] = 'Email not found!';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Font awesome cdn link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

     <!-- custom css file link -->
      <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- header section starts -->
     <?php include 'components/user_header.php';?>
     <!-- header section ends -->



<!-- login section starts  -->

<section class="form-container">

   <form action="" method="post">
      <h3>welcome back!</h3>
      <input type="email" name="email" required maxlength="50" placeholder="enter your email" class="box">
      <input type="password" name="pass" required maxlength="20" placeholder="enter your password" class="box">
      <p>don't have an account? <a href="register.php">register new</a></p>
      <input type="submit" value="login now" name="submit" class="btn">
   </form>

</section>

<!-- login section ends -->




     <!-- footer section starts -->
      <?php include 'components/footer.php';?>
      <!-- footer section ends -->



    <!-- sweetalert cdn link -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- custom js file link -->
     <script src="JS/script.js"></script>

     <?php
        include 'components/message.php'
     ?>
</body>
</html>