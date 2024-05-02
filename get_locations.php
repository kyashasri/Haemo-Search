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

// Get selected blood bank from the request
$selectedBloodBank = $_GET['bloodBank'];

// Prepare SQL statement to fetch locations for the selected blood bank
$sql = "SELECT DISTINCT d_loc FROM locations WHERE d_name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $selectedBloodBank);
$stmt->execute();
$result = $stmt->get_result();

$locations = array();

// If results are found, fetch and store locations in an array
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $locations[] = $row['d_loc'];
  }
}

// Return locations as JSON response
echo json_encode($locations);

// Close database connection
$conn->close();
?>
