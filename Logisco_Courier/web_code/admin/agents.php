<?php 
include "nav.inc.php";

// Check if the 'status' parameter is set to update the status
if (isset($_GET['approve_id'])) {
    $approve_id = $_GET['approve_id'];
    $update_sql = "UPDATE users SET account = 'approve' WHERE id = $approve_id";
    mysqli_query($conn, $update_sql);
}else if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_sql = "DELETE FROM `users` WHERE id = $delete_id";
    mysqli_query($conn, $delete_sql);
}

$sql = "SELECT * FROM users WHERE role = 'AGENT'";
$res = mysqli_query($conn, $sql);

?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>VIEW ADMIN</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="index.html">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">All Agents</div>
                    </li>
                </ul>
            </div>

            <div class="wg-box">
                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <form class="form-search">
                            <fieldset class="name">
                                <input type="text" placeholder="Search here..." class="" name="name"
                                    tabindex="2" value="" aria-required="true" required="">
                            </fieldset>
                            <div class="button-submit">
                                <button class="" type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="wg-table table-all-user">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Phone</th>
                                    <th>Password</th>
                                    <th>City</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i = 1;
                                while($row = mysqli_fetch_assoc($res)){
                                ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $row['NAME'] ?></td>
                                    <td><?php echo $row['EMAIL'] ?></td>
                                    <td><?php echo $row['PHONE'] ?></td>
                                    <td><?php echo $row['PASSWORD'] ?></td>
                                    <td><?php echo $row['City'] ?></td>
                                    <td>
                                        <?php if ($row['account'] == 'approve') { ?>
                                            <span class="btn btn-success p-3" style="font-size:13px;">Approve</span>
                                        <?php } else { ?>
                                            <a href="?approve_id=<?php echo $row['ID'] ?>" class="btn btn-primary p-3" style="font-size:13px">Pending</a>
                                            
                                        <?php } ?>
                                        <a href="?delete=<?php echo $row['ID'] ?>" class="btn btn-danger p-3" style="font-size:13px">Delete</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.inc.php";
?>
