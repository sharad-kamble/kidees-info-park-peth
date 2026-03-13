<?php
$conn = mysqli_connect( 'localhost', 'root', '', 'phpdatabase' );
$id = $_REQUEST[ 'id' ];
$sql = "DELETE FROM register WHERE id = '$id'";
mysqli_query( $conn, $sql );
$check = mysqli_query( $conn, $sql );

if ( $check ) {

    ?>
<script type='text/javascript'>
alert('Data Deleted Successfully!');
window.location = 'viewdata.php';
</script>
<?php

}

?>