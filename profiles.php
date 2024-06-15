<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'profiles-db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve profiles from the database
$sql = "SELECT * FROM profiles";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <h1>User profiles</h1>
    
   <?php 
   if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<h2>" . $row['name'] . "</h2>";
        echo "<p>Email: " . $row['email'] . "</p>";
        echo "<p>Phone: " . $row['phone'] . "</p>";
        echo "<p>Address: " . $row['address'] . "</p>";
        echo "<img src='" . $row['profile_pic'] . "' alt='Profile Picture'>";
        echo "</div>";
    }
} else {
    echo "No profiles found";
}
$conn->close();
?>
 
</body>
</html>
