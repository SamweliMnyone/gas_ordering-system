<?php
session_start();
include('dbcn.php');

if (!isset($_SESSION['id'])) {
    echo "<script>
        alert('Please login first');
        window.location.href = 'login.php';
    </script>";
    exit;
}

$supplier_id = $_SESSION['id']; // Store the supplier's ID

if (isset($_POST['submit'])) {
    $cylinder = secures($_POST['cylinder']);
    $name = secures($_POST['name']);
    $contact = secures($_POST['contact']);
    $location = secures($_POST['location']);
    $status = secures($_POST['status']);
    $price = secures($_POST['price']);

    $sql = "INSERT INTO `product` (cylinder, name, contact, location, status, price, supplier_id) VALUES
       ('$cylinder', '$name', '$contact', '$location', '$status', '$price', '$supplier_id')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>
            alert('Product Successfully added');
            window.location.href = 'supplier_dashboard.php';
        </script>";
    } else {
        die("Something went wrong: " . mysqli_error($conn));
    }
}

function secures($data) {
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    $data = trim($data);
    return $data;
}

?>

<!-- CSS BOOTSTRAP 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>www.onlinegas.com</title>

<!-- Image in a title -->
<link rel="icon" type="image/png" href="images/gaslogo.png" style="border-radius: 100px;">

<style>
    .sidebar:hover {
        color: rgb(108, 31, 234);
    }
</style>

<nav class="nav" style="padding: 0 10%; display: flex; justify-content: space-between; align-items: center; position: fixed; width: 100%; height: 100px; background-color: white; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
    <div style="display: flex;">
        <h1 style="color: rgba(0, 0, 0, 0.521); font-weight: 900; font-family: Segoe UI Black; font-size: 25px;">
            <img src="images/gaslogo.png" style="height: 100px; width: 110px;">Supplier Dashboard
        </h1>
    </div>
    <h6>Welcome <?php echo $_SESSION['firstname']; echo " "; echo $_SESSION['lastname']; ?></h6>
    <img src="images/avator.png" alt="" style="border-radius:20px;" width="50px" height="50px">
</nav>

<!-- JS BOOTSTRAP 5 LINK -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<div style="display: flex; gap: 15px; position: scroll;">
    <?php include('./layout/supplier/sidebar.php'); ?>
    <div style="height: 100vh; padding-top: 100px; position: scroll; flex: content;">
        <div style="margin-top: 20px;">
            <form class="form-horizontal" style="padding: 20px;" method="post" action="#">
                <div class="form-group">
                    <div class="row" style="margin-bottom: 20px;">
                        <label class="col-sm-3 control-label">Cylinder name</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="cylinder">
                                <option value="--SELECT--">--SELECT--</option>
                                <option value="ORYX GAS">ORYX GAS</option>
                                <option value="MANJIS GAS">MANJIS GAS</option>
                                <option value="LAKE GAS">LAKE GAS</option>
                                <option value="O-GAS">O-GAS</option>
                                <option value="TAIFA GAS">TAIFA GAS</option>
                                <option value="MIHAN">MIHAN</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row" style="margin-bottom: 20px;">
                        <label class="col-sm-3 control-label">Supplier name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name" autocomplete="off" required="">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row" style="margin-bottom: 20px;">
                        <label class="col-sm-3 control-label">Contact</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="contact" name="contact" autocomplete="off" required="">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row" style="margin-bottom: 20px;">
                        <label class="col-sm-3 control-label">Location</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="location" name="location" autocomplete="off" required="">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row" style="margin-bottom: 20px;">
                        <label class="col-sm-3 control-label">Status</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="status">
                                <option value="--SELECT--">--SELECT--</option>
                                <option value="Available">Available</option>
                                <option value="Unavailable">Unavailable</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row" style="margin-bottom: 20px;">
                        <label class="col-sm-3 control-label">Price</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="price" name="price" autocomplete="off" required="">
                        </div>
                    </div>
                </div>

                <button type="submit" name="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" style="background-color: red;">Add product</button>
            </form>
        </div>
    </div>
</div>

<?php include('./layout/supplier/footer.php'); ?>

