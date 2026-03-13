<?php

$conn = mysqli_connect( 'localhost', 'root', '', 'phpdatabase' );

if ( !$conn ) {
    die( 'Database not connected' );
}

$parentName = $_POST[ 'parentName' ];
$mobile     = $_POST[ 'mobileNumber' ];
$email      = $_POST[ 'emailAddress' ];
$class      = $_POST[ 'classSelect' ];
$message    = $_POST[ 'message' ];

$sql = "INSERT INTO admission_enquiry 
(parent_name, mobile, email, class, message) 
VALUES 
('$parentName', '$mobile', '$email', '$class', '$message')";

$check = mysqli_query( $conn, $sql );

if ( $check ) {
    echo "<script>alert('Form submitted successfully'); window.location='index.php';</script>";
} else {
    echo "<script>alert('Failed to submit form'); window.location='index.php';</script>";
}

?>