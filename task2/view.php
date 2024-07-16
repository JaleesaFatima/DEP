<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Post</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .container {
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            width: 50%;
            margin: 50px auto;
            font-family: Arial, sans-serif;
        }
        h2 {
            text-align: center;
        }
        .post-details {
            margin-top: 20px;
        }
    </style>
</head>
<body style= "background-image: url('bg.jpg');">
    <div class="container">
        <h2>Post Details</h2>
        <div class="post-details">
            <p><strong>Name:</strong> <?php echo htmlspecialchars($_GET['name']); ?></p>
            <p><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($_GET['description'])); ?></p>
        </div>
        <div style="text-align: center;">
            <button type="button" onclick="window.history.back()">Go Back</button>
        </div>
    </div>
</body>
</html>
