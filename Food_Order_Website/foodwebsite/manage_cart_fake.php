<?php 
include('database.php');
session_start();
//session_destroy();
if($_SERVER["REQUEST_METHOD"]=="POST")
{
if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["Id"], $item_array_id))
		{
			
			$count = count($_SESSION["shopping_cart"]);
			echo '<script>alert("Item  Added");
			window.location.href="Food.php";
			</script>';
			$item_array = array(
				'item_id'			=>	$_GET["Id"],
				'item_name'			=>	$_POST["dishname"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	1
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
			
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
           // print_r($_SESSION['shopping_cart']);
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["Id"],
			'item_name'			=>	$_POST["dishname"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	1
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_POST["Remove_Item"]))
{
	foreach($_SESSION["shopping_cart"] as $key =>$values)
	{
		
		if($values["item_name"] == $_POST["item_name"])
		{
			
			
			unset($_SESSION["shopping_cart"][$key]);
			$_SESSION["shopping_cart"]=array_values($_SESSION["shopping_cart"]);
			echo '<script>alert("Item Removed")</script>';
		}
	}
}
}
?>
<!DOCTYPE html>
<html>
	<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
		<title>Webslesson Demo | Simple PHP Mysql Shopping Cart</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<body>
		<br />
		<div class="container">
			
			<div style="clear:both"></div>
			<br />
			<h3>Order Details</h3>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Item Name</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>$ <?php echo $values["item_price"]; ?></td>
						<td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td>
							<form action="manage_cart_fake.php" method="post">
							<button  name="Remove_Item" class="btn btn-sm btn-danger">REMOVE</button>
							<input type="hidden" name="item_name" value="<?php echo $values['item_name']; ?>">
							</form> 
						</td>					
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">$ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>

					<?php
					}
					?>
						
				</table>
	<form action="placeorder.php" method="POST">
  <div class="form-row text-center">
    <div class="form-group  mx-auto col-10  col-md-4">
      <label for="inputEmail4">Email</label>
      <input type="email" name="customer_email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Password</label>
      <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-group col-md-5">
  <label for="inputcontact">Phone No.</label>
  <input type="tel"class="form-control" id="phone" name="customer_contact"
       
       required>
  </div>
  <div class="form-group  col-md-8">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" name="customer_address" id="inputAddress" placeholder="1234 Main St" required>
  </div>
  </div>
 
  <div class="bg-light text-center">
					<button class="btn btn-primary" name="placeorderBtn">Confirm and Place Order</button>
				</div>
</form>
				
			</div>
		</div>
	</div>
	<br />
	</body>
</html>

<?php
//If you have use Older PHP Version, Please Uncomment this function for removing error 

/*function array_column($array, $column_name)
{
	$output = array();
	foreach($array as $keys => $values)
	{
		$output[] = $values[$column_name];
	}
	return $output;
}*/
?>