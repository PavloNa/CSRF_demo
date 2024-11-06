<?php
// index.php
session_start();
include 'db.php';

// Simulate user login
if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = 1; // Assume user1 is logged in
}

// Fetch current email
$stmt = $db->prepare("SELECT email FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$current_email = $stmt->fetchColumn();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Email</title>
</head>
<body>
    <h1>Change Your Email</h1>
    <form action="change_email.php" method="POST">
        <label for="email">New Email:</label>
        <input type="email" name="email" id="email" required>
        <button type="submit">Change Email</button>
    </form>
    <!-- FIX FOR THE CSRF attack (UNCOMMENT and remove previous form)
    <form action="change_email.php" method="POST">
        <label for="email">New Email:</label>
        <input type="email" name="email" id="email" required>
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <button type="submit">Change Email</button>
    </form>
    -->
    <p>Current Email: <?php echo htmlspecialchars($current_email); ?></p>
</body>
</html>
