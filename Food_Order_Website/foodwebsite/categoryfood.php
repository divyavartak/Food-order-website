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

  <section>   
    <div class="container">
          
          <?php
          if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql1 = "select * from tbl_food where category_id='$id'";
            $res = mysqli_query($conn, $sql1);
            if (mysqli_num_rows($res)) {
              foreach($res as $rows)
              {$image_name = $rows['image_name'];
                ?>
                 <div class="card"  onmouseover="bigImg(this)" onmouseout="normalImg(this)" onclick="popupview()" >
                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name;?>" class="img"  width="160" height="160" onmouseover="bigImg(this)" onmouseout="normalImg(this)"  alt="" >
                    <h5 class="Dish"><?php echo $rows["title"] ?></h5>
                    <h5 class="aboutdish" ><?php echo $rows["description"] ?></h5>
                    <h5 class="price"><?php echo $rows["price"] ?>Rs</h5>
                    
            
          
          </div>
          
       
        <?php

              }

            }
            else{
              echo "no records ";
            }
          }
          ?>

        </div>
 </section>
 
 
   <!-- Footer -->
   <?php
        include('footer.html');
       ?> 
    <!-- Footer-->
</body>
</html>