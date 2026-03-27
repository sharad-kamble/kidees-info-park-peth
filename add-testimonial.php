<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Testimonial</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
        background: #f5f7fb;
    }

    .card {
        border-radius: 15px;
    }

    .preview-img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 50%;
        display: none;
        margin-top: 10px;
    }

    @media (max-width: 576px) {
        .card {
            padding: 15px !important;
        }
    }
    </style>
</head>

<body>

    <?php include 'db.php'; ?>

    <div class="container py-4 py-md-5">

        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">

                <div class="card shadow-lg border-0 p-4">

                    <h4 class="mb-4 text-primary fw-bold text-center">
                        Add Testimonial
                    </h4>

                    <form method="POST" enctype="multipart/form-data">

                        <!-- Name -->
                        <div class="mb-3">
                            <label class="form-label">Parent Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter parent name"
                                required>
                        </div>

                        <!-- Message -->
                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea name="message" rows="3" class="form-control" placeholder="Enter message"
                                required></textarea>
                        </div>

                        <!-- Image -->
                        <div class="mb-3">
                            <label class="form-label">Upload Photo</label>
                            <input type="file" name="image" class="form-control" accept="image/*"
                                onchange="previewImage(event)" required>

                            <!-- Preview -->
                            <img id="preview" class="preview-img border shadow-sm">
                        </div>

                        <!-- Button -->
                        <button name="submit" class="btn btn-primary w-100">
                            Upload Testimonial
                        </button>

                    </form>

                </div>

            </div>
        </div>

        <!-- ALERT -->
        <?php
    if (isset($_POST['submit'])) {

        $name = $_POST['name'];
        $msg  = $_POST['message'];

        $img = time() . '_' . $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];

        if (move_uploaded_file($tmp, 'uploads/' . $img)) {

            mysqli_query($conn, "INSERT INTO testimonials(name,message,image)
            VALUES('$name','$msg','$img')");

            echo "<div class='alert alert-success mt-4 text-center'>Added Successfully</div>";
        } else {
            echo "<div class='alert alert-danger mt-4 text-center'>Upload Failed</div>";
        }
    }
    ?>

    </div>

    <!-- JS -->
    <script>
    function previewImage(event) {
        const img = document.getElementById('preview');
        img.src = URL.createObjectURL(event.target.files[0]);
        img.style.display = "block";
    }
    </script>

</body>

</html>