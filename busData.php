<?php
// Database connection details
$servername = "127.0.0.1";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "bus_tracker";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if BusNo is set in the GET request
if (isset($_GET['BusNo'])) {
    $busNo = $_GET['BusNo'];

    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT SourceName, SourceCoordinates, DestinationName, DestinationCoordinates, Stop1Name, Stop1Coordinates, Stop2Name, Stop2Coordinates, Stop3Name, Stop3Coordinates FROM bus_det WHERE BusNo = ?");
    $stmt->bind_param("s", $busNo);
    $stmt->execute();
    
    // Get result
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Fetch associative array of bus details
        $busDetails = $result->fetch_assoc();
        
        // Return data as JSON
        echo json_encode($busDetails);
    } else {
        // If no data found, return an empty JSON object
        echo json_encode([]);
    }
    
    // Close statement
    $stmt->close();
} else {
    echo json_encode(["error" => "BusNo not provided"]);
}

// Close connection
$conn->close();
?>
