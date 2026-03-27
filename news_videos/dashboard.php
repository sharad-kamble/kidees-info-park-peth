<?php session_start(); 
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">

        <h2>Welcome Admin</h2>

        <a href="add-news.php" class="btn btn-success">Add News</a>
        <a href="manage-news.php" class="btn btn-primary">Manage News</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>

    </div>
</body>

</html>