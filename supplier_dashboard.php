<?php include('./layout/supplier/header.php'); 


if(!isset($_SESSION['id'])) {
    echo "<script>
        alert('Please login first');
        window.location.href = 'login.php';
    </script>";
}

$id = $_SESSION['id'];
?>

<div style="display: flex;gap: 15px;position: scroll;">

<?php include('./layout/supplier/sidebar.php') ?>

    <div style="height: 100vh; width: 86%;padding-top: 100px;position:scroll;">
        <div class="table-responsive" style="margin-top: 20px;">
            <p style="text-align:center;font-size: 19px;font-weight: 900;">Manage your Products</p>
            <div class="container mt-5">

        <table class="table table-hover" id="example" width="100%">
        <thead class="table-dark" style="font-weight: 600;font-size: 15px;" width="100%">
            <tr>
                <th>No</th>
                <th>Cylinder Name</th>
                <th>Supplier Name</th>
                <th>Contacts</th>
                <th>Location</th>
                <th>Status</th>
                <th>Price</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php

                // Fetch supplier-specific details from the database
                $sql = "SELECT * FROM product WHERE supplier_id='$id'";
                $result = mysqli_query($conn, $sql);
            
        if (mysqli_num_rows($result) > 0) {
                $counter = 1;
            while ($row = mysqli_fetch_assoc($result)) {

        ?>
            <tr>
                <td><?php echo $counter;?></td>
                <td><?php echo $row['cylinder']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['contact']; ?></td>
                <td><?php echo $row['location']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><a href="deleteproduct.php?id=<?php echo $row['id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                </svg></a></td>
                <td><a href="productupdate.php?id=<?php echo $row['id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                </svg></a></td>
            </tr>
        <?php
              $counter++;
            }

        } else {
        ?>
            <tr>
                <td colspan="8" style="text-align: center;">No products found.</td>
            </tr>
        <?php
        }
        ?>
        </tbody>
        </table>
    </div>
        </div>
    </div>
</div>

<?php include('./layout/supplier/footer.php'); ?>
