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
?>
