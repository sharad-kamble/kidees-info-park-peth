<?php
include 'db.php';

$limit = 4;
$page = isset( $_POST[ 'page' ] ) ? $_POST[ 'page' ] : 1;
$start = ( $page - 1 ) * $limit;

$query = mysqli_query( $conn, "SELECT * FROM news ORDER BY id DESC LIMIT $start, $limit" );

while( $row = mysqli_fetch_assoc( $query ) ) {
    ?>

    <div class = 'col-md-6'>
    <div class = 'd-flex align-items-center bg-white p-3 rounded-4 shadow-sm'>

    <img src = "news_videos/uploads/<?php echo $row['image']; ?>" class = 'rounded-3 me-3' width = '100' height = '80'
    style = 'object-fit:cover;'>

    <div>
    <h6 class = 'fw-bold mb-1'><?php echo $row[ 'title' ];
    ?></h6>
    <p class = 'text-muted mb-1' style = 'font-size:14px;'>
    <?php echo $row[ 'description' ];
    ?>
    </p>

    <?php if ( !empty( $row[ 'video_link' ] ) ) {
        ?>
        <a href = '#' class = 'text-primary' data-bs-toggle = 'modal' data-bs-target = '#videoModal'
        data-video = "<?php echo $row['video_link']; ?>">
        ▶ Watch Video
        </a>
        <?php }
        ?>

        </div>

        </div>
        </div>

        <?php }
        ?>