<?php
$username = $_REQUEST[ 'user' ];
$password = $_REQUEST[ 'pass' ];
$id = $_REQUEST[ 'id' ];
$name = $_REQUEST[ 'name' ];
$email = $_REQUEST[ 'email' ];
$sub = $_REQUEST[ 'sub' ];
$company = $_REQUEST[ 'company' ];
$phone = $_REQUEST[ 'phone' ];
$message = $_REQUEST[ 'message' ];
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Update Data</title>
    <!-- Bootstrap CSS CDN -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' rel='stylesheet'>
</head>

<body>
    <div class='container mt-5'>
        <!-- Heading with button -->
        <div class='d-flex justify-content-between align-items-center mb-4'>
            <h2 class='text-center'>Update Data</h2>
            <a href='index.php' class='btn btn-secondary'>Back to Home</a>
        </div>
        <form action='updateprocess.php' method='POST'>
            <div class='row g-3'>
                <!-- ID ( readonly, can be hidden if needed ) -->
                <div class='col-md-6'>
                    <label for='id' class='form-label'>ID</label>
                    <input type='text' class='form-control' id='id' name='id' value="<?php echo $id; ?>" readonly
                        required>
                </div>

                <!-- Username -->
                <div class='col-md-6'>
                    <label for='username' class='form-label'>Username</label>
                    <input type='text' class='form-control' id='username' name='user' value="<?php echo $username; ?>"
                        required>
                </div>

                <!-- Password -->
                <div class='col-md-6'>
                    <label for='password' class='form-label'>Password</label>
                    <input type='password' class='form-control' id='password' name='pass'
                        value="<?php echo $password; ?>" required>
                </div>

                <!-- Name -->
                <div class='col-md-6'>
                    <label for='name' class='form-label'>Name</label>
                    <input type='text' class='form-control' id='name' name='name' value="<?php echo $name; ?>" required>
                </div>

                <!-- Email -->
                <div class='col-md-6'>
                    <label for='email' class='form-label'>Email</label>
                    <input type='email' class='form-control' id='email' name='email' value="<?php echo $email; ?>"
                        required>
                </div>

                <!-- Subject -->
                <div class='col-md-6'>
                    <label for='subject' class='form-label'>Subject</label>
                    <input type='text' class='form-control' id='subject' name='sub' value="<?php echo $sub; ?>"
                        required>
                </div>

                <!-- Company -->
                <div class='col-md-6'>
                    <label for='company' class='form-label'>Company</label>
                    <input type='text' class='form-control' id='company' name='company' value="<?php echo $company; ?>"
                        required>
                </div>

                <!-- Phone -->
                <div class='col-md-6'>
                    <label for='phone' class='form-label'>Phone</label>
                    <input type='tel' class='form-control' id='phone' name='phone' value="<?php echo $phone; ?>"
                        required>
                </div>

                <!-- Message -->
                <div class='col-12'>
                    <label for='message' class='form-label'>Message</label>
                    <input type='text' class='form-control' id='message' name='message' value="<?php echo $message; ?>"
                        required>
                </div>
            </div>

            <!-- Submit Button -->
            <div class='mt-4'>
                <input type='submit' class='btn btn-primary' value='Update Data'>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS CDN -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js'></script>
</body>

</html>