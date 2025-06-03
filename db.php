<?php
// Database connection using SQLite
$dsn = 'sqlite:' . __DIR__ . '/playmate.db';
try {
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // create users table if not exists
    $pdo->exec("CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT UNIQUE,
        password TEXT
    )");
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}
?>
