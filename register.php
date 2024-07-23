<?php
include("dbcn.php");

if(isset($_POST['submit'])){
    $firstname = secures($_POST['firstname']);
    $lastname =  secures($_POST['lastname']);
    $email = secures($_POST['email']);
    $address = secures($_POST['address']);
    $phonenumber = secures($_POST['phonenumber']);
    $choice = secures($_POST['choice']);
    $password = secures(md5($_POST['password']));

    
    
      $sql = "INSERT INTO `register`(`firstname`, `lastname`, `email`, `address`, `phonenumber`, `choice`, `password`) VALUES ('$firstname','$lastname','$email','$address','$phonenumber','$choice','$password')";

      $result = mysqli_query($conn, $sql);

      if($result){
            echo "<script>
                alert('Registered Successfully');
                window.location.href = 'login.php';
            </script>";
      }else{
            echo "<script>
                alert('Invalid Inputs, Please try again');
                window.location.href = 'register.php';
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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>www.onlinegas.com</title>

    <!-- Image in a title -->
    <link rel="icon" type="image/png" href="images/gaslogo.png" style="border-radius: 100px;" >

    <!-- CSS link -->
    <link href="css/register.css" rel="stylesheet">

    <!-- Bootstrap "CSS" Link -->
    <link href="bootsatrap\css\bootstrap.min.css" rel="stylesheet" class="title_image">
</head>
<body>
    <nav>
        <div class="logo">
            <img src="images/gaslogo.png" style="height: 100px; width: 140px;margin-top: 10px;" alt="Logo" class="logoimg">
            <h1 style="color: rgba(0, 0, 0, 0.521);font-weight: 900;font-family: Segoe UI Black;">Register</h1>
        </div>

        
        <div class="menu"> 
            <ul class="navigation">
                <li><a href="home.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            </ul>
        </div>
    </nav>

    <div class="formcontainer">
        <form method="POST" style="padding-top:130px ;width: 300px;">

            <div class="mb-3">
              <!-- <label for="firstname" class="form-label">First Name</label> -->
              <input type="text" name="firstname" class="form-control" style="border-radius: 100px; background-color: rgba(228, 236, 236, 0.607);height: 25px;font-size:12px" placeholder="Enter your First Name">
            </div>

            <div class="mb-3">
                <!-- <label for="lastname" class="form-label">Last Name</label> -->
                <input type="text" name="lastname" class="form-control"  style="border-radius: 100px; background-color: rgba(228, 236, 236, 0.607);height: 25px;font-size:12px" placeholder="Enter your Last name">
              </div>

            <div class="mb-3">
                <!-- <label for="exampleInputEmail1" class="form-label">Email address</label> -->
                <input type="email" name="email" class="form-control"  style="border-radius: 100px; background-color: rgba(228, 236, 236, 0.607);height: 25px;font-size:12px" placeholder="Email eg, group1@gmail.com">
              </div>

              <div class="mb-3">
                <!-- <label for="exampleInputEmail1" class="form-label">Email address</label> -->
                <input type="text" name="address" class="form-control"  style="border-radius: 100px; background-color: rgba(228, 236, 236, 0.607);height: 25px;font-size:12px" placeholder="Adress">
              </div>

              <div class="mb-3">
                <!-- <label for="exampleInputPassword1" class="form-label">Phone Number</label> -->
                <input type="number" name="phonenumber" class="form-control" id="exampleInputPassword1" style="border-radius: 100px; background-color: rgba(228, 236, 236, 0.607);height: 25px;font-size:12px" placeholder="Enter phone Number">
              </div>

              
              <div class="mb-3">
                <select  name="choice" class="form-select" aria-label="Default select example" style="border-radius: 100px; background-color: rgba(228, 236, 236, 0.607);height: 25px;font-size:10px">
                  <option value="Users">--ENTER--</option>
                  <option value="Customer">Customer</option>
                  <option value="Supplier">Supplier</option>
                </select>
              </div>

  
              <div class="mb-3">
                <!-- <label for="exampleInputPassword1" class="form-label">Password</label> -->
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" style="border-radius: 100px; background-color: rgba(228, 236, 236, 0.607);height: 25px;font-size:12px" placeholder="Password" autocomplete="off">
              </div>

            <button name="submit" type="submit" class="btn btn-primary" style="border-radius: 100px; background-color: red;width: 300px;height: 30px;font-size:12px;font-weight: bold;">Register</button>

            <p style="font-size:13px;text-align: center;margin-top: 5px;color: rgba(0, 0, 0, 0.521);">If you have account <a href="login.php" style="text-decoration: none;">login</a></p>

          </form>

          <div>

            <img src="images/ORYX4FT.png" alt="" style="margin-top:-250px;margin-left: 780px;">
          </div>
    </div>
    <footer style="background:linear-gradient(to top, rgb(255, 49, 3), rgba(255, 255, 255, 0.338)); width: 100%;padding: 20px 0;text-align: center;position: fixed;bottom: 0; left: 0;">
        <div class="social-media" style="text-align: center;gap: 50px;">
            <a href="https://www.facebook.com/BlyTz" target="_blank" class="social-icon"><img src="images/png/facebook.png" style="width: 20px;height: 20px;" alt="Facebook"></a>
            <a href="https://www.twitter.com" target="_blank" class="social-icon"><img src="images/png/twitter.png" style="width: 20px;height: 20px;" alt="Twitter"></a>
            <a href="https://www.instagram.com/samweli_mnyone" target="_blank" class="social-icon"><img src="images/png/instagram.png" style="width: 20px;height: 20px;" alt="Instagram"></a>
            <a href="https://www.linkedin.com/SamweliMnyone" target="_blank" class="social-icon"><img src="images/png/linkedin.png" style="width: 20px;height: 20px;" alt="LinkedIn"></a>
        </div>
        <i><p style="text-align: center;font-size:10px;font-weight: bold;">&copy; 2024 Group1. All rights reserved.</p></i>
    </footer>
    <!-- Bootstrap Link for js -->
    <script src="bootsatrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>