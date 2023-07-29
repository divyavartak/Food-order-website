<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1 style="color:white;text-align:center;">Change Password</h1>
        <br><br>

        <?php
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-30" style="color:white">
                <tr>
                    <td>Current Password: </td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                </tr>

                <tr>
                    <td>New Password: </td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
    //check whether the button is click or not
    if(isset($_POST['submit']))
    {
        //echo "Button Clicked";
        //1. get all values from form
        $id = $_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);
        

        //2. Check whether the user with current id and current password exist or not
        $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

        //execute query
        $res = mysqli_query($conn, $sql);

        if($res==TRUE)
        {
            $count = mysqli_num_rows($res);

            if($count==1)
            {
                //User exist and password can be changed
                //echo "User Found";
                //3. check whether the new password match or not
                if($new_password = $confirm_password)
                {
                    //update/change the password
                    $sql2 = "UPDATE tbl_admin SET
                        password='$new_password'
                        WHERE id=$id
                    ";

                    //execute the query
                    $res2 = mysqli_query($conn, $sql2);

                    //check whether dthe query executed or not
                    if($res2==TRUE)
                    {
                        //display success message
                        $_SESSION['change-pwd'] = "<div class='success'>Password changed successfully...</div>";
                        //redirect
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                    else
                    {
                        //display error message
                        $_SESSION['change-pwd'] = "<div class='error'>Failed to change Password!!!</div>";
                        //redirect
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }

                }
                else
                {
                    //redirect to manage admin page with error message
                    $_SESSION['pwd-not-match'] = "<div class='error'>Password did not match</div>";
                    //redirect
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }

            }
            else
            {
                //user does not exist set message and redirect
                $_SESSION['user-not-found'] = "<div class='error'>User Not Found!!!</div>";
                //redirect
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }
    }
?>

<?php include('partials/footer.php') ?>