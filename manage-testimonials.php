<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Testimonials</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
    body {
        background-color: #f5f7fb;
    }

    .testimonial-img {
        transition: 0.3s;
    }

    .testimonial-img:hover {
        transform: scale(1.1);
    }

    .card {
        border-radius: 15px;
    }

    /* 🔥 MOBILE RESPONSIVE FIX */
    @media (max-width: 768px) {

        .table thead {
            display: none;
        }

        .table tbody tr {
            display: block;
            background: #fff;
            margin-bottom: 15px;
            border-radius: 12px;
            padding: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .table tbody td {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border: none;
            border-bottom: 1px solid #eee;
            font-size: 14px;
        }

        .table tbody td:last-child {
            border-bottom: none;
        }

        .table tbody td::before {
            content: attr(data-label);
            font-weight: 600;
            color: #6c757d;
        }

        .table tbody td img {
            width: 45px !important;
            height: 45px !important;
        }

        /* Button full width */
        .action-btn {
            width: 100%;
            text-align: center;
        }

        /* Header responsive */
        .header-flex {
            flex-direction: column !important;
            align-items: flex-start !important;
            gap: 10px;
        }
    }
    </style>
</head>

<body>

    <?php include 'db.php'; ?>

    <div class="container py-4 py-md-5">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4 header-flex">
            <h4 class="fw-bold mb-0 text-primary">
                <i class="bi bi-chat-square-quote me-2"></i> Manage Testimonials
            </h4>

            <span class="badge bg-dark px-3 py-2 fs-6">
                Total:
                <?php
            $count = mysqli_query($conn, "SELECT COUNT(*) as total FROM testimonials");
            $c = mysqli_fetch_assoc($count);
            echo $c['total'];
            ?>
            </span>
        </div>

        <!-- Card -->
        <div class="card shadow-lg border-0">
            <div class="card-body p-0">

                <div class="table-responsive">
                    <table class="table align-middle mb-0">

                        <!-- Head -->
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">#</th>
                                <th>Parent</th>
                                <th>Message</th>
                                <th>Photo</th>
                                <th class="text-center pe-4">Action</th>
                            </tr>
                        </thead>

                        <!-- Body -->
                        <tbody>

                            <?php
                    $res = mysqli_query($conn, "SELECT * FROM testimonials ORDER BY id DESC");

                    if (mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                    ?>

                            <tr>

                                <td data-label="ID">
                                    #<?php echo $row['id']; ?>
                                </td>

                                <td data-label="Parent">
                                    <?php echo htmlspecialchars($row['name']); ?>
                                </td>

                                <td data-label="Message">
                                    <?php echo htmlspecialchars(substr($row['message'], 0, 80)); ?>...
                                </td>

                                <td data-label="Photo">
                                    <img src="uploads/<?php echo $row['image']; ?>"
                                        class="rounded-circle border shadow-sm testimonial-img"
                                        style="width:55px; height:55px; object-fit:cover;">
                                </td>

                                <td data-label="Action">
                                    <a href="delete-testimonial.php?id=<?php echo $row['id']; ?>"
                                        class="btn btn-danger btn-sm action-btn"
                                        onclick="return confirm('Delete this testimonial?')">
                                        <i class="bi bi-trash"></i> Delete
                                    </a>
                                </td>

                            </tr>

                            <?php } } else { ?>

                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                    No testimonials found
                                </td>
                            </tr>

                            <?php } ?>

                        </tbody>

                    </table>
                </div>

            </div>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>