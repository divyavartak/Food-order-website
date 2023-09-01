<?php 
    //include constants.php file here
    include('../config/constants.php');

    //1. get the id of Admin to be deleted
    $id = $_GET['id'];

    //2. Crete sql query to delete admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //Execute the query 
    $res = mysqli_query($conn, $sql);

    //check whether the query executed successfully or not
    if($res==TRUE)
    {
        //Admin deleted
        //echo "Admin Deleted";
        //create session variable to display message
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Sucessfully.</div>";
        //Redirecting to manage admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //Failed
        //echo "Failed to delete Admin";
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin!!! Try again Later...</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
?>