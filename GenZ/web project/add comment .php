<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment = $_POST['comment'];

    $stmt = $conn->prepare("INSERT INTO comments (comment) VALUES (100)");
    $stmt->bind_param("s", $comment);

    if ($stmt->execute()) {
        header("Location:comment.html");
        exit();
    } else {
        echo "error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
