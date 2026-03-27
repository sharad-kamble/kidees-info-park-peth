<?php
include 'db.php';

$id = $_GET[ 'id' ];

mysqli_query( $conn, "DELETE FROM testimonials WHERE id=$id" );

header( 'Location: manage-testimonials.php' );
?>