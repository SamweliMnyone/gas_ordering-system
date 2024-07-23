<?php

include('dbcn.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

// sql to delete a record
$sql = "DELETE FROM register WHERE id=$id";
$result = mysqli_query($conn , $sql);

if (!$result === TRUE) {
  echo "Error deleting record: " . $conn->error;
}else{
    header('location: admin_manage_supplier.php');
}

$conn->close();

