<?php include "nav.inc.php";

?>
<style>
   
    th{
        width: 120px;
    }
    .email{
        width: 180px;
    }
</style>
<div class="main-content">
<div class="main-content-inner">

<div class="main-content-wrap">
    <div class="tf-section-2 mb-30">
        <div class="flex gap20 flex-wrap-mobile">
            <div class="w-half">

                <div class="wg-chart-default mb-20">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap14">
                            <div class="image ic-bg">
                                <i class="icon-shopping-bag"></i>
                            </div>
                            <div>
                                <div class="body-text mb-2">Total Couriers</div>
                                <?php
							$sel_count_m = "SELECT COUNT(*) FROM `logistics_form`";
							$res_count_m = mysqli_query($conn, $sel_count_m);

							// Fetch the count value
							$row_m = mysqli_fetch_row($res_count_m);

							// Get the count from the first column (COUNT(*) is a single value)
							$show_count_m = $row_m[0];
							?>
							<h3><?php echo $show_count_m;?></h3>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="wg-chart-default mb-20">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap14">
                            <div class="image ic-bg">
                                <i class="icon-dollar-sign"></i>
                            </div>
                            <div>
                                <div class="body-text mb-2">Total Amount</div>
                                <?php
							$sel_count_m = "SELECT SUM(Total_charges) FROM `logistics_form`";
							$res_count_m = mysqli_query($conn, $sel_count_m);

							// Fetch the count value
							$row_m = mysqli_fetch_row($res_count_m);

							// Get the count from the first column (COUNT(*) is a single value)
							$show_count_m = $row_m[0];
							?>
							<h3><?php echo $show_count_m;?></h3>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="wg-chart-default mb-20">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap14">
                            <div class="image ic-bg">
                                <i class="icon-shopping-bag"></i>
                            </div>
                            <div>
                                <div class="body-text mb-2">Pending Orders</div>
                                <?php
							$sel_count_m = "SELECT COUNT(*) FROM `logistics_form` WHERE status = 'Panding'";
							$res_count_m = mysqli_query($conn, $sel_count_m);

							// Fetch the count value
							$row_m = mysqli_fetch_row($res_count_m);

							// Get the count from the first column (COUNT(*) is a single value)
							$show_count_m = $row_m[0];
							?>
							<h3><?php echo $show_count_m;?></h3>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="wg-chart-default">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap14">
                            <div class="image ic-bg">
                                <i class="icon-dollar-sign"></i>
                            </div>
                            <div>
                                <div class="body-text mb-2">Pending Orders Amount</div>
                                <?php
							$sel_count_m = "SELECT SUM(Total_charges) FROM `logistics_form` WHERE status = 'Panding'";
							$res_count_m = mysqli_query($conn, $sel_count_m);

							// Fetch the count value
							$row_m = mysqli_fetch_row($res_count_m);

							// Get the count from the first column (COUNT(*) is a single value)
							$show_count_m = $row_m[0];
							?>
							<h3><?php echo $show_count_m;?></h3>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="w-half">

                <div class="wg-chart-default mb-20">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap14">
                            <div class="image ic-bg">
                                <i class="icon-shopping-bag"></i>
                            </div>
                            <div>
                                <div class="body-text mb-2">Delivered Orders</div>
                                <?php
							$sel_count_m = "SELECT COUNT(*) FROM `logistics_form` WHERE status = 'Delivered'";
							$res_count_m = mysqli_query($conn, $sel_count_m);

							// Fetch the count value
							$row_m = mysqli_fetch_row($res_count_m);

							// Get the count from the first column (COUNT(*) is a single value)
							$show_count_m = $row_m[0];
							?>
							<h3><?php echo $show_count_m;?></h3>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="wg-chart-default mb-20">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap14">
                            <div class="image ic-bg">
                                <i class="icon-dollar-sign"></i>
                            </div>
                            <div>
                                <div class="body-text mb-2">Delivered Orders Amount</div>
                                <?php
							$sel_count_m = "SELECT SUM(Total_charges) FROM `logistics_form` WHERE status = 'Delivered'";
							$res_count_m = mysqli_query($conn, $sel_count_m);

							// Fetch the count value
							$row_m = mysqli_fetch_row($res_count_m);

							// Get the count from the first column (COUNT(*) is a single value)
							$show_count_m = $row_m[0];
							?>
							<h3><?php echo $show_count_m;?></h3>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="wg-chart-default mb-20">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap14">
                            <div class="image ic-bg">
                                <i class="icon-shopping-bag"></i>
                            </div>
                            <div>
                                <div class="body-text mb-2">Canceled Orders</div>
                                <?php
							$sel_count_m = "SELECT COUNT(*) FROM `logistics_form` WHERE status = 'Cancelled'";
							$res_count_m = mysqli_query($conn, $sel_count_m);

							// Fetch the count value
							$row_m = mysqli_fetch_row($res_count_m);

							// Get the count from the first column (COUNT(*) is a single value)
							$show_count_m = $row_m[0];
							?>
							<h3><?php echo $show_count_m;?></h3>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="wg-chart-default">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap14">
                            <div class="image ic-bg">
                                <i class="icon-dollar-sign"></i>
                            </div>
                            <div>
                                <div class="body-text mb-2">Canceled Orders Amount</div>
                                <?php
							$sel_count_m = "SELECT SUM(Total_charges) FROM `logistics_form` WHERE status = 'Cancelled'";
							$res_count_m = mysqli_query($conn, $sel_count_m);

							// Fetch the count value
							$row_m = mysqli_fetch_row($res_count_m);

							// Get the count from the first column (COUNT(*) is a single value)
							$show_count_m = $row_m[0];
							?>
							<h3><?php echo $show_count_m;?></h3>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between">
                <h5>Earnings revenue</h5>
                <div class="dropdown default">
                    <button class="btn btn-secondary dropdown-toggle" type="button"
                        data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <span class="icon-more"><i class="icon-more-horizontal"></i></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a href="javascript:void(0);">This Week</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">Last Week</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-wrap gap40">
                <div>
                    <div class="mb-2">
                        <div class="block-legend">
                            <div class="dot t1"></div>
                            <div class="text-tiny">Revenue</div>
                        </div>
                    </div>
                    <div class="flex items-center gap10">
                        <h4>$37,802</h4>
                        <div class="box-icon-trending up">
                            <i class="icon-trending-up"></i>
                            <div class="body-title number">0.56%</div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="mb-2">
                        <div class="block-legend">
                            <div class="dot t2"></div>
                            <div class="text-tiny">Order</div>
                        </div>
                    </div>
                    <div class="flex items-center gap10">
                        <h4>$28,305</h4>
                        <div class="box-icon-trending up">
                            <i class="icon-trending-up"></i>
                            <div class="body-title number">0.56%</div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="line-chart-8"></div>
        </div>

    </div>
    <div class="tf-section mb-30">

        <div class="wg-box">
            <div class="flex items-center justify-between">
                <h5>Recent orders</h5>
                <div class="dropdown default">
                    <a class="btn btn-secondary dropdown-toggle" href="#">
                        <span class="view-all">View all</span>
                    </a>
                </div>
            </div>
            <div class="wg-table table-all-user">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                    <th class='text-center'>#</th>
                                    <th class='text-center name'>Name</th>
                                    <th class='text-center email'>E-mail</th>
                                    <th class='text-center'>Phone</th>
                                    <th class='text-center'>Pickup From</th>
                                    <th class='text-center'>Dropoff</th>
                                    <th class='text-center'>Delivery Type</th>
                                    <th class='text-center'>Quantity</th>
                                    <th class='text-center'>Weight</th>
                                    <th class='text-center'>Width</th>
                                    <th class='text-center'>Height</th>
                                    <th class='text-center'>Total Charges</th>
                                    <th class='text-center'>Status</th>
                                    <th class='text-center'>Trace ID</th>
                            </tr>
                            <?php 
                            $items_per_page = 3;
                            $sql = "SELECT * FROM logistics_form ORDER BY id DESC LIMIT  $items_per_page";
                            $res = mysqli_query($conn, $sql);
                            
                            if (!$res) {
                                die('Error executing query: ' . mysqli_error($conn));
                            }
                            ?>
                                <?php 
                                $i = 1;
                                while($row = mysqli_fetch_assoc($res)) {
                                ?>
                            <tr>
                                  <td><?php echo $i++?></td>
                                    <td><?php echo $row['full_name']?></td>
                                    <td><?php echo $row['email']?></td>
                                    <td><?php echo $row['phone_number']?></td>
                                    <td><?php echo $row['pickup_address']?></td>
                                    <td><?php echo $row['drop_off_address']?></td>
                                    <td><?php echo $row['delivery_type']?></td>
                                    <td><?php echo $row['quantity']?></td>
                                    <td><?php echo $row['weight']?>KG</td>
                                    <td><?php echo $row['width']?>Cm</td>
                                    <td><?php echo $row['height']?>Cm</td>
                                    <td><?php echo $row['Total_charges']?></td>
                                    <td><?php echo $row['status']?></td>
                                    <td><?php echo $row['trace_id']?></td>
                                </tr>
                                <?php }?>
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="wg-box">
                <div class="wg-table table-all-user">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $limit = 3;
                                $sql = "SELECT * FROM contact_form ORDER BY ID DESC LIMIT $limit";
                                $res = mysqli_query($conn, $sql);
                                
                                // Handle reply submission
                                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['replyMessage'])) {
                                    $contactId = $_POST['userId']; // The ID of the message to reply to
                                    $replyMessage = $_POST['replyMessage'];
                                
                                
                                }
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($res)) {
                                ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['Name']; ?></td>
                                    <td><?php echo $row['Email']; ?></td>
                                    <td><?php echo $row['Message']; ?></td>
                                    <td><a style="font-size:12px" class="btn btn-success p-4 " href="https://gmail.com/" target="_blank">Replay on Gmail</a></td>
                                   
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

    </div>
</div>

</div>
</div>
<?php include "footer.inc.php";?>