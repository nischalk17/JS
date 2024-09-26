<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "book_catalog";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $search_type = $_POST['search_type'];
    $keyword = $_POST['keyword'];
    $download = $_POST['download'] == 'true' ? 1 : 0;  // Convert to boolean (1 or 0)

    // SQL query to insert form data into database
    $sql = "INSERT INTO searches (search_type, keyword, download) VALUES ('$search_type', '$keyword', '$download')";

    if (mysqli_query($conn, $sql)) {
        echo "Record saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the connection
mysqli_close($conn);
?>
