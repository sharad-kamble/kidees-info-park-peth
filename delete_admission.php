<?php
include 'db.php';

if ( !isset( $_GET[ 'id' ] ) || !is_numeric( $_GET[ 'id' ] ) ) {
    die( 'Invalid ID' );
}

$id = $_GET[ 'id' ];

$stmt = $conn->prepare( 'DELETE FROM admissions WHERE id = ?' );
$stmt->bind_param( 'i', $id );

if ( $stmt->execute() ) {
    echo "<script>alert('Record Deleted Successfully!'); window.location='view_admissions.php';</script>";
} else {
    echo 'Error deleting record.';
}

$stmt->close();
?>