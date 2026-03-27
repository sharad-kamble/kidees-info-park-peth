<?php include 'db.php';
?>

<div class = 'container mt-5'>
<div class = 'card p-4 shadow'>

<h4>Add Testimonial</h4>

<form method = 'POST' enctype = 'multipart/form-data'>

<input type = 'text' name = 'name' class = 'form-control mb-3' placeholder = 'Parent Name' required>

<textarea name = 'message' class = 'form-control mb-3' placeholder = 'Message' required></textarea>

<input type = 'file' name = 'image' class = 'form-control mb-3' required>

<button name = 'submit' class = 'btn btn-primary'>Upload</button>

</form>

</div>
</div>

<?php
if ( isset( $_POST[ 'submit' ] ) ) {

    $name = $_POST[ 'name' ];
    $msg  = $_POST[ 'message' ];

    $img = time() . '_' . $_FILES[ 'image' ][ 'name' ];
    $tmp = $_FILES[ 'image' ][ 'tmp_name' ];

    if ( move_uploaded_file( $tmp, 'uploads/'.$img ) ) {

        mysqli_query( $conn, "INSERT INTO testimonials(name,message,image)
        VALUES('$name','$msg','$img')" );

        echo "<div class='alert alert-success mt-3'>Added Successfully</div>";
    } else {
        echo "<div class='alert alert-danger mt-3'>Upload Failed</div>";
    }
}
?>