<?php
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
    $conn = mysqli_connect( 'localhost', 'root', '', 'mydb' );

    if ( !$conn ) {
        die( 'Connection failed: ' . mysqli_connect_error() );
    }

    // Retrieve form data
    $username = trim( $_POST[ 'user' ] );
    $password = trim( $_POST[ 'pass' ] );

    // Validate form data
    if ( empty( $username ) || empty( $password ) ) {
        echo "<script>alert('Username and Password are required!');</script>";
    } else {
        // Check if the username already exists
        $check_sql = "SELECT * FROM register WHERE username='$username'";
        $result = mysqli_query( $conn, $check_sql );

        if ( mysqli_num_rows( $result ) > 0 ) {
            echo "<script>alert('Username already exists!');</script>";
        } else {
            // Insert user into the database
            $sql = "INSERT INTO register (username, password) VALUES ('$username', '$password')";
            if ( mysqli_query( $conn, $sql ) ) {
                echo "<script>alert('Registration successful!');</script>";
            } else {
                echo "<script>alert('Error: " . mysqli_error( $conn ) . "');</script>";
            }
        }
    }
    mysqli_close( $conn );
}
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Register</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
</head>

<body>
    <section class='container-fluid py-5'>
        <div class='container'>
            <div class='row justify-content-center'>
                <div class='col-lg-4'>
                    <h2 class='text-center mb-3'>Register</h2>
                    <form action='' method='post'>
                        <div class='form-floating mb-3'>
                            <input type='text' name='user' class='form-control' placeholder='Username'>
                            <label>Username</label>
                        </div>
                        <div class='form-floating mb-3'>
                            <input type='password' name='pass' class='form-control' placeholder='Password'>
                            <label>Password</label>
                        </div>
                        <button type='submit' class='btn btn-outline-success col-lg-12 '>Register</button>
                        <p class='mt-3 text-center'>
                            Already have an account? <a href='login.php'>Login here</a>.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>