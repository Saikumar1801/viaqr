<?php
session_start();
include_once('dbconn.php');

header('Content-Type: application/json');

$car_info = $_POST['car_info'] ?? '';

if (empty($car_info)) {
    echo json_encode(['success' => false, 'error' => 'Car info is required']);
    exit;
}

// Get chat room ID
$stmt = $con->prepare("SELECT id FROM chat_rooms WHERE car_info = ?");
$stmt->bind_param("s", $car_info);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode(['success' => false, 'error' => 'Chat room not found']);
    exit;
}

$room = $result->fetch_assoc();
$room_id = $room['id'];

// Mark messages as read
$stmt = $con->prepare("UPDATE chat_messages SET is_read = 1 WHERE room_id = ? AND sender_type = 'driver'");
$stmt->bind_param("i", $room_id);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Messages marked as read']);
} else {
    echo json_encode(['success' => false, 'error' => 'Failed to mark messages as read']);
}

$stmt->close();
$con->close();
?>