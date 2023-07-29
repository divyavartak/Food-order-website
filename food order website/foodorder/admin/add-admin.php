<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1 style="color:white;text-align:center;">Add Admin</h1>
        <br><br>

        <?php
            if(isset($_SESSION['add'])) //checking whether the session is set or not
            {
                echo $_SESSION['add']; // Display the session message if set
                unset($_SESSION['add']); //remove the message
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30" style="color:white;">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Youe Username">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Youe Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php
    //Process the Value from Form and Save it in database

    //Check whether the button is clicked or not
    if(isset($_POST['submit']))
    {
        //Button Clicked
        //echo "button clicked";

        //1. Get the data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //Password encryption with md5

        //2. SQL query to save data into database
        $sql = "INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'    
        ";

        //3. Executing Query and Saving data into database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //4. Check whether the query is exectued/inserted or not and display the message
        if($res==TRUE)
        {
            //Data Inserted
            //echo "Data Inserted";
            //Create a Session variable to display message
            $_SESSION['add'] = "<div class='success'>Admin Added Successfully.</div>";
            //Redirect page to manage admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //Data not Inserted
            //echo "Failed to insert the data";
            //Create a Session variable to display message
            $_SESSION['add'] = "<div class='error'>Failed to add  Admin!!!</div>";
            //Redirect page to add admin
            header("location:".SITEURL.'admin/add-admin.php');
        }
    }
?>