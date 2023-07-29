<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1 style="color:white;text-align:center;">Add Food</h1>
        <br><br>

        <?php
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table>
                <table class="tbl-30" style="color:white">
                    <tr>
                        <td>Title: </td>
                        <td>
                            <input type="text" name="title" placeholder="Tile of the food">
                        </td>
                    </tr>

                    <tr>
                        <td>Description:</td>
                        <td>
                            <textarea name="description" cols="30" rows="10" placeholder="Description of the Food"></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>Price: </td>
                        <td>
                            <input type="number" name="price">
                        </td>
                    </tr>

                    <tr>
                        <td>Select Image: </td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>

                    <tr>
                        <td>Category: </td>
                        <td>
                            <select name="category" >
                            
                                <?php 
                                    //create php code to display categories from database
                                    //1. create sql to get all active categories from database
                                    $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

                                    $res = mysqli_query($conn, $sql);

                                    //count rows to check whether we have categories or not
                                    $count = mysqli_num_rows($res);

                                    if($count>0)
                                    {
                                        //we have categories
                                        while($row=mysqli_fetch_assoc($res))
                                        {
                                            //get the details of category
                                            $id = $row['id'];
                                            $title = $row['title'];
                                            ?>
                                            <option value="<?php echo $id; ?>"><?php echo $title;  ?></option>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        //we do not have category
                                        ?>
                                        <option value="0">No Category Found</option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Featured: </td>
                        <td>
                            <input type="radio" name="featured" value="Yes">Yes
                            <input type="radio" name="featured" value="No">No
                        </td>
                    </tr>

                    <tr>
                        <td>Active: </td>
                        <td>
                            <input type="radio" name="active" value="Yes">Yes
                            <input type="radio" name="active" value="No">No
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </table>
        </form>

        <?php
            //check whether the button is clicked or not
            if(isset($_POST['submit']))
            {
                //add the food in database
                //echo "Clicked";
                //1. get the data from form
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];

                //check whether radio button is checked or not
                if(isset($_POST['featured']))
                {
                    $featured = $_POST['featured'];
                }
                else
                {
                    $featured = "No";
                }

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "No";
                }

                //2. upload the image if selected
                //check whether select image is clicked or not and upload the image
                if(isset($_FILES['image']['name']))
                {
                    //get the details of image
                    $image_name =$_FILES['image']['name'];

                    //check whether the image is selected or not
                    if($image_name!="")
                    {
                        //image is selected
                        $ext = end(explode('.',$image_name));

                        //create new name for image
                        $image_name = "Food-Name-".rand(0000,9999).".".$ext;//rename the image

                        //upload the image
                        $src = $_FILES['image']['tmp_name'];
                        //destination path for image to be uploaded
                        $dst = "../images/food/".$image_name;

                        //finally uploaded the food image
                        $upload = move_uploaded_file($src, $dst);

                        //check whether image uploaded or nor
                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload the Image.</div>";
                            header('location:'.SITEURL.'admin/add-food.php');
                            die();//stop the process
                        }
                    }
                }
                else
                {
                    $image_name = "";//default
                }

                //3. insert into database
                $sql2 = "INSERT INTO  tbl_food SET 
                    title = '$title',
                    description = '$description',
                    price = $price,
                    image_name = '$image_name',
                    category_id = $category,
                    featured = '$featured',
                    active = '$active'
                ";

                //execute the query
                $res2 = mysqli_query($conn, $sql2);

                //4. redirect the message to manage food page
                if($res2 == true)
                {
                    $_SESSION['add'] = "<div class='success'>Food Added Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }
                else{
                    $_SESSION['add'] = "<div class='error'>Failed to add Food!!!</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }
            }
        ?>
    </div>
</div>

<?php include('partials/footer.php'); ?>