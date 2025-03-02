<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");


if ($_SERVER['REQUEST_METHOD'] == "OPTIONS") {
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "school_bus_tracker";

// Connect to MySQL
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Database connection failed"]));
}

// Get JSON data
$data = json_decode(file_get_contents("php://input"), true);
if ($data) {
    $busId = $data["busId"];
    $latitude = $data["latitude"];
    $longitude = $data["longitude"];
    $speed = $data["speed"];

    $stmt = $conn->prepare("INSERT INTO bus_locations (bus_id, latitude, longitude, speed, timestamp) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("iddi", $busId, $latitude, $longitude, $speed);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Location updated"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to update"]);
    }
    $stmt->close();
}

$conn->close();
?>
