<?php
session_start();
include_once('dbconn.php');

header('Content-Type: application/json');

$car_info = $_POST['car_info'] ?? '';
$message = $_POST['message'] ?? '';
$message_type = $_POST['message_type'] ?? 'text';
$sender_type = $_POST['sender_type'] ?? '';

if (empty($car_info) || empty($message) || empty($sender_type)) {
    echo json_encode(['success' => false, 'error' => 'Missing parameters']);
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

// Insert message
$stmt = $con->prepare("INSERT INTO chat_messages (room_id, message, message_type, sender_type, created_at) VALUES (?, ?, ?, ?, NOW())");
$stmt->bind_param("isss", $room_id, $message, $message_type, $sender_type);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Message sent successfully']);
} else {
    echo json_encode(['success' => false, 'error' => 'Failed to send message']);
}

$stmt->close();
$con->close();
?>