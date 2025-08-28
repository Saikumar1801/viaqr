<?php
session_start();
include_once('dbconn.php');

header('Content-Type: application/json');

$car_info = $_POST['car_info'] ?? '';

if (empty($car_info)) {
    echo json_encode(['success' => false, 'error' => 'Car info is required']);
    exit;
}

// Check if chat room already exists
$stmt = $con->prepare("SELECT id FROM chat_rooms WHERE car_info = ?");
$stmt->bind_param("s", $car_info);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Chat room already exists
    echo json_encode(['success' => true, 'message' => 'Chat room already exists']);
    exit;
}

// Create new chat room
$stmt = $con->prepare("INSERT INTO chat_rooms (car_info, created_at) VALUES (?, NOW())");
$stmt->bind_param("s", $car_info);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Chat room created successfully']);
} else {
    echo json_encode(['success' => false, 'error' => 'Failed to create chat room']);
}

$stmt->close();
$con->close();
?>