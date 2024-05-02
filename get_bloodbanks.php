<?php
// Database connection parameters
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

// Prepare SQL statement to fetch blood bank names
$sql = "SELECT DISTINCT d_name FROM locations order by d_name";
$result = $conn->query($sql);

$bloodBanks = array();

// If results are found, fetch and store blood bank names in an array
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $bloodBanks[] = $row['d_name'];
  }
}

// Return blood bank names as JSON response
echo json_encode($bloodBanks);

// Close database connection
$conn->close();
?>

