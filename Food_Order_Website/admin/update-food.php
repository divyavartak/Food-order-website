<?php include('partials/menu.php'); ?>

<?php 
    //check id is set or not
    if(isset($_GET['id']))
    {
        //get details
        $id = $_GET['id'];

        //sql query to get the selected food
        $sql2 = "SELECT * FROM tbl_food WHERE id=$id";
        //execute the query
        $res2 = mysqli_query($conn, $sql2);

        //get the value based on query executed
        $row2 = mysqli_fetch_assoc($res2);

        //get the individual values of selected food
        $title = $row2['title'];
        $description = $row2['description'];
        $price = $row2['price'];
        $current_image = $row2['image_name'];
        $current_category = $row2['category_id'];
        $featured = $row2['featured'];
        $active = $row2['active'];
    }
    else
    {
        //redirect
        header('location:',SITEURL.'admin/manage.food.php');
    }
?>

<div class="main-content">
    <div class="wrapper">
        <h1 style="color:white;text-align:center;">Update Food</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">

        <table class="tbl-30" style="color:white">
            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" value="<?php echo $title; ?>">
                </td>
            </tr>

            <tr>
                <td>Description: </td>
                <td>
                    <textarea name="description" id="" cols="30" rows="5"><?php echo $description; ?></textarea>
                </td>
            </tr>

            <tr>
                <td>Price: </td>
                <td>
                    <input type="number" name="price" value="<?php echo $price; ?>">
                </td>
            </tr>


            <tr>
                <td>Current Image: </td>
                <td>
                    <?php 
                        if($current_image == "")
                        {
                            //iamge not available
                            echo "<div class='error'>Image not Available.</div>";
                        }
                        else
                        {
                            //image available
                            ?>
                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $current_image; ?>" width="150px" >
                            <?php

                        }
                    ?>
                </td>
            </tr>

            <tr>
                <td>Select new image</td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>

            <tr>
                <td>Category: </td>
                <td>
                    <select name="category" >
                        <?php 
                            $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                            //execute the query
                            $res = mysqli_query($conn, $sql);
                            //count rows
                            $count = mysqli_num_rows($res);
                            //check whether category available or not
                            if($count>0)
                            {
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $category_title = $row['title'];
                                    $category_id = $row['id'];
                                    
                                    //echo "<option value='$category_id'>$category_title</option>";
                                    ?>
                                    <option <?php if($current_category==$category_id) {echo "selected";} ?>value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "<option value='0'> Category not Available.</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Featured</td>
                <td>
                    <input <?php if($featured=="Yes") {echo "checked";} ?> type="radio" name="featured" value="Yes">Yes
                    <input <?php if($featured=="No") {echo "checked";} ?> type="radio" name="featured" value="No">No
                </td>
            </tr>

            <tr>
                <td>Active</td>
                <td>
                    <input <?php if($active=="Yes") {echo "checked";} ?> type="radio" name="active" value="Yes">Yes
                    <input <?php if($active=="No") {echo "checked";} ?> type="radio" name="active" value="No">No
                </td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="id" value="<?php  echo $id; ?>">
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                    <input type="submit" name="submit" value="Update Food" class="btn-secondary">
                </td>
            </tr>
        </table>

        </form>

        <?php 
            if(isset($_POST['submit']))
            {
                //1. get all details
                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $current_image = $_POST['current_image'];
                $category = $_POST['category'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];

                //2. upload image if selected
                //check upload button is clicked or not
                if(isset($_FILES['image']['name']))
                {
                    //upload button clicked
                    $image_name = $_FILES['image']['name'];

                    //file is available or not
                    if($image_name != "")
                    {
                        //A. uploading new image
                        //rename the image
                        $ext = end(explode('.', $image_name));
                        $image_name = "Food-Name-".rand(0000, 9999).'.'.$ext;

                        //get the source and destination path
                        $src_path = $_FILES['image']['tmp_name'];//source path
                        $dest_path = "../images/food/".$image_name;//destination path

                        //upload the image
                        $upload = move_uploaded_file($src_path, $dest_path);

                        //check whehter the image is uploaded or not
                        if($upload == false)
                        {
                            //failed to upload
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload new Image.</div>";
                            //redirect
                            header('location:'.SITEURL.'admin/manage-food.php');
                            //stop thre process
                            die();
                        }
                        //3. remove the image if new is uploaded and current iamge exist
                        //B. remove current image if available
                        if($current_image!="")
                        {
                            //current image is available
                            //remove the iamage
                            $remove_path = "../images/food/".$current_image;
                            $remove = unlink($remove_path);

                            //check whether the image is removed or not
                            if($remove==false)
                            {
                                //failed to remove current image
                                $_SESSION['remove-failed'] = "<div class='error'>Failed to remove Current Image...</div>";
                                //redirect to manage food 
                                header('location'.SITEURL.'admin/manage-food.php');
                                //stop the process
                                die();
                            }
                        }
                    }
                    else
                    {
                        $image_name = $current_image;
                    }
                }
                else
                {
                    $image_name = $current_image; 
                }

                //4. update the food in db
                $sql3 = "UPDATE tbl_food SET 
                    title = '$title',
                    description = '$description',
                    price = $price,
                    image_name = '$image_name',
                    category_id = '$category',
                    featured = '$featured',
                    active = '$active'
                    WHERE id = $id
                ";
                //execute the sql query
                $res3 = mysqli_query($conn, $sql3);

                //check whether the query is executed or not
                if($res3==true)
                {
                    //food updated
                    $_SESSION['update'] = "<div class='success'>Food Updated Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }
                else
                {
                    //failed to update
                    $_SESSION['update'] = "<div class='error'>Failed to Update Food.</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }
            }
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>