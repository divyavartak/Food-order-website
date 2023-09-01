<?php include('partials/menu.php') ?>
    <!-- Main section starts -->
    <div class="main-content">
        <div class="wrapper">
            <h1 style="text-align:center; color:black">Manage Admin</h1><br>
            
            <?php 
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];//Displaying session message
                    unset($_SESSION['add']);//removing session message
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];//Displaying session message
                    unset($_SESSION['delete']);//removing session message
                }

                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];//Displaying session message
                    unset($_SESSION['update']);//removing session message
                }

                if(isset($_SESSION['user-not-found']))
                {
                    echo $_SESSION['user-not-found'];//Displaying session message
                    unset($_SESSION['user-not-found']);//removing session message
                }

                if(isset($_SESSION['pwd-not-match']))
                {
                    echo $_SESSION['pwd-not-match'];//Displaying session message
                    unset($_SESSION['pwd-not-match']);//removing session message
                }

                if(isset($_SESSION['change-pwd']))
                {
                    echo $_SESSION['change-pwd'];//Displaying session message
                    unset($_SESSION['change-pwd']);//removing session message
                }

            ?>
            <br><br>
            <!-- Button to add admin -->
            <a href="add-admin.php" class="btn-primary" >Add Admin</a>

            <br><br><br>
            <table class="tbl-full" style="color:white">
                <tr >
                    <th >S.N.</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>

                <?php
                //Query to get all admin
                    $sql = "SELECT * FROM tbl_admin";
                    //execute the query
                    $res = mysqli_query($conn, $sql);

                    //check whehther the query is executed or not
                    if($res==TRUE)
                    {
                        //Count rows to check whether we have data in database or not
                        $count = mysqli_num_rows($res); //funciton to get all rows in database

                        $sn=1; //create a variable and assign the value

                        //check the no of rows
                        if($count>0)
                        {
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                //get all data from db 
                                //get individual data
                                $id=$rows['id'];
                                $full_name=$rows['full_name'];
                                $username=$rows['username'];

                                //display the value in table
                                ?>

                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                        <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                    </td>
                                </tr>

                                <?php
                            }
                        }
                        else
                        {

                        }
                    }
                ?>
                
            </table>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Main section ends -->

<?php include('partials/footer.php')?>
