<?php
include 'db.php';

$limit = 4;
$page = isset( $_POST[ 'page' ] ) ? ( int )$_POST[ 'page' ] : 1;
$start = ( $page - 1 ) * $limit;

$query = mysqli_query( $conn, "SELECT * FROM testimonials ORDER BY id DESC LIMIT $start,$limit" );

while ( $row = mysqli_fetch_assoc( $query ) ) {

    // Check image exists
    $imagePath = 'uploads/' . $row[ 'image' ];

    if ( !file_exists( $imagePath ) || empty( $row[ 'image' ] ) ) {
        $imagePath = 'uploads/default.png';
        // fallback image
    }
    ?>

    <!-- ✅ Smaller card width -->
    <div class = 'col-6 col-md-4 col-lg-3'>
    <div class = 'bg-white p-3 rounded-4 shadow-sm text-center h-100'>

    <!-- ✅ Image -->
    <img src = "<?php echo $imagePath; ?>" class = 'rounded-circle mb-2'
    style = 'width:60px; height:60px; object-fit:cover;'>

    <!-- Name -->
    <h6 class = 'fw-bold mb-1'>
    <?php echo htmlspecialchars( $row[ 'name' ] );
    ?>
    </h6>

    <!-- Message -->
    <p class = 'text-muted mb-0' style = 'font-size:13px;'>
    "<?php echo htmlspecialchars($row['message']); ?>"
    </p>

    </div>
    </div>

    <?php }
    ?>