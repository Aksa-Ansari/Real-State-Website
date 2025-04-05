<?php
include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
 }else{
    $user_id = '';
 }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about us</title>

    <!-- Font awesome cdn link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

     <!-- custom css file link -->
      <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- header section starts -->
     <?php include 'components/user_header.php';?>
     <!-- header section ends -->


<!-- about section starts  -->

<section class="about">
   <div class="row">
      <div class="image">
         <img src="images/about-img.svg" alt="Why Choose Us">
      </div>
      <div class="content">
         <h3>Why Choose Us?</h3>
         <p>We make finding your dream home easy and hassle-free. With a wide range of verified listings, trusted agents, and personalized support, we ensure a smooth and transparent real estate experience. Whether you're buying, selling, or renting, we provide expert guidance every step of the way.</p>
         <a href="contact.html" class="inline-btn">Contact Us</a>
      </div>
   </div>
</section>

<!-- about section ends -->






<!-- steps section starts -->

<section class="steps">

   <h1 class="heading">3 Simple Steps to Find Your Dream Home</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/step-1.png" alt="Search Property">
         <h3>Search for Properties</h3>
         <p>Browse thousands of verified properties based on budget, location, and type. Apply filters to quickly find the perfect home easily.</p>
      </div>

      <div class="box">
         <img src="images/step-2.png" alt="Contact Agents">
         <h3>Connect with Agents</h3>
         <p>Talk to professional agents for expert advice, property visits, and negotiation. Get complete assistance to make an informed decision.</p>
      </div>

      <div class="box">
         <img src="images/step-3.png" alt="Enjoy Property">
         <h3>Buy or Rent Hassle-Free</h3>
         <p>Seal the deal, complete legal formalities, and move in without stress. Enjoy a smooth home-buying or renting experience today.</p>
      </div>

   </div>

</section>

<!-- steps section ends -->










<!-- Review section starts -->

<section class="reviews">

   <h1 class="heading">Client's Reviews</h1>

   <div class="box-container">

      <div class="box">
         <div class="user">
            <img src="images/pic-1.png" alt="">
            <div>
               <h3>Aarav Sharma</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
         <p>Had a great experience! The property options were amazing, and the team was helpful at every step.</p>
      </div>

      <div class="box">
         <div class="user">
            <img src="images/pic-2.png" alt="">
            <div>
               <h3>Sneha Patel</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
               </div>
            </div>
         </div>
         <p>Found the perfect home within my budget. The process was smooth. Highly recommended!</p>
      </div>

      <div class="box">
         <div class="user">
            <img src="images/pic-3.png" alt="">
            <div>
               <h3>Rahul Verma</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
               </div>
            </div>
         </div>
         <p>Best real estate service! The property options were clear, and the paperwork was handled smoothly.</p>
      </div>

      <div class="box">
         <div class="user">
            <img src="images/pic-4.png" alt="">
            <div>
               <h3>Pooja Mehta</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
         <p>The website had many listings, but the response time was a bit slow. Overall, a good experience.</p>
      </div>

      <div class="box">
         <div class="user">
            <img src="images/pic-5.png" alt="">
            <div>
               <h3>Vikram Singh</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
               </div>
            </div>
         </div>
         <p>Bought my first apartment from here, and the process was completely hassle-free. Great customer support!</p>
      </div>

      <div class="box">
         <div class="user">
            <img src="images/pic-6.png" alt="">
            <div>
               <h3>Ananya Gupta</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
         <p>The property options were great, but the documentation process took a bit longer. Still, a good experience!</p>
      </div>

   </div>

</section>

<!-- Review section ends -->










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