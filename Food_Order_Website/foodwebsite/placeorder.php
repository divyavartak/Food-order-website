<?php //include('partials/menu.php') ;
include('../config//constants.php');



if(isset($_POST['placeorderBtn']))
{

   // $customer_email=  mysqli_real_escape_string($conn,$_POST['customer_email']);
    $customer_contact=mysqli_real_escape_string($conn,$_POST['customer_contact']);
    $customer_address=mysqli_real_escape_string($conn,$_POST['customer_address']);

    //$dishname=mysqli_real_escape_string($conn,$_POST['dishname']);
   // $hidden_price=mysqli_real_escape_string($conn,$_POST['hidden_price']);
   // $item_quantity=mysqli_real_escape_string($conn,$_POST['item_quantity']);
   // $item_price=mysqli_real_escape_string($conn,$_POST['item_price']);
   
   // $item_quantity=mysqli_real_escape_string($conn,$_POST['item_quantity']);
   // $item_price=mysqli_real_escape_string($conn,$_POST['item_price']);

    $total = 0;
    foreach($_SESSION["shopping_cart"] as $keys => $values)
    {
        $item_name=$values['item_name'];
        $item_price=$values['item_price'];
        $total = $total + ($values["item_quantity"] * $values["item_price"]);
    }

    $query="INSERT INTO tbl_order(food,price,qty,total,customer_contact,customer_address)
    values('$item_name','$item_price','1','$total','$customer_contact','$customer_address') ";
 $query=mysqli_query($conn,$query);

}








?>

<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
    </style>
    <body>
   
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Success</h1> 
        <p>We received your purchase request;<br/> we'll be in touch shortly!</p>
      </div>
    
    </body>
</html>