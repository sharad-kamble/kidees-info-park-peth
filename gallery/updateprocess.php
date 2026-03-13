<?php
$conn = mysqli_connect( 'localhost', 'root', '', 'phpdatabase' );

// Retrieve POST data and assign it to variables
$username = $_POST[ 'user' ];
$password = $_POST[ 'pass' ];
$name = $_POST[ 'name' ];
$id = $_POST[ 'id' ];
$email = $_POST[ 'email' ];
$sub = $_POST[ 'sub' ];
$company = $_POST[ 'company' ];
$phone = $_POST[ 'phone' ];
$message = $_POST[ 'message' ];
$gender = $_POST[ 'gender' ];

// Display the POST data ( for debugging purposes )
echo $username;
echo $password;
echo $id;
echo $email;
echo $sub;
echo $company;
echo $phone;
echo $gender;

// Update query
$sql = "UPDATE register SET username = '$username', password = '$password',name = '$name',email = '$email',sub='$sub',company = '$company',phone='$phone', message='$message', gender='$gender' WHERE id = '$id'";
mysqli_query( $conn, $sql );

mysqli_close( $conn );

header( 'location:viewdata.php' );
?>