<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';
 if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user_id'];

    $sql = "Insert into posts (user_id, title, description) values ('$user_id', '$title', '$description')";
    $conn->query($sql);
 }

 $user_id = $_SESSION['user_id'];
 $sql = "SELECT * FROM posts WHERE user_id = '$user_id'";
 $result = $conn->query($sql);

 $posts = [];
 while ($row = $result->fetch_assoc()) {
    $posts[] = $row;
 }
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
 </head>
 <body>
    <h2>Dashboard</h2>
   <ahref="logout.php">Logout</a>
   <h3> Create a new Post</h3>
   <form action="dashboard.php" method="post">
    <label for "title">Title</label>
    <input type="text" id="title" name="title" required>
    <br>
    <label for "description">Description</label>
    <textarea id="description" name="description" required></textarea>
    <br>
    <button type="submit"> Create Post Button</button>
   </form>
   <h3> Your Posts</h3>
   <ul>
    <?php foreach($posts as $post): ?>
        <><strong><?php echo $post['title']; ?></strong>: <?php echo $post['description']; ?></li>
    <?php endforeach; ?>
   </ul>
 </body>
 </html>
    