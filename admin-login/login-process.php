<?php
$conn = mysqli_connect( 'localhost', 'root', '', 'mydb' );

if ( isset( $_POST[ 'login' ] ) ) {
    // Retrieve form data
    $user = trim( $_POST[ 'user' ] );
    $pass = trim( $_POST[ 'pass' ] );

    // Check if username or password is empty
    if ( empty( $user ) || empty( $pass ) ) {
        // Redirect back to login page with an error message
        header( 'location:login.php?error=empty_fields' );
        exit();
    }

    // Escape the inputs to prevent SQL injection
    $user = mysqli_real_escape_string( $conn, $user );
    $pass = mysqli_real_escape_string( $conn, $pass );

    // Process login here ( e.g., validate user credentials )
    $sql = "SELECT username, password FROM register WHERE username='$user' AND password='$pass'";
    $check = mysqli_query( $conn, $sql );

    if ( mysqli_num_rows( $check ) > 0 ) {
        $result = mysqli_fetch_assoc( $check );
        $username = $result[ 'username' ];

        // Start session and store user information
        session_start();
        $_SESSION[ 'user' ] = $username;
        header( 'location:welcome.php' );
        exit();
    } else {
        // Redirect back to login page if credentials are invalid
        header( 'location:login.php?error=invalid_credentials' );
        exit();
    }
}
?>