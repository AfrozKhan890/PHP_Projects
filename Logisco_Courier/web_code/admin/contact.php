<?php 
include "nav.inc.php";

// Fetch messages from contact_form
$sql = "SELECT * FROM contact_form ORDER BY ID DESC";
$res = mysqli_query($conn, $sql);

// Handle reply submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['replyMessage'])) {
    $contactId = $_POST['userId']; // The ID of the message to reply to
    $replyMessage = $_POST['replyMessage'];


}
?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <h3>Contact Messages</h3>

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



<?php
include "footer.inc.php";
?>
