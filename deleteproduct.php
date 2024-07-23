<?php

include('dbcn.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

// sql to delete a record
$sql = "DELETE FROM product WHERE id=$id";
$result = mysqli_query($conn , $sql);

if (!$result === TRUE) {
  echo "Error deleting record: " . $conn->error;
}else{
    header('location: supplier_dashboard.php');
}

$conn->close();

