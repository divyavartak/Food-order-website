<?php include('partials/menu.php') ?>

        <!-- Main section starts -->
        <div class="main-content">
            <div class="wrapper">
                <h2 style="padding: 3%; text-align:center; color:black">DASHBOARD</h2>
                <br>
                <?php 
                    /*if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }*/
                ?>
                <br>
               
                <div class="col-4 text-center">
                
                    <?php 
                        $sql = "SELECT * FROM tbl_category";
                        //execute query
                        $res = mysqli_query($conn, $sql);
                        //count rows
                        $count = mysqli_num_rows($res);
                    ?>
                

                    <h1 ><?php echo $count; ?></h1></br>
                       <h2 >Categories</h2>
                
                </div>

                <div class="col-4 text-center">
                    <?php 
                        $sql2 = "SELECT * FROM tbl_food";
                        //execute query
                        $res2 = mysqli_query($conn, $sql2);
                        //count rows
                        $count2 = mysqli_num_rows($res2);
                    ?>
                    <h1 ><?php echo $count2; ?></h1></br>
                    <h2 >Foods</h2>
                </div>

                <div class="col-4 text-center">
                    <?php 
                        $sql3 = "SELECT * FROM tbl_order";
                        //execute query
                        $res3 = mysqli_query($conn, $sql3);
                        //count rows
                        $count3 = mysqli_num_rows($res3);
                    ?>
                    <h1 ><?php echo $count3; ?></h1></br>
                    <h2 >Total Orders</h2>
                </div>

                <div class="col-4 text-center">
                    <?php 
                        //create sql to query to get revenue
                        //aggregate function in sql
                        $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";

                        //execute the query
                        $res4 = mysqli_query($conn, $sql4);

                        //get the values
                        $row4 = mysqli_fetch_assoc($res4);

                        //create the total revenue
                        $total_revenue = $row4['Total'];
                    ?>
                    <h1 ><?php echo $total_revenue; ?></h1></br>
                    <h2 >Revenue Generated</h2>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Main section ends -->
<?php include('partials/footer.php')?>
