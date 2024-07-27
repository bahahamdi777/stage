<?php
header('Content-Type: application/json');

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "deliver";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die(json_encode(['error' => 'Connection failed: ' . $conn->connect_error]));
}

// Fetch users
$userQuery = "SELECT * FROM utilisateur";
$userResult = $conn->query($userQuery);

$users = [];
if ($userResult->num_rows > 0) {
    while ($row = $userResult->fetch_assoc()) {
        $users[] = $row;
    }
}

// Fetch requests
$requestQuery = "SELECT * FROM user_request";
$requestResult = $conn->query($requestQuery);

$requests = [];
if ($requestResult->num_rows > 0) {
    while ($row = $requestResult->fetch_assoc()) {
        $requests[] = $row;
    }
}

echo json_encode(['users' => $users, 'requests' => $requests]);

$conn->close();
?>
