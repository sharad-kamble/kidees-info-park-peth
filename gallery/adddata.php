<!-- <?php
$conn = mysqli_connect( 'localhost', 'root', '', 'phpdatabase' );
 {
    if ( $conn ) {
        echo 'database connected sucessfully';
    } else {
        echo 'Database not connected';
    }
}
?> -->




<?php

$conn = mysqli_connect( 'localhost', 'root', '', 'phpdatabase' );
$user = $_GET[ 'user' ];
$pass = $_GET[ 'pass' ];
$name = $_GET[ 'name' ];
$email = $_GET[ 'email' ];
$sub = $_GET[ 'sub' ];
$company = $_GET[ 'company' ];
$phone = $_GET[ 'phone' ];
$message = $_GET[ 'message' ];


$sql = "insert into register (username,password,name,email,sub,company,phone,message) values('$user','$pass','$name','$email','$sub','$company','$phone','$message')";
$check = mysqli_query($conn,$sql);{
    if($check)
    echo "Data Inserted SUccessfully";
}
header('location:index.php');

















?>