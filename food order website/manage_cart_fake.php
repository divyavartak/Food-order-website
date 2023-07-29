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
			window.location.href="manage_cart_fake.php";
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
	foreach($_SESSION["shopping_cart"] as $keys =>$values)
	{
		echo $keys;
		if($values["item_name"] == $_POST["item_name"])
		{
			
			unset($_SESSION["shopping_cart"][$keys]);
			$_SESSION['shopping_cart']=$item_array($_SESSION['shopping_cart']);
			echo '<script>alert("Item Removed")</script>';
		}
	}
}
/*
if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
	foreach($_SESSION["shopping_cart"] as $keys =>$values)
	{
		if($values["item_id"] == $_GET["Id"])
		{
			unset($_SESSION["shopping_cart"][$keys]);
			$_SESSION['shopping_cart']=$item_array($_SESSION['shopping_cart']);
			echo '<script>alert("Item Removed")</script>';
		}
	}
}
}*/
/*if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["Id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="manage_cart.php"</script>';
			}
		}
	}
}*/
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
		<script src="functions.js"></script>
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
							$total=$total + $values["item_price"];
					?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><input type="number" class="text-center iquantity" onchange='subTotal()' value="<?php echo $values["item_quantity"]; ?>" min="1" max='10'> </td>
						<!-- <td><?php echo $values["item_quantity"]; ?></td> -->
						<td> <?php echo $values["item_price"] ;?> <input type="hidden" class='iprice' value='$value=[item_price]'></td>
						<td><input type="itotal"></td>
						<!-- <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td> <button class='btn btn-sm btn-outline-danger'>REMOVE</button> </td> -->
						<td>
							<form action="food.php" method="post">
							<button type="button" name="Remove_Item" class="btn btn-sm btn-danger">REMOVE</button>
							<input type="hidden" name="item_name" value="<?php echo $values['item_name']; ?>">
							</form> 
						</td>
						<!-- <td><a href="Food.php?action=delete&Id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td> -->
					</tr>
					<?php
							/*$total = $total + ($values["item_quantity"] * $values["item_price"]);*/
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
			</div>
		</div>
	</div>
	<br />

<script>
	var gt=0;
var iprice=document.getElementsByClassName('iprice');
var iquantity=document.getElementsByClassName('iquantity');
var itotal=document.getElementsByClassName('total');
var gtotal=document.getElementById('gtotal');

function subTotal()
{
for(i=0;i<iprice.length;i++){
itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);

 gt=gt+(iprice[i].value)*(iquantity[i].value);
}
gtotal.innerText=gt;
}
subTotal();
</script>
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