<?php
include 'db.php';

$name = $_POST[ 'name' ];
$message = $_POST[ 'message' ];

$image = $_FILES[ 'image' ][ 'name' ];
$tmp = $_FILES[ 'image' ][ 'tmp_name' ];

$path = 'uploads/' . time() . '_' . $image;
move_uploaded_file( $tmp, $path );

mysqli_query( $conn, "INSERT INTO testimonials(name,message,image) 
VALUES('$name','$message','$path')" );

header( 'Location: admin.php' );
?>