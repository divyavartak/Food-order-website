<?php

include('../config//constants.php');
include('Navbar.html');    

// $res2 = mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


<link rel="stylesheet" href="Home.css">
   <script src="functions.js"></script>
</head>
<body>

<section>
<div class="mainfood">
  <div class="img">
  </div>
<div class="text">
<h1 >FOOD</h1>
</div>

        
     
</div>
</section>

  <!-- <section>   
    <div class="container">
          
          <?php
          if (isset($_GET['C_Name'])) {
            $C_Name = $_GET['C_Name'];
            $sql1 = "select * from tbl_food where C_Name='$C_Name'";
            $res = mysqli_query($conn, $sql1);
            if (mysqli_num_rows($res)) {
              foreach($res as $rows)
              {
                ?>
                 <div class="card"  onmouseover="bigImg(this)" onmouseout="normalImg(this)" onclick="popupview()" >
                <img src="images\<?php echo $rows['image']?>" class="img"  width="160" height="160" onmouseover="bigImg(this)" onmouseout="normalImg(this)"  alt="" >
                    <h5 class="Dish"><?php echo $rows["dishname"] ?></h5>
                    <h5 class="aboutdish" ><?php echo $rows["d_about"] ?></h5>
                    <h5 class="price"><?php echo $rows["price"] ?>Rs</h5>
                    
            
          
          </div>
          
       
        <?php

              }

            }
            else{
              echo "no records";
            }
          }
          ?>

        </div>
 </section>  -->
 
 <!-- <form method="post" action="manage_cart.php?action=add&Id=<?php echo $rows["Id"]; ?>" >

 <section>
      <div class="container">  -->
<!-- <form action="manage_cart.php?Id=<?php echo $row["Id"]; ?>" method="POST"> -->
<!-- <form method="post" action="manage_cart.php?action=add&Id=<?php echo $rows["Id"]; ?>" >
 -->

<section>
     <div class="container"> 
        <?php     
        $sql = "select * from tbl_food";
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
 <!-- </form> -->
 
   <!-- Footer -->
   <?php
        include('footer.html');
       ?> 
    <!-- Footer-->
</body>
</html>