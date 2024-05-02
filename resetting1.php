<?php
// Database connection
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'bloodbanks';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to verify old password
function verifyOldPassword($username, $password, $conn) {
    $sql = "SELECT password FROM admin1 WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "Error retrieving password: " . mysqli_error($conn); // Debug statement
        return false;
    }

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row['password'];
        $password = trim($password); // Trim input password
        echo "Stored password: $stored_password <br>"; // Debug statement
        echo "Input password: $password <br>"; // Debug statement
        $password_matched = password_verify($password, $stored_password);
        echo "Password matched: " . var_export($password_matched, true) . "<br>"; // Debug statement
        return $password_matched;
    } else {
        return false;
    }
}

// Process password change
if (isset($_POST['change_password'])) {
    $username = $_POST['username'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];

    echo "Username: $username <br>"; // Debug statement
    echo "Old password: $old_password <br>"; // Debug statement
    echo "New password: $new_password <br>"; // Debug statement

    if (verifyOldPassword($username, $old_password, $conn)) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $sql = "UPDATE admin1 SET password='$hashed_password' WHERE username='$username'";
        if (mysqli_query($conn, $sql)) {
            echo "Password changed successfully.";
        } else {
            echo "Error updating password: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid password.";
    }
}

mysqli_close($conn);
?>

