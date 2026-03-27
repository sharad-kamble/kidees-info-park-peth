<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Admissions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    th,
    td {
        white-space: nowrap;
        vertical-align: middle;
        font-size: 14px;
    }
    </style>
</head>

<body class="bg-light">

    <?php include 'navbar.php'; ?>

    <div class="container-fluid px-4">
        <div class="card shadow border-0 rounded-4">
            <div class="card-body p-4">
                <h3 class="fw-bold mb-4">All Admission Records</h3>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th>ID</th>
                                <th>Student Name</th>
                                <th>Gender</th>
                                <th>DOB</th>
                                <th>Class Applying</th>

                                <th>Nationality</th>
                                <th>Religion</th>
                                <th>Mother Tongue</th>
                                <th>Blood Group</th>
                                <th>Caste</th>
                                <th>Sub Caste</th>
                                <th>Category</th>
                                <th>Place of Birth</th>
                                <th>Aadhaar</th>

                                <th>Last School</th>
                                <th>Last Exam</th>
                                <th>Year</th>
                                <th>Age</th>
                                <th>Admission Class</th>
                                <th>Admission Date</th>

                                <th>Father Name</th>
                                <th>Father Mobile</th>
                                <th>Father Occupation</th>
                                <th>Father Income</th>
                                <th>Father PAN</th>
                                <th>Father Aadhaar</th>

                                <th>Mother Name</th>
                                <th>Mother Mobile</th>
                                <th>Mother Occupation</th>
                                <th>Mother Income</th>
                                <th>Mother PAN</th>
                                <th>Mother Aadhaar</th>

                                <th>Local Address</th>
                                <th>Permanent Address</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = $conn->query("SELECT * FROM admissions ORDER BY id DESC");
                            while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?= $row['id']; ?></td>
                                <td><?= htmlspecialchars($row['student_name']); ?></td>
                                <td><?= htmlspecialchars($row['gender']); ?></td>
                                <td><?= htmlspecialchars($row['dob']); ?></td>
                                <td><?= htmlspecialchars($row['class_applying']); ?></td>

                                <td><?= htmlspecialchars($row['nationality']); ?></td>
                                <td><?= htmlspecialchars($row['religion']); ?></td>
                                <td><?= htmlspecialchars($row['mother_tongue']); ?></td>
                                <td><?= htmlspecialchars($row['blood_group']); ?></td>
                                <td><?= htmlspecialchars($row['caste']); ?></td>
                                <td><?= htmlspecialchars($row['sub_caste']); ?></td>
                                <td><?= htmlspecialchars($row['category']); ?></td>
                                <td><?= htmlspecialchars($row['place_of_birth']); ?></td>
                                <td><?= htmlspecialchars($row['aadhar']); ?></td>

                                <td><?= htmlspecialchars($row['last_school']); ?></td>
                                <td><?= htmlspecialchars($row['last_exam']); ?></td>
                                <td><?= htmlspecialchars($row['year']); ?></td>
                                <td><?= htmlspecialchars($row['age']); ?></td>
                                <td><?= htmlspecialchars($row['admission_class']); ?></td>
                                <td><?= htmlspecialchars($row['admission_date']); ?></td>

                                <td><?= htmlspecialchars($row['father_name']); ?></td>
                                <td><?= htmlspecialchars($row['father_mobile']); ?></td>
                                <td><?= htmlspecialchars($row['father_occupation']); ?></td>
                                <td><?= htmlspecialchars($row['father_income']); ?></td>
                                <td><?= htmlspecialchars($row['father_pan']); ?></td>
                                <td><?= htmlspecialchars($row['father_aadhar']); ?></td>

                                <td><?= htmlspecialchars($row['mother_name']); ?></td>
                                <td><?= htmlspecialchars($row['mother_mobile']); ?></td>
                                <td><?= htmlspecialchars($row['mother_occupation']); ?></td>
                                <td><?= htmlspecialchars($row['mother_income']); ?></td>
                                <td><?= htmlspecialchars($row['mother_pan']); ?></td>
                                <td><?= htmlspecialchars($row['mother_aadhar']); ?></td>

                                <td><?= htmlspecialchars($row['local_address']); ?></td>
                                <td><?= htmlspecialchars($row['permanent_address']); ?></td>
                                <td><?= htmlspecialchars($row['created_at']); ?></td>

                                <td>
                                    <a href="edit_admission.php?id=<?= $row['id']; ?>"
                                        class="btn btn-sm btn-warning mb-1">Edit</a>
                                    <a href="delete_admission.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this record?')">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</body>

</html>