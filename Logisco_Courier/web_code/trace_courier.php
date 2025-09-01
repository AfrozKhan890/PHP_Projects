<?php 
include "nav.inc.php";

$msg = "";
$data = null;

if (isset($_POST['trace']) || isset($_GET['trace_id'])) {
    // Check if the trace ID is coming from POST (form submission) or GET (URL parameter)
    $t_id = isset($_POST['t-id']) ? $_POST['t-id'] : (isset($_GET['trace_id']) ? $_GET['trace_id'] : '');

    // Check if Trace ID is provided
    if ($t_id) {
        // Use mysqli_real_escape_string to secure the input
        $t_id = mysqli_real_escape_string($con, $t_id);
        $sel_courier = "SELECT * FROM logistics_form WHERE trace_id = '$t_id'";
        $res = mysqli_query($con, $sel_courier);

        if (mysqli_num_rows($res) > 0) {
            $data = mysqli_fetch_all($res, MYSQLI_ASSOC); // Fetch all results as an associative array
        } else {
            $msg = "No record found for the given Trace ID.";
        }
    } else {
        $msg = "Please provide a valid Trace ID.";
    }
}
?>

<style>
    table {
    width: 100%; /* Make the table full width */
    border-collapse: collapse; /* Collapse the borders for a clean look */
    margin-top: 30px;
}

table th, table td {
    padding: 12px; /* Padding for better readability */
    border: 1px solid #ddd; /* Light border */
    text-align: center; /* Center-align content */
    font-size: 15px;
}

table th {
    background-color: #f2f2f2;
    font-size: 13px;
     /* Light gray background for headers */
}

@media (max-width: 768px) {
    table, tbody, th, td, tr {
        display: block;
        width: 100%;
    }
    
    tbody td {
        text-align: left; /* Left-align table data on smaller screens */
        padding: 10px;
    }
}
input{
    width: 100%;
}
.table-container{
    width: 900px;
    padding-right: 10%;
    
    
}
</style>
<div class="logisco-page-wrapper" id="logisco-page-wrapper">
    <div class="gdlr-core-page-builder-body">
        <!-- Page Header Section -->
        <div class="gdlr-core-pbf-wrapper " style="padding: 350px 0px 160px 0px;" id="gdlr-core-wrapper-1">
            <div class="gdlr-core-pbf-background-wrap">
                <div class="gdlr-core-pbf-background gdlr-core-parallax gdlr-core-js" style="background-image: url(upload/bg-3.jpg); background-size: cover; background-position: center;" data-parallax-speed="0.3"></div>
            </div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js" data-gdlr-animation="fadeInUp" data-gdlr-animation-duration="600ms" data-gdlr-animation-offset="0.8">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix gdlr-core-center-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr">
                            <div class="gdlr-core-title-item-title-wrap">
                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 75px; font-weight: 700; color: #ffffff;">Trace Courier</h3>
                            </div>
                            <span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 25px; color: #f2f2f2; margin-top: 25px;">Get Courier Details</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <div class="gdlr-core-pbf-wrapper" style="padding: 85px 0px 20px 0px; background-color: #f3f3f3;">
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <div class="gdlr-core-pbf-column gdlr-core-column-60 gdlr-core-column-first">
                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js">
                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js" style="max-width: 760px;">
                                <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix gdlr-core-center-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr" style="padding-bottom: 45px;">
                                    <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 39px;">Trace your Courier</h3>
                                    <span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 19px;">Copy Tracking Id from Notification bar</span>
                                </div>

                                <!-- Form -->
                                <form method="post">
                                    <div class="quform-elements">
                                        <div class="quform-element" style="color:red;">
                                            <?php echo $msg; ?>
                                        </div>
                                        <div class="quform-element">
                                            <span class="wpcf7-form-control your-email">
                                                Trace ID:
                                                <input type="number" name="t-id" size="40" class="input1" aria-required="true" placeholder="Enter T-ID*">
                                            </span>
                                        </div>
                                        <div class="quform-submit-inner">
                                            <button name="trace" type="submit" class="submit-button"><span>Check Now</span></button>
                                        </div>
                                    </div>
                                </form>

                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('form').on('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        // Get the input value
        var traceId = $('input[name="t-id"]').val();

        // Check if the traceId is empty (in case the user didn't enter any ID)
        if (traceId.trim() === '') {
            alert("Please enter a Trace ID.");
            return;
        }

        // Send AJAX request to the server
        $.ajax({
            url: '', // URL to the current PHP page
            type: 'POST',
            data: { trace: true, 't-id': traceId },
            success: function(response) {
                // Display the response within the page
                $('.table-container').html($(response).find('.table-container').html());
            },
            error: function() {
                alert('An error occurred. Please try again.');
            }
        });
    });
});

</script>


                                <!-- Display Data in Table -->
                                <div class="table-container" style="margin-top: 30px;">
                                <?php if(!empty($data)): ?>
                                <table border="2" cellpadding="20" cellspacing="1" style="width: 100%; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>Tracking ID</th>
                                            <th>Sender Name</th>
                                            <th>Receiver Name</th>
                                            <th>Send From</th>
                                            <th>Drop_off Address</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Quantity</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($data as $row): ?>
                                            <tr>
                                                <td><?php echo $row['trace_id']; ?></td>
                                                <td><?php echo $row['full_name']; ?></td>
                                                <td><?php echo $row['receiver_name']; ?></td>
                                                <td><?php echo $row['pickup_address']; ?></td>
                                                <td><?php echo $row['drop_off_address']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['phone_number']; ?></td>
                                                <td><?php echo $row['quantity']; ?></td>
                                                <td><?php echo $row['status']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <?php else: ?>
                                    <p><?php echo $msg; ?></p>
                                <?php endif; ?>
                            </div>


                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include "footer.inc.php";
?>
