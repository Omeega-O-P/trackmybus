<?php
// Allow cross-origin requests (if your frontend is running from a different server)
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
include("db copy.php");

// Read the JSON input from the request body
$data = json_decode(file_get_contents("php://input"), true);

// Database credentials (change these to match your setup)
$host = "localhost";
$username = "root";  // Your MySQL username
$password = "";      // Your MySQL password
$database = "bus_tracking";  // Database name

// Connect to the database
$conn = new mysqli($host, $username, $password, $database);

// Check for a successful connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if data is received
if ($data) {
    $latitude = $data['latitude'];
    $longitude = $data['longitude'];

    // Prepare the SQL query to insert data into the locations table
    $sql = "INSERT INTO locations (latitude, longitude) VALUES (?, ?)";

    // Use prepared statements to prevent SQL injection
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("dd", $latitude, $longitude);  // Bind latitude and longitude as double values
        $stmt->execute();  // Execute the query to insert the data
        $stmt->close();  // Close the prepared statement

        // Return a success message
        echo json_encode(["status" => "success", "message" => "Location saved"]);
    } else {
        // If the query failed, return an error message
        echo json_encode(["status" => "error", "message" => "Failed to insert data"]);
    }
} else {
    // If no data is received, return an error message
    echo json_encode(["status" => "LIVE", "message" => "DATA SAVED"]);
}

// Close the database connection
$conn->close();
?>
