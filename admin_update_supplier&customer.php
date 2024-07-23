<?php 
include('./layout/admin/header.php'); 
include('dbcn.php'); // Ensure this includes your database connection

function secures($data){
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    $data = trim($data);
    return $data;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM `register` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "Failed to fetch user data.";
    } else {
        $supplier = mysqli_fetch_array($result);
    }
}

if (isset($_POST['update'])) {
    $firstname = secures($_POST['firstname']);
    $lastname = secures($_POST['lastname']);
    $email = secures($_POST['email']);
    $address = secures($_POST['address']);
    $phonenumber = secures($_POST['phonenumber']);
    
    $errors = array();

    // Validate empty fields
    if (empty($firstname) || empty($lastname) || empty($email) || empty($address) || empty($phonenumber)) {
        array_push($errors, "All fields are required.");
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid.");
    }

    // Count if there are any errors then display them
    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    } else {
        $sql = "UPDATE `register` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`address`='$address',`phonenumber`='$phonenumber' WHERE `id`=$id";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>
                alert('Successfully updated.');
                window.location.href = 'admin_manage_supplier.php';
            </script>";
            exit();
        } else {
            die("Something went wrong.");
        }
    }
}
?>

<div style="display: flex; gap: 15px; position: scroll;">
    <?php include('./layout/admin/sidebar.php') ?>
    <div style="height: 100vh; width: 86%; padding-top: 80px; flex: content; position: scroll;">
        <div style="margin-top: 20px;">
            <form class="form-horizontal" style="padding: 20px;" method="POST">
                <div class="form-group">
                    <div class="row" style="margin-bottom: 20px;">
                        <label class="col-sm-3 control-label">First Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="firstname" autocomplete="off" value="<?php echo htmlspecialchars($supplier['firstname']); ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row" style="margin-bottom: 20px;">
                        <label class="col-sm-3 control-label">Last Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="lastname" autocomplete="off" value="<?php echo htmlspecialchars($supplier['lastname']); ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row" style="margin-bottom: 20px;">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" autocomplete="off" value="<?php echo htmlspecialchars($supplier['email']); ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row" style="margin-bottom: 20px;">
                        <label class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="address" autocomplete="off" value="<?php echo htmlspecialchars($supplier['address']); ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row" style="margin-bottom: 20px;">
                        <label class="col-sm-3 control-label">Phone Number</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="phonenumber" autocomplete="off" value="<?php echo htmlspecialchars($supplier['phonenumber']); ?>">
                        </div>
                    </div>
                </div>
             
                <button type="submit" name="update" value="update" class="btn btn-primary btn-flat m-b-30 m-t-30" style="background-color: red;">Update</button>
            </form>
        </div>
    </div>
</div>

<?php include('./layout/admin/footer.php') ?>
