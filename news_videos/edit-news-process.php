<?php
include 'db.php';

$id = $_POST[ 'id' ];
$title = $_POST[ 'title' ];
$desc = $_POST[ 'description' ];

// Image upload check
if ( !empty( $_FILES[ 'image' ][ 'name' ] ) ) {
    $img = $_FILES[ 'image' ][ 'name' ];
    move_uploaded_file( $_FILES[ 'image' ][ 'tmp_name' ], 'uploads/'.$img );

    $sql = "UPDATE news SET title='$title', description='$desc', image='$img' WHERE id='$id'";
} else {
    $sql = "UPDATE news SET title='$title', description='$desc' WHERE id='$id'";
}

// Run query
$result = mysqli_query( $conn, $sql );

// Debug ( VERY IMPORTANT )
if ( !$result ) {
    die( 'Error: ' . mysqli_error( $conn ) );
}

// Redirect
header( 'Location: manage-news.php' );
exit;
?>