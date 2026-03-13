<?php
$conn = mysqli_connect( 'localhost', 'root', '', 'phpdatabase' );

if ( !$conn ) {
    die( 'Database not connected' );
}

$id         = $_POST[ 'id' ];
$parentName = $_POST[ 'parent_name' ];
$mobile     = $_POST[ 'mobile' ];
$email      = $_POST[ 'email' ];
$class      = $_POST[ 'class' ];
$message    = $_POST[ 'message' ];

$sql = "UPDATE admission_enquiry SET 
        parent_name='$parentName',
        mobile='$mobile',
        email='$email',
        class='$class',
        message='$message'
        WHERE id='$id'";

$check = mysqli_query( $conn, $sql );

if ( $check ) {
    echo "<script>alert('Enquiry Updated Successfully'); window.location='view-admission-enquiry.php';</script>";
} else {
    echo "<script>alert('Failed to Update Enquiry'); window.location='view-admission-inquiry';</script>";
}
?>