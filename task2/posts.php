<?php
include("connection.php");


// Fetch posts from the database
$result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog Posts</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 70vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            width: 70%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .center-table {
            width: 100%;
            text-align: center;
        }
        .hover-link {
            color: black;
            text-decoration: underline;
            cursor: pointer;
            
}
    </style>
</head>
<body style= "background-image: url('bg.jpg');">
    <div class="container">
        <img src="header.jpg" height="100" width="950" alt="Header">
        <div>
            <button type="button" onclick="window.location.href='add.html'">ADD NEW!</button>
        </div>
        <h2>All Posts</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Creation date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='hover-link' onclick=\"viewPost('" . htmlspecialchars($row['Name']) . "', '" . htmlspecialchars($row['Description']) . "')\">" . htmlspecialchars($row['Name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Description']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo '<td>
                        <button type="button" onclick="updatePost(\''. htmlspecialchars($row['Name']) .'\', \''. htmlspecialchars($row['Description']) .'\')">UPDATE!</button>
                <button type="button" onclick="deletePost(\''. htmlspecialchars($row['Name']) .'\', \''. htmlspecialchars($row['Description']) .'\')">DELETE!</button>
              </td>';
                              echo "</tr>";
                        echo "<tr class='spacer'><td colspan='3'></td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No posts found</td></tr>";
                }
                ?>
                <script>

                    function viewPost(name, description) {
                            var url = 'view.php?name=' + encodeURIComponent(name) + '&description=' + encodeURIComponent(description);
                            window.location.href = url;
                    }
                    function updatePost(name, description) {
                            var form = document.createElement('form');
                            form.method = 'POST';
                            form.action = 'update.php';
                            
                            var nameField = document.createElement('input');
                            nameField.type = 'hidden';
                            nameField.name = 'name';
                            nameField.value = name;
                            form.appendChild(nameField);
                            
                            var descriptionField = document.createElement('input');
                            descriptionField.type = 'hidden';
                            descriptionField.name = 'description';
                            descriptionField.value = description;
                            form.appendChild(descriptionField);
                            
                            document.body.appendChild(form);
                            form.submit();
}

function deletePost(name, description) {
    var form = document.createElement('form');
    form.method = 'POST';
    form.action = 'delete.php';
    
    var nameField = document.createElement('input');
    nameField.type = 'hidden';
    nameField.name = 'name';
    nameField.value = name;
    form.appendChild(nameField);
    
    var descriptionField = document.createElement('input');
    descriptionField.type = 'hidden';
    descriptionField.name = 'description';
    descriptionField.value = description;
    form.appendChild(descriptionField);
    
    document.body.appendChild(form);
    form.submit();
}
</script>
            </tbody>
        </table>
    </div>
</body>
</html>