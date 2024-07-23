<?php include('./layout/admin/header.php'); 


if(isset($_POST['submit'])){
    $firstname = secures($_POST['firstname']);
    $lastname =  secures($_POST['lastname']);
    $email = secures($_POST['email']);
    $address = secures($_POST['address']);
    $phonenumber = secures($_POST['phonenumber']);
    $choice = secures($_POST['choice']);
    $password = secures(md5($_POST['password']));

    
    
      $sql = "INSERT INTO `register`(`firstname`, `lastname`, `email`, `address`, `phonenumber`, `choice`, `password`) VALUES ('$firstname','$lastname','$email','$address','$phonenumber','Admin','$password') ";

      $result = mysqli_query($conn, $sql);

      if($result){
            echo "<script>
                alert('Registered Successfully');
                window.location.href = 'admin_dashboard.php';
            </script>";
      }else{
            echo "<script>
                alert('Invalid Inputs, Please try again');
                window.location.href = 'admin_add_customer.php';
            </script>";
      }
  }

    function secures($data){
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        $data = trim($data);
        return $data;
    }
?>

<div style="display: flex; gap: 15px; position: scroll;">
    <?php include('./layout/admin/sidebar.php'); ?>

<div style="height: 100vh; width: 100%; padding-top: 20px; flex: content; display: flex; justify-content: center; align-items: center;margin-top:180px">
        <div style="width: 40%; background-color: #fff; padding: 20px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1); border-radius: 10px;">
            <form method="POST" style="padding-top: 20px;">
                <h3 style="text-align:center;">Register Administrator</h3>
                <div class="mb-3">
                    <label for="firstname" class="form-label">First Name</label> 
                    <input type="text" name="firstname" class="form-control" placeholder="Enter your First Name">
                </div>

                <div class="mb-3">
                    <label for="lastname" class="form-label">Last Name</label> 
                    <input type="text" name="lastname" class="form-control" placeholder="Enter your Last name">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label> 
                    <input type="email" name="email" class="form-control" placeholder="Email eg, group1@gmail.com">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Address</label> 
                    <input type="text" name="address" class="form-control" placeholder="Address">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Phone Number</label> 
                    <input type="number" name="phonenumber" class="form-control" id="exampleInputPassword1" placeholder="Enter phone Number">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label> 
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" autocomplete="off">
                </div>

                <button name="submit" type="submit" class="btn btn-danger">Register</button>
            </form>
        </div>
    </div>
</div>

<?php include('./layout/admin/footer.php'); ?>

