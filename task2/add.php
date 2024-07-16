<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input values
    $name = $_POST['txt1'];
    $description = $_POST['message'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO posts (Name, Description) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $description);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to posts page after successful insertion
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
