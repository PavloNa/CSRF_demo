<?php
// change_email.php
session_start();
include 'db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    die("Not authenticated.");
}

// Get new email from POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_email = $_POST['email'];

    // Update email in the database
    $stmt = $db->prepare("UPDATE users SET email = ? WHERE id = ?");
    $stmt->execute([$new_email, $_SESSION['user_id']]);

    echo "Email updated to " . htmlspecialchars($new_email);
} else {
    echo "Invalid request.";
}
?>
