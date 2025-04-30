<?php
$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Subject = $_POST['Subject'];
$Message = $_POST['Message'];

// Database Connection
$conn = new mysqli('localhost', 'root', '', 'school website'); // Added empty password and proper database name
if ($conn->connect_error) { // Corrected case of connect_error
    die('Connection Failed: ' . $conn->connect_error); // Corrected case of connect_error
} else {
    $stmt = $conn->prepare("INSERT INTO `contact_web` (Name, Email, Subject, Message) VALUES (?, ?, ?, ?)"); // Corrected assignment operator and table name
    
    if ($stmt === false) {
        die('Prepare failed: ' . $conn->error);
    }
    
    $stmt->bind_param("ssss", $Name, $Email, $Subject, $Message);
    if ($stmt->execute()) {
        echo "Message Sent Successfully.....";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>