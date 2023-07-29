<?php
include_once('database.php');
$sql = "select * from user ";
$res = mysqli_query($con,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOOD_ORDER_WEBSITE</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 
    <link rel="stylesheet" href="Home.css">
</head>
<body>
    <table>
        <tr>
            <th><h2>student record</h2></th>
        </tr>
        <tr>
            <th>id</th>
            <th>Uname</th>
            <th>Password</th>
            

        </tr>
        <?php
        while($rows=mysqli_fetch_assoc($res)){

        
        ?>
        <tr>
            <td><?php echo $rows['id'];?></td>
            <td><?php echo $rows['Uname'];?></td>
            <td><?php echo $rows['Password'];?></td>
        </tr>
        <?php }
        ?>
    </table>
</body>
</html>