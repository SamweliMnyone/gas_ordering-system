<?php

$conn = mysqli_connect('localhost','root','','gas_odering_system');

if(!$conn){
    die(mysqli_error($conn));
}