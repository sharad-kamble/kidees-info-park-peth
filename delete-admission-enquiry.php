<?php
$conn = mysqli_connect( 'localhost', 'root', '', 'phpdatabase' );

if ( !$conn ) {
    die( 'Database not connected' );
}

$id = $_REQUEST[ 'id' ];

$sql = "DELETE FROM register WHERE id='$id'";
$check = mysqli_query( $conn, $sql );

if ( $check ) {
    ?>
<script type='text/javascript'>
alert('Data Deleted Successfully!');
window.location = 'view-admission-enquiry.php';
</script>
<?php
} else {
    ?>
<script type='text/javascript'>
alert('Failed to Delete Data!');
window.location = 'viewdata.php';
</script>
<?php
}
?>