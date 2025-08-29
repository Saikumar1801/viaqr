# viaqr
## Make sure to place all files in viaqr folder 
### Database Schema
```bash
CREATE TABLE chat_rooms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    car_info VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL,
    UNIQUE KEY unique_car_info (car_info)
);

CREATE TABLE chat_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    room_id INT NOT NULL,
    message VARCHAR(255) NOT NULL,
    sender_type ENUM('driver', 'requester') NOT NULL,
    is_read TINYINT(1) DEFAULT 0,
    created_at DATETIME NOT NULL,
    FOREIGN KEY (room_id) REFERENCES chat_rooms(id) ON DELETE CASCADE
);
```
