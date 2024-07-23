<?php include('./layout/supplier/header.php'); ?>

<?php 
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
    $password = md5($_POST['password']); // Use md5 for secure password hashing

    $errors = array();

    // Validate empty fields
    if (empty($firstname) || empty($lastname) || empty($email) || empty($address) || empty($phonenumber) || empty($password)) {
        array_push($errors, "All fields are required.");
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid.");
    }

    // Validate password length
    if (strlen($_POST['password']) < 8) {
        array_push($errors, "Password must contain more than 8 characters.");
    }

    // Validate if email already exists
    $sql2 = "SELECT `email` FROM `register` WHERE `email` = '$email' AND `id` != '$id'";
    $result2 = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result2) > 0) {
        array_push($errors, "Email already exists.");
    }

    // Count if there are any errors then display them
    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    } else {
        $sql = "UPDATE `register` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`address`='$address',`phonenumber`='$phonenumber',`password`='$password' WHERE `id`='$id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>
                alert('Successfully updated.');
                window.location.href = 'supplier_dashboard.php';
            </script>";
            exit();
        } else {
            die("Something went wrong.");
        }
    }
}
?>

<div style=" display:flex;gap: 205px; position: scroll;">
    <?php include('./layout/supplier/sidebar.php') ?>
    <div style="width: 50%; padding-top: 80px;">
        <div style="margin-top: 60px;margin-left:70px">
            <form class="form-horizontal" style="padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 8px; background-color: white;" method="POST">
                <h3 style="margin-bottom:30px">Edit Supplier info</h3>
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
                <div class="form-group">
                    <div class="row" style="margin-bottom: 20px;">
                        <label class="col-sm-3 control-label">Change Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password" autocomplete="off">
                        </div>
                    </div>
                </div>
                <button type="submit" name="update" value="update" class="btn btn-primary btn-flat m-b-30 m-t-30" style="background-color: red;">Update</button>
            </form>
        </div>
    </div>
</div>

<?php include('./layout/supplier/footer.php'); ?>