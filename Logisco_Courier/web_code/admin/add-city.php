<?php
include 'nav.inc.php';
$msg = "";

if (isset($_POST['submit']) && empty($_POST['city_id'])) {
    // Add new city logic
    $city = $_POST['city'];

    // Sanitize input to avoid SQL injection
    $city = mysqli_real_escape_string($conn, $city);
    $query = "INSERT INTO cities(city) VALUES('$city')";
    $insert = mysqli_query($conn, $query);

    if ($insert) {
        $msg = "New City Added Successfully";
    } else {
        $msg = "Failed to Add New City";
    }
} elseif (isset($_POST['update']) && !empty($_POST['city_id'])) {
    // Update existing city logic
    $updated_city = $_POST['city'];
    $city_id = $_POST['city_id'];
    $updated_city = mysqli_real_escape_string($conn, $updated_city);

    $update_query = "UPDATE cities SET city = '$updated_city' WHERE id = $city_id";
    if (mysqli_query($conn, $update_query)) {
        $msg = "City Updated Successfully";
    } else {
        $msg = "Failed to Update City";
    }
}

// For handling city deletion
if (isset($_GET['delete_id'])) {
    $city_id = $_GET['delete_id'];
    $delete_query = "DELETE FROM cities WHERE id = $city_id";
    if (mysqli_query($conn, $delete_query)) {
        $msg = "City Deleted Successfully";
    } else {
        $msg = "Failed to Delete City";
    }
}

// For handling city edit (get data if editing)
if (isset($_GET['edit_id'])) {
    $city_id = $_GET['edit_id'];
    $query = "SELECT * FROM cities WHERE id = $city_id";
    $result = mysqli_query($conn, $query);
    $city_data = mysqli_fetch_assoc($result);
    $city_name = $city_data['city'];
}
?>

<style>
    th {
        width: 150px;
        text-align: center;
    }

    td {
        padding: 10px;
        text-align: center;
    }

    .btn {
        padding: 5px 10px;
        font-size: 14px;
        cursor: pointer;
    }

    .btn-edit {
        background-color: #007bff;
        color: #fff;
        border: none;
    }

    .btn-delete {
        background-color: #dc3545;
        color: #fff;
        border: none;
    }

    .btn:hover {
        opacity: 0.8;
    }

    .btn-edit:hover {
        background-color: #0056b3;
    }

    .btn-delete:hover {
        background-color: #c82333;
    }
    .modal-backdrop.show {
    background-color: black !important;
    width: 100%;
    height: 100%;
}

</style>

<div class="main-content">
    <div class="main-content-inner">
        
        <div class="wg-box">
            <div class="fs-4 "><?php echo $msg; ?></div>
            <!-- New City Form -->
            <div class="main-content-wrap">
                <h3><?php echo isset($city_name) ? "Edit City" : "Add New City"; ?></h3><br>
                <form method="POST" class="form-new-product">
                    <div class="form-group">
                        <label class="fs-4" for="city">City Name:</label><br><br>
                        <input type="text" name="city" id="city" class="form-control" required value="<?php echo isset($city_name) ? $city_name : ''; ?>" />
                        <!-- Hidden field to store city_id when editing -->
                        <?php if (isset($city_name)) { ?>
                            <input type="hidden" name="city_id" value="<?php echo $city_id; ?>" />
                        <?php } ?>
                    </div><br>
                    <div class="form-group">
                        <button type="submit" name="<?php echo isset($city_name) ? 'update' : 'submit'; ?>" class="tf-button w208">
                            <?php echo isset($city_name) ? "Update" : "Save"; ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <br><br>

        <!-- Cities Table -->
        <div class="wg-box">
            <h5> Cities</h5>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>City Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Pagination setup
                        $items_per_page = 5;
                        $sql = "SELECT * FROM cities LIMIT $items_per_page";
                        $res = mysqli_query($conn, $sql);
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($res)) { ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row['City']; ?></td>
                                <td>
                                <a href="javascript:void(0);" onclick="openEditModal('<?php echo $row['id']; ?>', '<?php echo $row['City']; ?>')" class="btn btn-edit">Edit</a>

                                    <a href="?delete_id=<?php echo $row['id']; ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this city?');">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <!-- Edit City Modal -->
<div class="modal fade " id="editCityModal" tabindex="-1" aria-labelledby="editCityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCityModalLabel">Edit City</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <input type="hidden" name="city_id" id="editCityId">
                    <div class="form-group">
                        <label for="city " class="fs-5">City Name:</label><br><br>
                        <input type="text" name="city" id="editCityName" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="update" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function openEditModal(cityId, cityName) {
        document.getElementById('editCityId').value = cityId;
        document.getElementById('editCityName').value = cityName;
        new bootstrap.Modal(document.getElementById('editCityModal')).show();
    }
</script>

            </div>
        </div>
    </div>
</div>

<?php include 'footer.inc.php'; ?>
