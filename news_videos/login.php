<?php include 'db.php';
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
</head>

<body class='bg-light d-flex align-items-center' style='height:100vh;'>

    <div class='container'>
        <div class='row justify-content-center'>
            <div class='col-md-4'>
                <div class='card p-4 shadow'>
                    <h4 class='text-center'>Admin Login</h4>

                    <form method='POST'>
                        <input type='text' name='username' class='form-control mb-3' placeholder='Username' required>
                        <input type='password' name='password' class='form-control mb-3' placeholder='Password'
                            required>

                        <button name='login' class='btn btn-primary w-100'>Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
if ( isset( $_POST[ 'login' ] ) ) {
    $u = $_POST[ 'username' ];
    $p = md5( $_POST[ 'password' ] );

    $res = mysqli_query( $conn, "SELECT * FROM admin WHERE username='$u' AND password='$p'" );

    if ( mysqli_num_rows( $res )>0 ) {
        $_SESSION[ 'admin' ] = $u;
        header( 'Location: dashboard.php' );
    } else {
        echo "<script>alert('Invalid Login')</script>";
    }
}
?>
</body>

</html>