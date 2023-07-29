<?php 
    include('../config/constants.php');

    if(isset($_GET['id']) & isset($_GET['image_name']))
    {
        //process to delete
        //1. get id and image name
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //2. remove the image if available
        if($image_name != "")
        {
            //get image path
            $path = "../images/food/".$image_name;

            //remove file from folder
            $remove = unlink($path);

            //check whether the image is remove or not 
            if($remove == false)
            {
                //failed to remove image
                $_SESSION['upload'] = "<div class='error'>Failed to remove the Image... </div>";
                //redirect
                header('location:'.SITEURL.'admin/manage-food.php');
                //stop the process
                die();
            }
        }

        //3. delete food from database
        $sql = "DELETE FROM tbl_food WHERE id=$id";
        //execute the query
        $res = mysqli_query($conn, $sql);

        //4. redirect to manage food with session message
        //check query executed or not
        if($res===true)
        {
            //food deleted
            $_SESSION['delete'] = "<div class='success'>Food deleted Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
            //food deleted
            $_SESSION['unauthorized'] = "<div class='error'>Failed to delete Food.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
    }
    else
    {
        //redirect to manage food page
        $_SESSION['delete'] = "<div class='error'> Unauthorized Access. </div>";
        header('location:'.SITEURL.'admin/manage-food.php');

    }
?>