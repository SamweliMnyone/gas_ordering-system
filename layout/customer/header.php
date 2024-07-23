<?php
require('dbcn.php');
session_start();

//Command that restrict if you have not select any choice then you can not see any dashboard!!!!
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

?>

<!-- CSS BOOTSRAP 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>www.onlinegas.com</title>
   
    <!-- Image in a title -->
    <link rel="icon" type="image/png" href="images/gaslogo.png" style="border-radius: 100px;" >

<style>
        .sidebar:hover{
            color: rgb(108, 31, 234);
        }
    </style>       


    <nav class="nav" style="padding: 0 10%; display: flex;justify-content: space-between;align-items: center;position: fixed;width: 100%;height: 100px;background-color: white ;box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
        <div style="display: flex;">
            
            <h1 style="color: rgba(0, 0, 0, 0.521);font-weight: 900;font-family: Segoe UI Black;font-size: 25px;"><img src="images/gaslogo.png" style="height: 100px;width: 110px;">Customer Dashboard</h1>
        </div>

          <h6>Welcome <?php echo $_SESSION['firstname']; echo " "; echo $_SESSION['lastname'];?></h6> 
        <img src="images\avator.png" alt="" style="border-radius:20px;" width="50px" height="50px">  
   
    </nav> 

<!-- JS BOOTSRAP 5 LINK -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
