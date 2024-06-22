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

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize user input to prevent SQL injection
$name = $conn->real_escape_string($name);
$email = $conn->real_escape_string($email);
$comment = $conn->real_escape_string($comment);

echo "Name: $name<br>";
echo "Email: $email<br>";
echo "Comment: $comment<br>";

$sql = "INSERT INTO comments (name, email, comment) VALUES ('$name', '$email', '$comment')";

if ($conn->query($sql) === TRUE) {
    echo "Comment submitted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

