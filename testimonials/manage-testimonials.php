<?php include 'db.php'; ?>

<div class="container mt-5">

    <h3>Manage Testimonials</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Message</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            <?php
$res = mysqli_query($conn, "SELECT * FROM testimonials ORDER BY id DESC");

while($row = mysqli_fetch_assoc($res)){
?>

            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['message']; ?></td>
                <td><img src="uploads/<?php echo $row['image']; ?>" width="60"></td>
                <td>
                    <a href="delete-testimonial.php?id=<?php echo $row['id']; ?>"
                        class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>

            <?php } ?>

        </tbody>
    </table>

</div>