<?php
include 'db.php';

// GET data for edit form
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM news WHERE id=$id"));
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Update News</title>

    <!-- Bootstrap -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
</head>

<body>

    <div class='container mt-5'>

        <!-- Header -->
        <div class='d-flex justify-content-between align-items-center mb-4'>
            <h2>Update News</h2>
            <a href='manage-news.php' class='btn btn-secondary'>Back</a>
        </div>

        <!-- FORM -->
        <!-- ✅ removed action so same file handles update -->
        <form method='POST' enctype='multipart/form-data'>

            <!-- ✅ hidden ID (IMPORTANT) -->
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

            <div class='row g-3'>

                <!-- ID -->
                <div class='col-md-6'>
                    <label class='form-label'>ID</label>
                    <input type='text' class='form-control' value="<?php echo $data['id']; ?>" readonly>
                </div>

                <!-- Title -->
                <div class='col-md-6'>
                    <label class='form-label'>Title</label>
                    <input type='text' name='title' class='form-control' value="<?php echo $data['title']; ?>" required>
                </div>

                <!-- Description -->
                <div class='col-12'>
                    <label class='form-label'>Description</label>
                    <textarea name='description' class='form-control' rows='3'
                        required><?php echo $data['description']; ?></textarea>
                </div>

                <!-- Image -->
                <div class='col-md-6'>
                    <label class='form-label'>Upload New Image</label>
                    <input type='file' name='image' class='form-control'>
                </div>

                <!-- Current Image -->
                <div class='col-md-6'>
                    <label class='form-label'>Current Image</label><br>
                    <img src="uploads/<?php echo $data['image']; ?>" width='100'>
                </div>

            </div>

            <!-- Button -->
            <div class='mt-4'>
                <button type='submit' name='update' class='btn btn-primary'>Update News</button>
            </div>

        </form>

    </div>

</body>

</html>

<?php
// ✅ UPDATE LOGIC
if (isset($_POST['update'])) {

    $id = $_POST['id']; // ✅ correct
    $title = $_POST['title'];
    $desc = $_POST['description'];

    if (!empty($_FILES['image']['name'])) {
        $img = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $img);

        $sql = "UPDATE news SET title='$title', description='$desc', image='$img' WHERE id='$id'";
    } else {
        $sql = "UPDATE news SET title='$title', description='$desc' WHERE id='$id'";
    }

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    header('Location: manage-news.php');
    exit;
}
?>