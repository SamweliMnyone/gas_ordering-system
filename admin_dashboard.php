<?php include('./layout/admin/header.php'); ?>

<div style="display: flex;gap: 15px;position: scroll;">

<?php include('./layout/admin/sidebar.php') ?>

    <div style="height: 100vh; width: 86%;padding-top: 70px;position:scroll;">
        <div class="table-responsive" style="margin-top: 20px;">
        
            <div class="container mt-5" >
            
<?php
// Fetch total customers
$customerQuery = "SELECT COUNT(*) AS totalCustomer FROM register WHERE `choice`='Customer'";
$customerResult = mysqli_query($conn, $customerQuery);
$totalCustomer = mysqli_fetch_assoc($customerResult)['totalCustomer'];

// Fetch  Number of  total suppliers
$supplierQuery = "SELECT COUNT(*) AS totalSuppliers FROM register WHERE `choice`='Supplier'";
$supplierResult = mysqli_query($conn, $supplierQuery);
$totalSuppliers = mysqli_fetch_assoc($supplierResult)['totalSuppliers'];

// Fetch  Number of  total cylinder
$cylinderQuery = "SELECT COUNT(*) AS totalCylinders FROM product";
$cylinderResult = mysqli_query($conn, $cylinderQuery);
$totalCylinders = mysqli_fetch_assoc($cylinderResult)['totalCylinders'];

//Fetch Number of Admin 
$orderQuery = "SELECT COUNT(*) AS totalOrders FROM orders";
$orderResult = mysqli_query($conn, $orderQuery);
$totalOrders = mysqli_fetch_assoc($orderResult)['totalOrders'];

//Fetch Number of Admin 
$adminQuery = "SELECT COUNT(*) AS totalAdmin FROM register WHERE `choice`='Admin'";
$adminResult = mysqli_query($conn, $adminQuery);
 $totalAdmin = mysqli_fetch_assoc($adminResult)['totalAdmin'];
?>

    <style>
        .hover-container {
            transition: transform 0.3s, background-color 0.3s;
            border-radius: 14px;
            text-align: center;
            font-weight: 900;
            color: rgb(0, 0, 0);
            padding: 60px;
            height: 150px;
        }

        .hover-container:hover {
            transform: scale(1.05);
            background-color: rgba(0, 0, 0, 0.1); /* Adjust the hover background color */
        }
    </style>
    
    <div class="container text-center" style="margin-top: 30px;">
    <div class="row" style="gap: 50px;">
       <div class="col hover-container" style="background-color: rgba(14, 235, 6, 0.648);">
            <img src="images/customer.png" height="50px" width="50px" alt="">Number of Customers: <?php echo $totalCustomer; ?>
        </div>
        <div class="col hover-container" style="background-color: rgba(6, 27, 222, 0.717);">
            <img src="images/convenience.png" height="50px" width="50px" alt="">Number of Supplier: <?php echo $totalSuppliers; ?>
        </div>
        <div class="col hover-container" style="background-color: rgba(244, 0, 0, 0.717);">
            <img src="images/gas-cylinder.png" height="50px" width="50px" alt="">Number of Cylinders: <?php echo $totalCylinders; ?>
        </div>
    </div>
</div>

<div class="container text-center" style="margin-top: 30px;">
    <div class="row" style="gap: 50px;">
        <div class="col hover-container" style="background-color: rgba(215, 241, 18, 0.9);">
            <img src="images/calendar.png" height="50px" width="50px" alt="">Number of Orders: <?php echo $totalOrders; ?>
        </div>
        <div class="col hover-container" style="background-color: rgb(249, 7, 229);">
            <img src="images/admin.png" height="50px" width="50px" alt="">Number of Administrator: <?php echo  $totalAdmin; ?>
        </div>
        <div class="col hover-container" style="background-color: rgba(250, 136, 6, 0.963);">
            <a style="text-decoration:none;line-style:none;color:black" href="edit_admin.php?id=<?php echo $_SESSION['id'];?>"><img src="images/settings.png" height="50px" width="50px" alt="">Settings</a>
            </div>
    </div>
</div>


            </div>

        </div>
    </div>
</div>
 
<?php include('./layout/admin/footer.php') ?>