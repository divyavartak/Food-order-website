<?php

include('../config//constants.php'); 


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
            <a href="Index.php">Home</a>
            <a href="Food.php">FindFood</a>
            <a href="aboutus.php">About us</a>
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
    <h3>Find Your Food Category</h3>
    <div class="container2">
    
    <?php     
  
    $sql = "select * from tbl_category limit 4";
    $res = mysqli_query($conn,$sql);
   
    $category = mysqli_num_rows($res) > 0;
    if($category)
    {
        while ($rows = mysqli_fetch_array($res))
            { $image_name = $rows['image_name'];
                ?>
                
                <div class="category"  onmouseover="bigImg(this)" onmouseout="normalImg(this)"  >
              <!-- <a href="Food.php"> -->
                <a href="categoryfood.php?id=<?php echo $rows['id'];?>">
                <?php 
                                        //check whether image name is avaiable or not
                                      //  if($image_name!="")
                                       // {
                                            //display image
                                         //   ?>
                                            <!-- <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="160" height="160">
                                       --><?php
                                       // }
                                      //  else
                                      //  {
                                            //display the message
                                       //     echo "<div class='error'>Image not Added.</div>";
                                     //   }
                                    ?>
                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" onmouseover="bigImg(this)" onmouseout="normalImg(this)" width="160" height="160">
   
                <!-- <img src="<?php echo SITEURL; ?>../images/category/<?php echo $rows['image_name']; ?>" class="img"  width="160" height="160" onmouseover="bigImg(this)" onmouseout="normalImg(this)"  alt="" > -->
                <h5 class="Dish"><?php echo $rows["title"] ?></h5>
                
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
<h3>Our Category</h3>
     <div class="container"> 
        <?php     
        $sql = "select * from tbl_food limit 4 ";
        $res = mysqli_query($conn,$sql);   
       // $check_dish = mysqli_num_rows($res) > 0;
        //if($check_dish){
            while ($rows = mysqli_fetch_array($res))
                {
                  $image_name = $rows['image_name'];
                    ?>
                 <form method="post" action="manage_cart_fake.php?Id=<?= $rows['id']; ?>" >
                 
                 
                    <div class="card"  onmouseover="bigImg(this)" onmouseout="normalImg(this)" onclick="popupview()" >
                    
                    
                    
                    <!-- <img src="images\<?php echo $rows['image']?>" class="img"  width="160" height="160" onmouseover="bigImg(this)" onmouseout="normalImg(this)"  alt="" > -->
                  
                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" class="img"  width="160" height="160" alt="" >                  
                    
                     <h5 class="Dish"><?php echo $rows["title"] ?></h5>
                    <h5 class="aboutdish" ><?php echo $rows["description"] ?></h5>
                    <h5 class="price"><?php echo $rows["price"] ?>Rs</h5> 
                    <input type="hidden" name="quantity" value="1" class="form-control" />

                    <input type="hidden" name="dishname" value="<?php echo $rows["title"]; ?>" />

						        <input type="hidden" name="hidden_price" value="<?php echo $rows["price"]; ?>" />

                   <!-- <button class="btn" onclick="location.href='cart.php'"> Add to cart</button>  -->
                    <!-- <button class="btn" name="add_to_cart" onclick="location.href='manage_cart.php?Id=<?php echo $rows['Id'];?>'"> Add to cart</button>   -->

                  
                   <!-- <input type="submit"  class="btn" name="add_to_cart"  value="Add to Cart" /> -->

                    <button class="btn" name="add_to_cart"> Add to cart</button> 
                                      
                                       </div>      </form> 
                    
            <?php
                            
                }
       // }
       // else{          
       //     echo "no dish found";
       // }
        ?>

       
        
        </div>
</section>
  
    <!-- Footer -->
       <?php
       include('footer.html');
       ?>
    <!-- Footer -->
  </div>




 
</body>
</html>