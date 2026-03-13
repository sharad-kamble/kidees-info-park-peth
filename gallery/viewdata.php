<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Table</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <!-- Heading with button -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-center">CRUD Operation</h2>
            <a href="index.php" class="btn btn-secondary">Back to Home</a>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Company</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn = mysqli_connect('localhost', 'root', '', 'phpdatabase');

                $sql = 'SELECT * FROM register';
                $check = mysqli_query($conn, $sql);
                $rowcount = mysqli_num_rows($check);
                if ($rowcount > 0) {
                    while ($data = mysqli_fetch_assoc($check)) {
                ?>
                <tr>
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['username']; ?></td>
                    <td><?php echo $data['password']; ?></td>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['sub']; ?></td>
                    <td><?php echo $data['company']; ?></td>
                    <td><?php echo $data['phone']; ?></td>
                    <td><?php echo $data['message']; ?></td>
                    <td>
                        <a class="btn btn-warning btn-sm"
                            href="updatedata.php?id=<?php echo $data['id']; ?>&user=<?php echo $data['username']; ?>&pass=<?php echo $data['password']; ?>&name=<?php echo $data['name']; ?>&email=<?php echo $data['email']; ?>&sub=<?php echo $data['sub']; ?>&company=<?php echo $data['company']; ?>&phone=<?php echo $data['phone']; ?>&message=<?php echo $data['message']; ?>">
                            Update
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm" href="deletedata.php?id=<?php echo $data['id']; ?>">Delete</a>
                    </td>
                </tr>
                <?php
                    }
                } else {
                    echo '<tr><td colspan="11" class="text-center">No data found</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS CDN (Optional for interactive components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>