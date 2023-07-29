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
            <a href="try.php">Home</a>
            <a href="Food.php">FindFood</a>
            <a href="#aboutus.php">About us</a>
            <a href="manage_cart_fake.php">My cart</a>
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
              <a href="categoryfood.php?C_Name=<?php echo $rows['C_Name'];?>">
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
                    <!-- <a class="btn" href="#popup?Id=<?php echo $rows['Id'];?>"> -->
                    <!-- <a class="btn" href="#popup1"> -->
                    
                    <!-- <img src="images\<?php echo $rows['image']?>" class="img"  width="160" height="160" onmouseover="bigImg(this)" onmouseout="normalImg(this)"  alt="" > -->
                    <img src="images\<?php echo $rows['image']?>" class="img"  width="160" height="160" alt="" >                  
                    
                     <h5 class="Dish"><?php echo $rows["dishname"] ?></h5>
                    <h5 class="aboutdish" ><?php echo $rows["d_about"] ?></h5>
                    <h5 class="price"><?php echo $rows["price"] ?>Rs</h5> 
                   <button class="btn" onclick="location.href='cart.php'"> Add to cart</button> 
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

        <!--<div id="popup1" class="overlay">     
         <div class="popup" >
          <h2>Here i am</h2>          
          <a class="close" href="#">&times;</a>
          <?php
          if (isset($_GET['Id'])) {
            $Id = $_GET['Id'];
            $sql1 = "select * from dish where Id='$Id'";
            $res = mysqli_query($con, $sql1);
            if (mysqli_num_rows($res)) {
              foreach($res as $rows)
              {
                ?>
                <input type="text" value="<?= $rows["dishname"];?>">
                <img src="images\<?php echo $rows['image'];?>" class="img"  width="160" height="160" onmouseover="bigImg(this)" onmouseout="normalImg(this)"  alt="">
                    <h5 class="Dish"><?php echo $rows["dishname"] ?></h5>
                    <h5 class="aboutdish" ><?php echo $rows["d_about"] ?></h5>
                    <h5 class="price"><?php echo $rows["price"] ?>Rs</h5>
                    <h5 class="Dish"><?php echo $rows["C_Name"] ?></h5>
            <h2>hello</h2>
          <div class="content">
            Thank to pop me out of that button, but now i'm done so you can close this window.
          </div>
          </div>
          <?php

              }

            }
            else{
              echo "no records";
            }
          }
          ?>
        </div>   -->
                 
       
      </div>
     
        </div></div>

    </section>
    
  
    <!-- Footer -->
       <?php
       include('footer.html');
       ?>
    <!-- Footer -->
  </div>




 
</body>
</html>
