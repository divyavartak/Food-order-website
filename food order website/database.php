<?php
$con = mysqli_connect('localhost','root','Divya123','food');

//table admin
/*$sql = "CREATE TABLE `tbl_admin` ( `id` INT(10)  NOT NULL AUTO_INCREMENT,full_name VARCHAR(50) NOT NULL,username VARCHAR(50),password VARCHAR(255) NOT NULL , PRIMARY KEY (`id`))";
$result = mysqli_query($con, $sql);

// Check for the table creation success
if($result){
    echo "The table was created successfully!<br>";
}
else{
    echo "The table was not created successfully because of this error ---> ". mysqli_error($con);
}

//table food
$sql = "CREATE TABLE `tbl_food` ( `id` INT(10)  NOT NULL AUTO_INCREMENT,title VARCHAR(100) NOT NULL,description TEXT(250),price DECIMAL(10.0) ,image_name VARCHAR(255),category_id INT(10),featured VARCHAR(10),active VARCHAR(10), PRIMARY KEY (`id`))";
$result = mysqli_query($con, $sql);

// Check for the table creation success
if($result){
    echo "The table was created successfully!<br>";
}
else{
    echo "The table was not created successfully because of this error ---> ". mysqli_error($con);
}

//table category
$sql = "CREATE TABLE `tbl_category` ( `id` INT(10)  NOT NULL AUTO_INCREMENT,title VARCHAR(100) NOT NULL,image_name VARCHAR(255),featured VARCHAR(10),active VARCHAR(10), PRIMARY KEY (`id`))";
$result = mysqli_query($con, $sql);

// Check for the table creation success
if($result){
    echo "The table was created successfully!<br>";
}
else{
    echo "The table was not created successfully because of this error ---> ". mysqli_error($con);
}

//order table
$sql = "CREATE TABLE `tbl_order` ( `id` INT(10)  NOT NULL AUTO_INCREMENT,food VARCHAR(100) NOT NULL,price DECIMAL(10.0),qty INT(11),total DECIMAL(10.0),orderdate DATETIME,status VARCHAR(50),customer_name VARCHAR(150),customer_contact VARCHAR(150),customer_email VARCHAR(150),customer_address VARCHAR(150), PRIMARY KEY (`id`))";
$result = mysqli_query($con, $sql);

// Check for the table creation success
if($result){
    echo "The table was created successfully!<br>";
}
else{
    echo "The table was not created successfully because of this error ---> ". mysqli_error($con);
}
*/

?>