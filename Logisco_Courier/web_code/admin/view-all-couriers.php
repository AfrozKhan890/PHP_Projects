<?php
include "nav.inc.php";

// Pagination variables
$items_per_page = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $items_per_page;

// Query to fetch the total number of couriers
$total_sql = "SELECT COUNT(*) FROM logistics_form";
$total_result = mysqli_query($conn, $total_sql);
$total_row = mysqli_fetch_row($total_result);
$total_items = $total_row[0];
$total_pages = ceil($total_items / $items_per_page);

// Query to fetch the data for the current page
$sql = "SELECT * FROM logistics_form LIMIT $offset, $items_per_page";
$res = mysqli_query($conn, $sql);

if (!$res) {
    die('Error executing query: ' . mysqli_error($conn));
}

// Handle the form submission for updating the status
if (isset($_POST['update_status'])) {
    $courier_id = $_POST['courier_id'];
    $status = $_POST['status'];
    $update_sql = "UPDATE logistics_form SET status = '$status' WHERE id = '$courier_id'";
    $update_result = mysqli_query($conn, $update_sql);

    if ($update_result) {
        echo "<script>alert('Status updated successfully!');</script>";
    } else {
        echo "<script>alert('Error updating status: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<style>
/* Styling for pagination */
.pagination-button {
    padding: 8px 16px;
    margin: 2px;
    text-decoration: none;
    color: #333;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.pagination-button.disabled {
    background-color: #eee;
    color: gray;
    pointer-events: none;
}

/* Modal styling */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
    background-color: #fff;
    margin: 10% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 600px;
}

.close-button {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close-button:hover,
.close-button:focus {
    color: black;
    cursor: pointer;
}

.button {
    padding: 10px 20px;
    margin: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    cursor: pointer;
}

.button:hover {
    background-color: #0056b3;
}

.barcode {
    margin-top: 20px;
    text-align: center;
    
}

tr th{
    width: 150px;
}
/* Container for both the search bar and filter dropdown */
.filter-container {
    display: flex;
    align-items: center; /* Align items vertically in the center */
    gap: 15px; /* Add space between search bar and filter dropdown */
    margin-bottom: 20px; /* Add some margin below the container */
}

/* Style for the search input */
#searchInput {
    padding: 8px;
    font-size: 14px;
    width: 250px; /* Set width for search input */
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Style for the status filter dropdown */
#statusFilter {
    padding: 8px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 200px; /* Set width for filter dropdown */
}

/* Optional: Style for the select options */
#statusFilter option {
    padding: 8px;
}
.pagination-button {
    padding: 8px 16px;
    margin: 2px;
    text-decoration: none;
    color: #333;
    border: 1px solid #ddd;
    border-radius: 4px;
    background-color: #fff;
}

.pagination-button.disabled {
    background-color: #eee;
    color: gray;
    pointer-events: none;
}

.pagination-button:hover:not(.disabled) {
    background-color: #f0f0f0;
}

.pagination-button:active {
    background-color: #ddd;
}

</style>

<div class="main-content">
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <h3>Users</h3>
            <div class="wg-box">
                <div class="wg-table table-all-user">
                <div class="filter-container">
    <!-- Search bar (you can keep your existing one) -->
    <input type="text" id="searchInput" placeholder="Search..." onkeyup="searchTable()" />
    
    <!-- Status filter dropdown -->
    <select id="statusFilter" onchange="filterByStatus()">
                        <option value="Panding">Pending</option>
                        <option value="In Transit">In Transit</option>
                        <option value="Out for Delivery">Out for Delivery</option>
                        <option value="Delivered">Delivered</option>
                        <option value="Cancelled">Cancelled</option>
                        <option value="Returned">Returned</option>
                        <option value="Picked Up">Picked Up</option>
    <!-- More options... -->
</select>


</div>

                    <div class="table-responsive courier-list">
                        <table id="courierTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Phone</th>
                                    <th>Pickup From</th>
                                    <th>Dropoff</th>
                                    <th>Delivery Type</th>
                                    <th>Quantity</th>
                                    <th>Weight</th>
                                    <th>Width</th>
                                    <th>Height</th>
                                    <th>Total Charges</th>
                                    <th>Status</th>
                                    <th>Trace ID</th>
                                </tr>
                            </thead>
                            <tbody id="courierData">
                                <?php 
                                $i = $offset + 1;
                                while($row = mysqli_fetch_assoc($res)) {
                                ?>
                                <tr onclick="openOptionsModal(<?php echo $row['id']; ?>, '<?php echo $row['full_name']; ?>', '<?php echo $row['email']; ?>', '<?php echo $row['phone_number']; ?>', '<?php echo $row['pickup_address']; ?>', '<?php echo $row['drop_off_address']; ?>', '<?php echo $row['delivery_type']; ?>', '<?php echo $row['quantity']; ?>', '<?php echo $row['weight']; ?>', '<?php echo $row['width']; ?>', '<?php echo $row['height']; ?>', '<?php echo $row['Total_charges']; ?>', '<?php echo $row['status']; ?>', '<?php echo $row['trace_id']; ?>')">
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
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <div id="pagination">
    <a href="?page=<?php echo $page - 1; ?>" class="pagination-button <?php echo $page == 1 ? 'disabled' : ''; ?>">Previous</a>
    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
        <a href="?page=<?php echo $i; ?>" class="pagination-button <?php echo $i === $page ? 'disabled' : ''; ?>">
            <?php echo $i; ?>
        </a>
    <?php endfor; ?>
    <a href="?page=<?php echo $page + 1; ?>" class="pagination-button <?php echo $page == $total_pages ? 'disabled' : ''; ?>">Next</a>
</div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Options Modal Structure -->
<div id="optionsModal" class="modal">
    <div class="modal-content">
        <span class="close-button" onclick="closeOptionsModal()">&times;</span>
        <h2>Select an Option</h2>
        <button class="button" onclick="showInvoice()">Show Invoice</button>
        <button class="button" onclick="showStatusUpdate()">Update Status</button>
    </div>
</div>

<!-- Invoice Modal Structure -->
<div id="userModal" class="modal">
    <div class="modal-content">
        <span class="close-button" onclick="closeModal('userModal')">&times;</span>
        <div class="invoice-content">
            <!-- Invoice Details Here -->
            <table>
                <tr><td><strong>Name:</strong></td><td id="fullName"></td></tr>
                <tr><td><strong>Email:</strong></td><td id="email"></td></tr>
                <tr><td><strong>Phone:</strong></td><td id="phone"></td></tr>
                <tr><td><strong>Pickup From:</strong></td><td id="pickupAddress"></td></tr>
                <tr><td><strong>Dropoff:</strong></td><td id="dropoffAddress"></td></tr>
                <tr><td><strong>Delivery Type:</strong></td><td id="deliveryType"></td></tr>
                <tr><td><strong>Quantity:</strong></td><td id="quantity"></td></tr>
                <tr><td><strong>Weight:</strong></td><td id="weight"></td></tr>
                <tr><td><strong>Width:</strong></td><td id="width"></td></tr>
                <tr><td><strong>Height:</strong></td><td id="height"></td></tr>
                <tr><td><strong>Total Charges:</strong></td><td id="totalCharges"></td></tr>
                <tr><td><strong>Status:</strong></td><td id="status"></td></tr>
                <tr><td><strong>Trace ID:</strong></td><td id="traceId"></td></tr>
            </table>
            <div class="barcode">
                <svg id="barcode"></svg>
            </div>
            <button class="button" onclick="printInvoice()">Print Invoice</button>
        </div>
    </div>
</div>

<!-- Status Update Modal Structure -->
<div id="statusModal" class="modal">
    <div class="modal-content">
        <span class="close-button" onclick="closeStatusModal()">&times;</span>
        <h2>Update Status</h2>
        <form method="POST" action="">
            <input type="hidden" id="courierId" name="courier_id">
            <label for="status">Select Status:</label>
            <select id="status" name="status">
                        <option value="Pending">Pending</option>
                        <option value="In Transit">In Transit</option>
                        <option value="Out for Delivery">Out for Delivery</option>
                        <option value="Delivered">Delivered</option>
                        <option value="Cancelled">Cancelled</option>
                        <option value="Returned">Returned</option>
                        <option value="Picked Up">Picked Up</option>
            </select>
            <button type="submit" name="update_status" class="button">Update Status</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>

<script>
// Modal related functions
let currentRowData = {};

function openOptionsModal(id, fullName, email, phone, pickupAddress, dropoffAddress, deliveryType, quantity, weight, width, height, totalCharges, status, traceId) {
    currentRowData = { id, fullName, email, phone, pickupAddress, dropoffAddress, deliveryType, quantity, weight, width, height, totalCharges, status, traceId };
    document.getElementById('optionsModal').style.display = 'block';
}

function closeOptionsModal() {
    document.getElementById('optionsModal').style.display = 'none';
}

function showInvoice() {
    document.getElementById('userModal').style.display = 'block';
    document.getElementById('fullName').innerText = currentRowData.fullName;
    document.getElementById('email').innerText = currentRowData.email;
    document.getElementById('phone').innerText = currentRowData.phone;
    document.getElementById('pickupAddress').innerText = currentRowData.pickupAddress;
    document.getElementById('dropoffAddress').innerText = currentRowData.dropoffAddress;
    document.getElementById('deliveryType').innerText = currentRowData.deliveryType;
    document.getElementById('quantity').innerText = currentRowData.quantity;
    document.getElementById('weight').innerText = currentRowData.weight;
    document.getElementById('width').innerText = currentRowData.width;
    document.getElementById('height').innerText = currentRowData.height;
    document.getElementById('totalCharges').innerText = currentRowData.totalCharges;
    document.getElementById('status').innerText = currentRowData.status;
    document.getElementById('traceId').innerText = currentRowData.traceId;

    // Generate the barcode
    JsBarcode("#barcode", currentRowData.traceId, {
        format: "CODE128",
        displayValue: true,
        width: 3  // Adjust the width value here (default is 2)

    });
}


function printInvoice() {
    window.print();
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

function showStatusUpdate() {
    document.getElementById('statusModal').style.display = 'block';
    document.getElementById('courierId').value = currentRowData.id;
    document.getElementById('status').value = currentRowData.status;
}

function closeStatusModal() {
    document.getElementById('statusModal').style.display = 'none';
}
// Function to filter the table based on the selected status
function searchTable() {
    let input = document.getElementById("searchInput");
    let filter = input.value.toLowerCase();
    let rows = document.getElementById("courierTable").getElementsByTagName("tr");

    for (let i = 1; i < rows.length; i++) {
        let row = rows[i];
        let cells = row.getElementsByTagName("td");
        let name = cells[1].textContent || cells[1].innerText;
        let email = cells[2].textContent || cells[2].innerText;

        if (name.toLowerCase().indexOf(filter) > -1 || email.toLowerCase().indexOf(filter) > -1) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    }
}

function filterByStatus() {
    let filterValue = document.getElementById('statusFilter').value;
    let rows = document.getElementById("courierTable").getElementsByTagName("tr");

    for (let i = 1; i < rows.length; i++) {
        let row = rows[i];
        let status = row.getElementsByTagName("td")[12].textContent; // Assuming status is in the 13th column

        if (filterValue === "All" || status === filterValue) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    }
}




</script>

