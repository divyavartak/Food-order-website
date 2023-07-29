<?php

include('database.php');


// $res2 = mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOOD_ORDER_WEBSITE</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="Home.css">
   <script src="functions.js"></script>
    
</head>
<body>
  
    <div class="container1">
        <nav id="navbar">
            <a href="#home">Home</a>
            <a href="#">FindFood</a>
            <a href="#">About us</a>
            <a href="#">My cart</a>
            <a href="#">Contact</a>
        </nav>
    
    <div class="main">
        <div>
        <h1 >It's Not Just Food <br> It's An Experience</h1>        
        </div>
        <div class="img">
        <img src="">
        </div>
            </div>
    </div>

    <section>
      <div class="about">
        <div class="info">
          
          <img src="images\restaurant.png" height="80" width="80">
          <p>QUALITY FOODS</p>
<p>Sit amet, consectetur adipiscing elit quisque eget maximus velit,
 non eleifend libero curabitur dapibus mauris sed leo cursus aliquetcras suscipit.</p>
        </div>

        <div class="info">         
          <img src="images\fastdelivery.png" height="80" width="80">
          <p>FAST DELIVERY</p>
<p>Sit amet, consectetur adipiscing elit quisque eget maximus velit,
 non eleifend libero curabitur dapibus mauris sed leo cursus aliquetcras suscipit.</p>
        </div>
        <div class="info">
          <img src="images\roasted-chicken.png" height="80" width="80">
          <p>ENJOY FOOD</p>
<p>Sit amet, consectetur adipiscing elit quisque eget maximus velit,
 non eleifend libero curabitur dapibus mauris sed leo cursus aliquetcras suscipit.</p>
       </div>
        
        
      </div>

    </section>
    <section>
    <h3>Categories</h3>
    <div class="container2">
    
    <?php     
  
    $sql = "select * from category limit 4";
    $res = mysqli_query($con,$sql);
   
    $category = mysqli_num_rows($res) > 0;
    if($category){
        while ($rows = mysqli_fetch_array($res))
            {
                ?>
                
                <div class="category"  onmouseover="bigImg(this)" onmouseout="normalImg(this)"  >
              <!-- <a href="Food.php"> -->
              <a href="Food.php?Id=<?php echo $rows['Id'];?>">
                <img src="images\<?php echo $rows['C_Image']?>" class="img"  width="160" height="160" onmouseover="bigImg(this)" onmouseout="normalImg(this)"  alt="" >
                <h5 class="Dish"><?php echo $rows["C_Name"] ?></h5>
               
              </a>
               
                </div>


        <?php
            
           
            }


    }
    else{
        echo "no Categories found";
    }
    ?>

    </div>

    </section>

   <section>

    <div class="container">
    
        <?php     
        $sql = "select * from dish";
        $res = mysqli_query($con,$sql);   
        $check_dish = mysqli_num_rows($res) > 0;
        if($check_dish){
            while ($rows = mysqli_fetch_array($res))
                {
                    ?>
                    <div class="card"  onmouseover="bigImg(this)" onmouseout="normalImg(this)" onclick="popupview()" >
                    <!-- <a class="btn" href="#myModel"  data-target="#myModal?Id=<?php echo $row['Id'] ?>">  -->
                    <a class="btn" href="#popup1?Id=<?php echo $rows['Id'];?>">
                    <!-- <a class="btn" href="#popup1"> -->
                    <img src="images\<?php echo $rows['image']?>" class="img"  width="160" height="160" onmouseover="bigImg(this)" onmouseout="normalImg(this)"  alt="" >
                    <h5 class="Dish"><?php echo $rows["dishname"] ?></h5>
                    <h5 class="aboutdish" ><?php echo $rows["d_about"] ?></h5>
                    <h5 class="price"><?php echo $rows["price"] ?>Rs</h5>
                    
                    </a>
                    
                    </div>
                    
    
                    
         
    
            <?php
                
               
                }


        }
        else{
            echo "no dish found";
        }
        ?>

        </div>
       

       
<div id="popup1" class="overlay">     
         <div class="popup" >
          <h2>Here i am</h2>          
          <a class="close" href="#">&times;</a>
          <?php
          if (isset($Id)) {
            $Id = $_GET['Id'];

            $sql1 = "select * from dish where Id='$Id'";

            $res = mysqli_query($con, $sql1);
            // $check_dish = mysqli_num_rows($res) > 0;
            // if ($check_dish) {
          

            while ($rows = mysqli_fetch_array($res)) {
              ?>
            
          <img src="images\<?php echo $rows['image'] ?>" class="img"  width="160" height="160" onmouseover="bigImg(this)" onmouseout="normalImg(this)"  alt="">
                          <h5 class="Dish"><?php echo $rows["dishname"] ?></h5>
                          <h5 class="aboutdish" ><?php echo $rows["d_about"] ?></h5>
                          <h5 class="price"><?php echo $rows["price"] ?>Rs</h5>
            
          <div class="content">
            Thank to pop me out of that button, but now i'm done so you can close this window.
          </div>
            
          <?php
            }

            // }
          }
       else{
           
              echo "no dish found";
              echo $_GET["id"] . "!";
      }
      ?>
      </div>
      </div>
        </div></div>


                
               
             

    
    </section>
    
   
        
















   


        <!-- Footer -->
    <footer
            class="text-center text-lg-start text-white"
            style="background-color: rgb(8, 32, 32)"
            
            >
      <!-- Grid container -->
      <div class="container p-4 pb-0">
        <!-- Section: Links -->
        <section class="">
          <!--Grid row-->
          <div class="row">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">
                Company name
              </h6>
              <p>
                Here you can use rows and columns to organize your footer
                content. Lorem ipsum dolor sit amet, consectetur adipisicing
                elit.
              </p>
            </div>
            <!-- Grid column -->
  
            <hr class="w-100 clearfix d-md-none" />
  
            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">Our Menu</h6>
              <p>
                <a class="text-white">Indian </a>
              </p>
              <p>
                <a class="text-white">Pizza</a>
              </p>
              <p>
                <a class="text-white">Burger</a>
              </p>
              <p>
                <a class="text-white">Italian</a>
              </p>
            </div>
            <!-- Grid column -->
  
            <hr class="w-100 clearfix d-md-none" />
  
            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">
                Useful links
              </h6>
              <p>
                <a class="text-white">Your Account</a>
              </p>
              <p>
                <a class="text-white">Become an Affiliate</a>
              </p>
              <p>
                <a class="text-white">Shipping Rates</a>
              </p>
              <p>
                <a class="text-white">Help</a>
              </p>
            </div>
  
            <!-- Grid column -->
            <hr class="w-100 clearfix d-md-none" />
  
            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
              <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
              <p><i class="fas fa-envelope mr-3"></i> info@gmail.com</p>
              <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
              <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
            </div>
            <!-- Grid column -->
          </div>
          <!--Grid row-->
        </section>
        <!-- Section: Links -->
        <div class="footer-social-icon">
            <span>Follow us</span>
            <a href="#"><img src="facebook.png"  class="fab fa-facebook-f facebook-bg"></a>
            <a href="#"><img src="twitter.png" class="fab fa-twitter twitter-bg"></a>
            <a href="#"><img src="gmail.png" class="fab fa-google-plus-g google-bg"></a>
        </div>
      
        
      </div>
      <!-- Grid container -->
    </footer>
    <!-- Footer -->
  </div>




 
</body>
</html>