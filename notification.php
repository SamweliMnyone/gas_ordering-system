<?php include('./layout/supplier/header.php'); 

if(!isset($_SESSION['id'])) {
    echo "<script>
        alert('Please login first');
        window.location.href = 'login.php';
    </script>";
}

$customer_id = $_SESSION['id'];
?>

<div style="display: flex; gap: 15px; position: scroll;">

<?php include('./layout/supplier/sidebar.php'); ?>

<style>
    .unread {
        font-weight: bold;
        background-color: #f8d7da;
    }
    .read {
        background-color: #d4edda;
    }
    .notification-table th, .notification-table td {
        text-align: center;
    }
    .container {
        margin-top: 100px;
        flex: 1;
        margin-top:150px;
    }
</style>

<div class="container" style="margin-top:150px" >
    <h2 class="text-center">
        <svg style="width: 60px; height: 60px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-paper-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M6.5 9.5 3 7.5v-6A1.5 1.5 0 0 1 4.5 0h7A1.5 1.5 0 0 1 13 1.5v6l-3.5 2L8 8.75zM1.059 3.635 2 3.133v3.753L0 5.713V5.4a2 2 0 0 1 1.059-1.765M16 5.713l-2 1.173V3.133l.941.502A2 2 0 0 1 16 5.4zm0 1.16-5.693 3.337L16 13.372v-6.5Zm-8 3.199 7.941 4.412A2 2 0 0 1 14 16H2a2 2 0 0 1-1.941-1.516zm-8 3.3 5.693-3.162L0 6.873v6.5Z"/>
        </svg>
        Notifications Dashboard
    </h2>
    <div class="table-responsive">
        <table class="table table-hover notification-table">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Message</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="notification-body">
                <?php
                $sql = "SELECT * FROM `orders`";
                $result = mysqli_query($conn, $sql);
                
                if (mysqli_num_rows($result) > 0) {
                    $counter = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr class="<?php echo ($row['status'] == 'unread') ? 'unread' : 'read'; ?>">
                    <td><?php echo $counter; ?></td>
                    <td><?php echo htmlspecialchars($row['location']); ?></td>
                    <td><?php echo htmlspecialchars($row['location']); ?></td>
                    <td><?php echo htmlspecialchars($row['location']); ?></td>
                    <td><?php echo htmlspecialchars($row['message']); ?></td>
                    <td><?php echo htmlspecialchars($row['status']); ?></td>
                </tr>
                <?php
                        $counter++;
                    }
                } else {
                ?>
                <tr>
                    <td colspan="4" style="text-align: center;">No notifications found.</td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</div>

<?php include('./layout/supplier/footer.php'); ?>
