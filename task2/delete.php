<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];

    // Prepare and bind
    $stmt = $conn->prepare("DELETE FROM posts WHERE Name = ? AND Description = ?");
    $stmt->bind_param("ss", $name, $description);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to posts page after successful deletion
        header("Location: posts.php");
        exit(); // Ensure no further code is executed
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
