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
    echo json_encode(['success' => true, 'messages' => []]);
    exit;
}

$room = $result->fetch_assoc();
$room_id = $room['id'];

// Get messages
$stmt = $con->prepare("SELECT id, message, message_type, sender_type, created_at, is_read FROM chat_messages WHERE room_id = ? ORDER BY created_at ASC");
$stmt->bind_param("i", $room_id);
$stmt->execute();
$result = $stmt->get_result();

$messages = [];
while ($row = $result->fetch_assoc()) {
    $messages[] = [
        'id' => $row['id'],
        'message' => $row['message'],
        'message_type' => $row['message_type'],
        'sender_type' => $row['sender_type'],
        'timestamp' => $row['created_at'],
        'is_read' => $row['is_read']
    ];
}

echo json_encode(['success' => true, 'messages' => $messages]);

$stmt->close();
$con->close();
?>