<?php
// db.php
$db = new PDO('sqlite:../db.sqlite');

// Create users table if it doesn't exist
$db->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY,
    username TEXT,
    email TEXT
)");

// Insert a default user if table is empty
$stmt = $db->query("SELECT COUNT(*) FROM users");
$count = $stmt->fetchColumn();
if ($count == 0) {
    $db->exec("INSERT INTO users (username, email) VALUES ('user1', 'user1@example.com')");
}
/* FIX FOR CSRF ATTACK (UNCOMENT)
// Generate a CSRF token
if (empty($_SESSION['csrf_token'])) {

    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Function to validate CSRF token
function validateCsrfToken($token) {

    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}
*/
?>
