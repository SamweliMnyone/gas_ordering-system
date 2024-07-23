<?php
session_start();
include('dbcn.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Hash the password using md5

    $sql = "SELECT * FROM register WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Store all information in Sessions
        $_SESSION['id'] = $row['id'];
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['address'] = $row['address'];
        $_SESSION['phonenumber'] = $row['phonenumber'];
        $_SESSION['choice'] = $row['choice'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['email'] = $row['email'];

        // Redirect based on user choice
        switch ($_SESSION['choice']) {
            case 'Customer':
                echo "<script>
                    alert('Hello, you have successfully logged in.');
                    window.location.href = 'customer_dashboard.php';
                </script>";
                break;
            case 'Admin':
                echo "<script>
                    alert('Hello, you have successfully logged in.');
                    window.location.href = 'admin_dashboard.php';
                </script>";
                break;
            case 'Supplier':
                echo "<script>
                    alert('Hello, you have successfully logged in.');
                    window.location.href = 'supplier_dashboard.php';
                </script>";
                break;
        }
    } else {
        echo "<script>
                alert('Invalid Inputs');
                window.location.href = 'login.php';
            </script>";
    }
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
    <link href="css/login.css" rel="stylesheet">

    <!-- Bootstrap "CSS" Link -->
    <link href="bootsatrap\css\bootstrap.min.css" rel="stylesheet" class="title_image">
</head>
<body>
    <nav>
        <div class="logo">
            <img src="images/gaslogo.png" alt="Logo" class="logoimg">
            <h1 style="color: rgba(0, 0, 0, 0.521);font-weight: 900;font-family: Segoe UI Black;">Login</h1>
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
        <div>
        <!-- <img src="images/gaslogo.png" alt="" style="width: 400px;height: 180px;"> -->

  
        <form style="padding-top:200px ;width: 300px;" method="post" action="#">
           
        <div class="mb-3">
                <!-- <label for="exampleInputEmail1" class="form-label">Email address</label> -->
                <input type="email" name="email" class="form-control"  style="border-radius: 100px; background-color: rgba(228, 236, 236, 0.607);height: 25px;font-size:12px" placeholder="Enter Email">
              </div>
  


              <div class="mb-3">
                <!-- <label for="exampleInputPassword1" class="form-label">Password</label> -->
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" style="border-radius: 100px; background-color: rgba(228, 236, 236, 0.607);height: 25px;font-size:12px" placeholder="Password" autocomplete="off">
              </div>

            <button type="submit" name="login" class="btn btn-primary" style="border-radius: 100px; background-color: red;width: 300px;height: 35px;font-size:12px;font-weight: bold;">Login</button>

            <p style="font-size:13px;text-align: center;margin-top: 10px;color: rgba(0, 0, 0, 0.541);">If you dont have account <a href="register.php" style="text-decoration: none;">Register</a></p>

          </form>
          </div>

          <div>

            <img src="images/MANJIS23.png" alt="" style="margin-top: 200px;margin-left: 580px;">
          </div>
    </div>
    <footer style="background:linear-gradient(to top, rgb(255, 49, 3), rgb(255, 255, 255));    width: 100%;padding: 20px 0;text-align: center;position: fixed;bottom: 0; left: 0;">
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
