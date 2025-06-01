<?php
$servername = "localhost"; // Change if your server is different
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "project1(dlb)";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle POST requests for adding or updating vehicles
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vehicleId = $_POST['vehicle_id'];
    $loadType = $_POST['load_type'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $width = $_POST['width'];
    $length = $_POST['length'];

    if (isset($_POST['id']) && $_POST['id'] != '') {
        // Update vehicle
        $id = $_POST['id'];
        $sql = "UPDATE vehicle details SET vehicle_id='$vehicleId', load_type='$loadType', weight='$weight', height='$height', width='$width', length='$length' WHERE id=$id";
    } else {
        // Add new vehicle
        $sql = "INSERT INTO vehicle details (vehicle_id, load_type, weight, height, width, length) VALUES ('$vehicleId', '$loadType', $weight, $height, $width, $length)";
    }

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['status' => 'success', 'message' => 'Vehicle saved successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error: ' . $conn->error]);
    }
    exit;
}

// Handle DELETE requests for deleting vehicles
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $_DELETE);
    $id = $_DELETE['id'];
    $sql = "DELETE FROM vehicle details WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['status' => 'success', 'message' => 'Vehicle deleted successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error: ' . $conn->error]);
    }
    exit;
}

// Handle GET requests for retrieving vehicles
$sql = "SELECT * FROM vehicle details";
$result = $conn->query($sql);
$vehicles = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $vehicles[] = $row;
    }
}

echo json_encode($vehicles);
$conn->close();
?>