<?php
include('database.php');
session_start();
//session_destroy();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["add_to_cart"])) {
        if (isset($_SESSION["shopping_cart"])) {

            $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
            if (!in_array($_GET["Id"], $item_array_id)) {

                $count = count($_SESSION["shopping_cart"]);
                echo '<script>alert("Item Added"); window.location.href="Food.php";</script>';
                $item_array = array(
                    'item_id'           => $_GET["Id"],
                    'item_name'         => $_POST["dishname"],
                    'item_price'        => $_POST["hidden_price"],
                    'item_quantity'     => 1
                );
                $_SESSION["shopping_cart"][$count] = $item_array;
            } else {
                echo '<script>alert("Item Already Added")</script>';
            }
        } else {
            $item_array = array(
                'item_id'           => $_GET["Id"],
                'item_name'         => $_POST["dishname"],
                'item_price'        => $_POST["hidden_price"],
                'item_quantity'     => 1
            );
            $_SESSION["shopping_cart"][0] = $item_array;
        }
    }

    if (isset($_POST["Remove_Item"])) {
		//$gt=0;
		//$gt += ($values['item_quantity'] * $values["item_price"]);
        foreach ($_SESSION["shopping_cart"] as $key => $values) {
			
            if ($values["item_name"] == $_POST["item_name"]) {
                unset($_SESSION["shopping_cart"][$key]);
                $_SESSION["shopping_cart"] = array_values($_SESSION["shopping_cart"]);
                echo '<script>alert("Item Removed")</script>';
            }
			//$_SESSION['totalAmount'] = $gt;
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
                if (!empty($_SESSION["shopping_cart"])) {
                    $gt = 0;
                    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
					
                ?>
                        <tr>
                            <td><?php echo $values["item_name"]; ?></td>
                            <td><input class='text-center item_quantity' type='number' onchange="qtotal()" value="<?php echo $values['item_quantity']; ?>" min='1' max='10'></td>
                            <td>$<?php echo $values['item_price']; ?><input class='text-center item_price' type="hidden" value="<?php echo $values['item_price']; ?>" min='1' max='10'></td>
                            <td class='itotal'>$</td>
                            <td>
                                <form action="manage_cart_fake.php" method="post">
                                    <button name="Remove_Item" class="btn btn-sm btn-danger">REMOVE</button>
                                    <input type="hidden" name="item_name" value="<?php echo $values['item_name']; ?>">
                                </form>
                            </td>
                        </tr>
                
                    <tr>
					<?php
                     $gt += ($values['item_quantity'] * $values["item_price"]);
					   $_SESSION['totalAmount'] = $gt;

					   
                    }
					//var_dump($_SESSION['totalAmount']); 
                ?>
                        <td colspan="3" align="right">Total</td>
                        <td id="total" name="amount">$<?php echo $gt; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <form action="payscript.php" method="POST">
                <div class="form-row text-center">
                    <div class="form-group mx-auto col-10 col-md-4">
                        <label for="inputName4">Name</label>
                        <input type="text" name="customer_name" class="form-control" id="inputName4" placeholder="Name">
                    </div>
                    <div class="form-group mx-auto col-10 col-md-4">
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
                    <input type="tel" class="form-control" id="phone" name="customer_contact" required>
                </div>
                <div class="form-group col-md-8">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" name="customer_address" id="inputAddress" placeholder="1234 Main St" required>
                </div>
                <div>
                    <h3 id="total" type="number" name="amount"></h3>
                </div>
                </div>
                <div class="bg-light text-center">
                    <button class="btn btn-primary" id="paymentForm" name="placeorderBtn">Confirm and Place Order</button>
                </div>
            </form>
        </div>
    </div>
    <br />

    <script>
        var gt = 0;
        var item_price = document.getElementsByClassName('item_price');
        var item_quantity = document.getElementsByClassName('item_quantity');
        var itotal = document.getElementsByClassName('itotal');
        var total = document.getElementById('total');

        function qtotal() {
            gt = 0;

            for (i = 0; i < item_price.length; i++) {
                itotal[i].innerText = "$ " + (item_quantity[i].value) * (item_price[i].value);
                gt = gt + (item_price[i].value) * (item_quantity[i].value);
            }
            total.innerText = "$ " + gt;
        }
        qtotal();
    </script>







</body>

</html
