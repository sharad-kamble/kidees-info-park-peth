<?php include 'db.php';
session_start();
?>

<link href = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel = 'stylesheet'>

<div class = 'container mt-5'>
<div class = 'card p-4 shadow'>

<h4>Add News / Event</h4>

<form method = 'POST' enctype = 'multipart/form-data'>

<input type = 'text' name = 'title' class = 'form-control mb-3' placeholder = 'Title' required>

<textarea name = 'description' class = 'form-control mb-3' placeholder = 'Description'></textarea>

<input type = 'file' name = 'image' class = 'form-control mb-3' required>

<input type = 'text' name = 'video_link' class = 'form-control mb-3' placeholder = 'YouTube Embed Link'>

<select name = 'type' class = 'form-control mb-3'>
<option value = 'news'>News</option>
<option value = 'event'>Event</option>
</select>

<button name = 'submit' class = 'btn btn-primary'>Upload</button>

</form>
</div>
</div>

<?php
include 'db.php';

if ( isset( $_POST[ 'submit' ] ) ) {

    $title = $_POST[ 'title' ];
    $desc  = $_POST[ 'description' ];
    $type  = $_POST[ 'type' ];

    $image = $_FILES[ 'image' ][ 'name' ];
    $tmp   = $_FILES[ 'image' ][ 'tmp_name' ];

    // move image to uploads folder
    move_uploaded_file( $tmp, 'uploads/' . $image );

    // insert into DB
    mysqli_query( $conn, "INSERT INTO news(title,description,type,image)
    VALUES('$title','$desc','$type','$image')" );

    echo 'Data Added Successfully';
}
?>