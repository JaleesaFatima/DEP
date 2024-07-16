<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $old_name = $_POST['old_name'];
    $old_description = $_POST['old_description'];
    $new_name = $_POST['txt1'];
    $new_description = $_POST['message'];

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE posts SET Name=?, Description=? WHERE Name=? AND Description=?");
    $stmt->bind_param("ssss", $new_name, $new_description, $old_name, $old_description);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Record updated successfully";
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
