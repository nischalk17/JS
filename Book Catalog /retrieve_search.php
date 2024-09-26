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

// SQL query to retrieve stored data from the searches table
$sql = "SELECT * FROM searches";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<h2>Stored Searches</h2>";
    echo "<table border='1'><tr><th>Search Type</th><th>Keyword</th><th>Downloadable</th></tr>";
    
    // Output data for each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["search_type"] . "</td><td>" . $row["keyword"] . "</td><td>" . ($row["download"] ? 'True' : 'False') . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No results found.";
}

// Close the connection
mysqli_close($conn);
?>
