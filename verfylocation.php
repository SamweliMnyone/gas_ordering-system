<?php
session_start();
include('dbcn.php');

// Check if the customer ID is set in the session
if (!isset($_SESSION['id'])) {
    echo "<script>
        alert('Customer not logged in');
        window.location.href = 'login.php';
    </script>";
    exit();
}

$customer_id = $_SESSION['id'];
$customer_name = $_SESSION['lastname'];
$customer_contact = $_SESSION['phonenumber'];



// Check if the location form is submitted
if (isset($_POST['location']) && isset($_POST['product_id'])) {
    $selection = $_POST['select'];
    $product_id = $_POST['product_id'];
    
    // Define locations that require additional delivery charges
    $locations_with_charges = ['Maekani', 'Sangasanga', 'Mlali', 'Vikenge'];
    
    if (in_array($selection, $locations_with_charges)) {
        echo "<script>
            alert('Sorry Customer, you need to pay delivery money. Your location is above 1 km. Please check the supplier contacts for more delivery process');
            window.location.href = 'customer_dashboard.php';
        </script>";
    } else {

        // Fetch supplier-specific details from the database
        $sql4 = "SELECT * FROM product";
        $result4 = mysqli_query($conn, $sql4);
        $fetch = mysqli_fetch_assoc($result4);

        $_SESSION['price'] = $fetch['price'];

        $price = $_SESSION['price'] ;

        // Insert order into the database
        $sql = "INSERT INTO `orders`(`customer_name`,`customer_contact`,`location`, `message`, `status`, `customer_id`) VALUES ('$customer_name','$customer_contact','$selection', 'Please contact me, I need cylinder!!', '$price', '$customer_id')";
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            // Delete the specific product from the 'product' table
            $sql2 = "DELETE FROM `product` LIMIT 1";
            $result2 = mysqli_query($conn, $sql2);
            
            if ($result2 && mysqli_affected_rows($conn) > 0) {
                echo "<script>
                    alert('Successfully requested');
                    window.location.href = 'customer_dashboard.php';
                </script>";
          } 
        } else {
            echo "<script>
                alert('Order insertion failed');
                window.location.href = 'customer_dashboard.php';
            </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <form action="verfylocation.php" method="POST">
        <div style="max-width: 600px; margin: 0 auto; padding: 50px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; margin-top:79px;">
            <img src="images/gaslogo.png" style="width: 290px; height: 220px; margin-left: 100px;" alt="">
            <div class="typing-animation">
                <p>Please dear Customer, make your choice where your location is</p>
                <select class="form-select" aria-label="Default select example" name="select">
                    <option selected>Please make your choice</option>
                    <option value="Changarawe">Changarawe</option>
                    <option value="Paradise">Paradise</option>
                    <option value="Maekani">Maekani</option>
                    <option value="Osterbay">Osterbay</option>
                    <option value="Vikenge">Vikenge</option>
                    <option value="Mlali">Mlali</option>
                    <option value="Sangasanga">Sangasanga</option>
                    <option value="Kipera">Kipera</option>
                    <option value="Geti Kubwa">Geti Kubwa</option>
                    <option value="Mahakamani">Mahakamani</option>
                </select>
                <!-- Hidden field to hold the product ID -->
                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">

                <button class="btn btn-danger" style="margin-top:10px" name="location">Next</button>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
