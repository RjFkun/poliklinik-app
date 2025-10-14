<?php
require __DIR__ . '/../vendor/autoload.php';

// Load .env if exists
if (file_exists(__DIR__ . '/../.env')) {
    // naive parse for DB credentials
    $env = file_get_contents(__DIR__ . '/../.env');
    preg_match('/DB_HOST=(.*)/', $env, $h);
    preg_match('/DB_DATABASE=(.*)/', $env, $db);
    preg_match('/DB_USERNAME=(.*)/', $env, $u);
    preg_match('/DB_PASSWORD=(.*)/', $env, $p);
    $host = trim($h[1] ?? '127.0.0.1');
    $dbname = trim($db[1] ?? 'poliklinik_db');
    $user = trim($u[1] ?? 'root');
    $pass = trim($p[1] ?? '');
} else {
    $host='127.0.0.1'; $dbname='poliklinik_db'; $user='root'; $pass='';
}

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
    $stmt = $pdo->query('SELECT id,nama,email,role FROM users');
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!$rows) {
        echo "No users found.\n";
        exit(0);
    }
    foreach ($rows as $r) {
        echo $r['id'] . " | " . $r['nama'] . " | " . $r['email'] . " | " . $r['role'] . "\n";
    }
} catch (Exception $e) {
    echo "Error: ", $e->getMessage(), "\n";
}
