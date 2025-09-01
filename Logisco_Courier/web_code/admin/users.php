<?php 
include "nav.inc.php";

$sql = "SELECT * FROM users WHERE ROLE = 'USERS' ";
$res = mysqli_query($conn,$sql);

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
                                <td>Phone</td>
                                <th>Password</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 1;
                            while($row = mysqli_fetch_assoc($res)){
                            ?>
                            <tr>
                                
                                <td><?php echo  $i++?></td>
                                <td><?php echo $row['NAME']?></td>
                                <td><?php echo $row['EMAIL']?></td>
                                <td><?php echo $row['PHONE']?></td>
                                <td><?php echo $row['PASSWORD']?></td>
                            </tr>
                            <?php }?>
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
include "footer.inc.php"
?>