<?php

// Check if the JAWSDB_URL environment variable exists (it will on Heroku)
$dbUrl = getenv('JAWSDB_URL');

if ($dbUrl !== false) {
    // This block runs on Heroku
    // Parse the JawsDB URL to get the connection details
    $dbopts = parse_url($dbUrl);
    $host = $dbopts['host'];
    $db   = ltrim($dbopts['path'], '/');
    $user = $dbopts['user'];
    $pass = $dbopts['pass'];
} else {
    // This block runs on your local XAMPP
    $host = 'localhost';
    $db   = 'Budget';
    $user = 'root';
    $pass = '';
}

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}

// // Connect to local Db
// $host = 'localhost';
// $db = 'Budget';
// $user = 'root';
// $pass = '';

// try {
//     $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
//     // 2. Set error mode to Exception to catch errors
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     // 3. Stop the script and show a friendly error message if connection fails
//     die("Could not connect to the database $db :" . $e->getMessage());
// }


function validateLogin($pdo) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT password FROM users WHERE username = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);

    $hashedPassword = $stmt->fetchColumn();

    if ($hashedPassword && password_verify($password, $hashedPassword)) {
        return true;
    } else {
        return false;
    }
}
?>