<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database";
if (!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['comment'])) {
    die("Missing input data");
}
$name = $_POST['name'];
$email = $_POST['email'];
$comment = $_POST['comment'];
echo "Name: $name<br>";
echo "Email: $email<br>";
echo "Comment: $comment<br>";
$sql = "INSERT INTO comments (name, email, comment) VALUES ('$name', '$email', '$comment')";
if ($conn->query($sql) === TRUE) {
    echo "Comment submitted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
{
    require_once("submit_comment.php");
}
$conn->close();
?>
