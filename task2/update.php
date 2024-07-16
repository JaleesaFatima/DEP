<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];

    // Fetch the post to update
    $stmt = $conn->prepare("SELECT * FROM posts WHERE Name=? AND Description=?");
    $stmt->bind_param("ss", $name, $description);
    $stmt->execute();
    $result = $stmt->get_result();
    $post = $result->fetch_assoc();
    
    $stmt->close();
    $conn->close();
} else {
    // Handle case where the page is accessed without a POST request
    header("Location: posts.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Post</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Update Post</h1>
    <?php if (isset($post)): ?>
    <form id="f2" name="f2" method="post" action="update_process.php">
        <table class="center-table">
            <tr>
                <td class="padd">Name</td>
                <td class="padd">
                    <input type="text" length=30 id="txt1" name="txt1" value="<?php echo htmlspecialchars($post['Name']); ?>" required>
                </td>
            </tr>
            <tr>
                <td class="less">Description</td>
                <td class="less">
                    <textarea name="message" style="width:300px; height:200px;" required><?php echo htmlspecialchars($post['Description']); ?></textarea>
                </td>
            </tr>
            <tr>
                <td class="less">
                    <input type="submit" name="submit" value="Update">
                </td>
            </tr>
        </table>
        <input type="hidden" name="old_name" value="<?php echo htmlspecialchars($post['Name']); ?>">
        <input type="hidden" name="old_description" value="<?php echo htmlspecialchars($post['Description']); ?>">
    </form>
    <?php else: ?>
    <p>Post not found. <a href="posts.php">Go back</a></p>
    <?php endif; ?>
</body>
</html>
