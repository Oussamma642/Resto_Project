<?php
try {
    // Database connection
    $dsn = 'mysql:host=localhost;dbname=restaurant;charset=utf8';
    $username = 'root';
    $password = '';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];
    $pdo = new PDO($dsn, $username, $password, $options);
    // Call the stored procedure
    $stmt = $pdo->prepare('SELECT Total_Order_Amount(1) as total');
    $stmt->execute();
    $results = $stmt->fetch();
    echo json_encode($results);
} 
catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}