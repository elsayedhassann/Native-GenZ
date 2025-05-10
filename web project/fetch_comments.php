<?php
include 'config.php';

$sql = "SELECT comment, created_at FROM comments ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='comment'><p>" . htmlspecialchars($row["comment"]). "</p><small>" . $row["created_at"]. "</small></div>";
    }
} else {
    echo "لا توجد تعليقات بعد.";
}

$conn->close();
?>
