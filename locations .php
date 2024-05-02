<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bloodbanks";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve unique locations from the 'locations' table
$sql = "SELECT d_loc FROM locations";
$result = $conn->query($sql);

// Return locations as JSON
if ($result->num_rows > 0) {
    $locations = array();
    while ($row = $result->fetch_assoc()) {
        $locations[] = $row['location'];
    }
    echo json_encode($locations);
} else {
    echo "No locations found";
}

$conn->close();
?>
