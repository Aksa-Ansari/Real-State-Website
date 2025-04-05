<?php
include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
 }else{
    $user_id = '';
 }

 if(isset($_POST['send'])){

   $msg_id = create_unique_id();
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $message = $_POST['message'];
   $message = filter_var($message, FILTER_SANITIZE_STRING);

   $verify_contact = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
   $verify_contact->execute([$name, $email, $number, $message]);

   if($verify_contact->rowCount() > 0){
      $warning_msg[] = 'message sent already!';
   }else{
      $send_message = $conn->prepare("INSERT INTO `messages`(id, name, email, number, message) VALUES(?,?,?,?,?)");
      $send_message->execute([$msg_id, $name, $email, $number, $message]);
      $success_msg[] = 'message send successfully!';
   }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact us</title>

    <!-- Font awesome cdn link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

     <!-- custom css file link -->
      <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- header section starts -->
     <?php include 'components/user_header.php';?>
     <!-- header section ends -->



<!-- contact section starts  -->

<section class="contact">

   <div class="row">
      <div class="image">
         <img src="images/contact-img.svg" alt="">
      </div>
      <form action="" method="post">
         <h3>get in touch</h3>
         <input type="text" name="name" required maxlength="50" placeholder="enter your name" class="box">
         <input type="email" name="email" required maxlength="50" placeholder="enter your email" class="box">
         <input type="number" name="number" required maxlength="10" max="9999999999" min="0" placeholder="enter your number" class="box">
         <textarea name="message" placeholder="enter your message" required maxlength="1000" cols="30" rows="10" class="box"></textarea>
         <input type="submit" value="send message" name="send" class="btn">
      </form>
   </div>

</section>

<!-- contact section ends -->







<!-- faq section starts  -->

<section class="faq" id="faq">

   <h1 class="heading">FAQ</h1>

   <div class="box-container">

      <div class="box active">
         <h3><span>How can I cancel my booking?</span><i class="fas fa-angle-down"></i></h3>
         <p>You can cancel your booking by contacting our support team. Cancellation charges may apply based on the terms of the agreement.</p>
      </div>

      <div class="box active">
         <h3><span>When will I get possession of my property?</span><i class="fas fa-angle-down"></i></h3>
         <p>Possession is given as per the timeline mentioned in your agreement. Typically, it takes 12-24 months for under-construction projects.</p>
      </div>

      <div class="box">
         <h3><span>Where can I pay my rent?</span><i class="fas fa-angle-down"></i></h3>
         <p>You can pay rent via bank transfer, UPI, or through our online portal. Some properties also accept cash payments.</p>
      </div>

      <div class="box">
         <h3><span>How do I contact potential buyers?</span><i class="fas fa-angle-down"></i></h3>
         <p>You can list your property on our platform, and interested buyers will reach out to you via the provided contact details.</p>
      </div>

      <div class="box">
         <h3><span>Why is my property listing not showing?</span><i class="fas fa-angle-down"></i></h3>
         <p>Ensure that your listing is approved by our team. It might take up to 24 hours for new listings to appear on the website.</p>
      </div>

      <div class="box">
         <h3><span>How can I promote my property listing?</span><i class="fas fa-angle-down"></i></h3>
         <p>You can use our premium listing option or social media promotions to get more visibility for your property.</p>
      </div>

   </div>

</section>

<!-- faq section ends -->









     <!-- footer section starts -->
      <?php include 'components/footer.php';?>
      <!-- footer section ends -->




    <!-- sweetalert cdn link -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


    <!-- custom js file link -->
     <script src="JS/script.js"></script>


     <?php include 'components/message.php';?>
</body>
</html>