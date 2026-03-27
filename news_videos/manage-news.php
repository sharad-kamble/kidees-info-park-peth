<?php include 'db.php';
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Manage News</title>

    <!-- Bootstrap -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
</head>

<body>

    <div class='container mt-5'>

        <!-- Header -->
        <div class='d-flex justify-content-between align-items-center mb-4'>
            <h3>Manage News</h3>
            <a href='index.php' class='btn btn-secondary'>Back</a>
        </div>

        <table class='table table-bordered'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <!-- <th>Type</th> -->
                    <th>Image</th>
                    <th>Action</th>

                </tr>
            </thead>

            <tbody>

                <?php
$res = mysqli_query( $conn, 'SELECT * FROM news ORDER BY id DESC' );
$count = mysqli_num_rows( $res );

if ( $count > 0 ) {
    while( $row = mysqli_fetch_assoc( $res ) ) {
        ?>

                <tr>
                    <td><?php echo $row[ 'id' ];
        ?></td>
                    <td><?php echo $row[ 'title' ];
        ?></td>
                    <td><?php echo $row[ 'description' ];
        ?></td>
                    <!-- <td><?php echo $row[ 'type' ];
        ?></td> -->
                    <td>
                        <img src="uploads/<?php echo $row['image']; ?>" width='70'>
                    </td>
                    <td>
                        <a href="edit-news.php?id=<?php echo $row['id']; ?>" class='btn btn-warning btn-sm'>Edit</a>
                        <a href="delete-news.php?id=<?php echo $row['id']; ?>" class='btn btn-danger btn-sm'>Delete</a>
                    </td>
                </tr>

                <?php
    }
} else {
    echo "<tr><td colspan='5' class='text-center'>No data found</td></tr>";
}
?>

            </tbody>
        </table>

    </div>

</body>

</html>