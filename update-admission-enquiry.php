<?php
$conn = mysqli_connect( 'localhost', 'root', '', 'phpdatabase' );

if ( !$conn ) {
    die( 'Database not connected' );
}

/* Get ID from URL */
$id = $_GET[ 'id' ] ?? 0;

/* Fetch data from database */
$sql = "SELECT * FROM admission_enquiry WHERE id='$id'";
$result = mysqli_query( $conn, $sql );
$row = mysqli_fetch_assoc( $result );

/* Assign values safely */
$parentName = $row[ 'parent_name' ] ?? '';
$mobile     = $row[ 'mobile' ] ?? '';
$email      = $row[ 'email' ] ?? '';
$class      = $row[ 'class' ] ?? '';
$message    = $row[ 'message' ] ?? '';
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Update Enquiry</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' rel='stylesheet'>
</head>

<body>
    <div class='container mt-5'>

        <div class='d-flex justify-content-between align-items-center mb-4'>
            <h2 class='text-center'>Update Admission Enquiry</h2>
            <a href='admin_panel.php' class='btn btn-secondary'>Back to Panel</a>
        </div>

        <form action='update_enquiry_process.php' method='POST'>
            <div class='row g-3'>

                <!-- ID -->
                <div class='col-md-6'>
                    <label class='form-label'>ID</label>
                    <input type='text' class='form-control' name='id' value="<?php echo $id; ?>" readonly required>
                </div>

                <!-- Parent Name -->
                <div class='col-md-6'>
                    <label class='form-label'>Parent Name</label>
                    <input type='text' class='form-control' name='parent_name' value="<?php echo $parentName; ?>"
                        required>
                </div>

                <!-- Mobile -->
                <div class='col-md-6'>
                    <label class='form-label'>Mobile</label>
                    <input type='tel' class='form-control' name='mobile' value="<?php echo $mobile; ?>" required>
                </div>

                <!-- Email -->
                <div class='col-md-6'>
                    <label class='form-label'>Email</label>
                    <input type='email' class='form-control' name='email' value="<?php echo $email; ?>" required>
                </div>

                <!-- Class -->
                <div class='col-md-6'>
                    <label class='form-label'>Class</label>
                    <input type='text' class='form-control' name='class' value="<?php echo $class; ?>" required>
                </div>

                <!-- Message -->
                <div class='col-12'>
                    <label class='form-label'>Message</label>
                    <input type='text' class='form-control' name='message' value="<?php echo $message; ?>" required>
                </div>

            </div>

            <div class='mt-4'>
                <input type='submit' class='btn btn-primary' value='Update Enquiry'>
            </div>

        </form>
    </div>

    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js'></script>
</body>

</html>