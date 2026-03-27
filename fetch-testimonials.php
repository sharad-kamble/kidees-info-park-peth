<?php
include 'db.php';

$limit = 4;
$page = isset( $_POST[ 'page' ] ) ? $_POST[ 'page' ] : 1;
$start = ( $page - 1 ) * $limit;

$query = mysqli_query( $conn, "SELECT * FROM testimonials ORDER BY id DESC LIMIT $start,$limit" );

while( $row = mysqli_fetch_assoc( $query ) ) {
    ?>

    <div class = 'col-md-6'>
    <div class = 'bg-white p-4 rounded-4 shadow-sm text-center'>

    <img src = "uploads/<?php echo $row['image']; ?>" class = 'rounded-circle mb-3' width = '80' height = '80'
    style = 'object-fit:cover;'>

    <h6 class = 'fw-bold'><?php echo $row[ 'name' ];
    ?></h6>

    <p class = 'text-muted' style = 'font-size:14px;'>
    "<?php echo $row['message']; ?>"
    </p>

    </div>
    </div>

    <?php }
    ?>