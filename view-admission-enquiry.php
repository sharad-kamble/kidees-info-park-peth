<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admission Enquiry Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Admission Enquiry List</h2>
            <a href="index.html" class="btn btn-secondary">Back to Home</a>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Parent Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Class</th>
                    <th>Message</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

                <?php
        $conn = mysqli_connect('localhost', 'root', '', 'phpdatabase');

        if (!$conn) {
            die('Database not connected');
        }

        $sql = "SELECT * FROM admission_enquiry";
        $check = mysqli_query($conn, $sql);

        if (mysqli_num_rows($check) > 0) {
            while ($data = mysqli_fetch_assoc($check)) {
        ?>

                <tr>
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['parent_name']; ?></td>
                    <td><?php echo $data['mobile']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['class']; ?></td>
                    <td><?php echo $data['message']; ?></td>

                    <td>
                        <a class="btn btn-warning btn-sm"
                            href="./update-admission-enquiry.php?id=<?php echo $data['id']; ?>">
                            Update
                        </a>
                    </td>

                    <td>
                        <a class="btn btn-danger btn-sm"
                            href="delete-admission-enquiry.php?id=<?php echo $data['id']; ?>"
                            onclick="return confirm('Are you sure you want to delete this enquiry?');">
                            Delete
                        </a>
                    </td>
                </tr>

                <?php
            }
        } else {
            echo '<tr><td colspan="8" class="text-center">No Enquiries Found</td></tr>';
        }
        ?>

            </tbody>
        </table>

    </div>
</body>

</html>