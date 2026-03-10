<?php
require_once 'functions.php';
header('Content-Type: application/json; charset=UTF-8');

$base = '/integrisani/task9/api/';
$uri = $_SERVER['REQUEST_URI'];


$uri = parse_url($uri, PHP_URL_PATH);


$path = substr($uri, strlen($base));


$parts = explode('/', trim($path, '/'));

$table = $parts[0] ?? '';
$id = $parts[1] ?? null;
$sub = $parts[2] ?? null;

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

$authHeader = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
$token = '';

if (preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
    $token = $matches[1];
}

$tokenData = validateToken($token);

if (!$tokenData) {
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}


if (!checkTokenLimit($tokenData['id_token'], $tokenData['restriction_number'])) {
    http_response_code(429);
    echo json_encode(['error' => 'Too many requests']);
    exit;
}


logTokenUsage($tokenData['id_token'], $_SERVER['REQUEST_URI']);

if ($table === 'products') {
    if ($method === 'GET' && $id === null) {
        echo json_encode(getAllProducts(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    } elseif ($method === 'GET' && $id !== null) {
        echo json_encode(getProductById($id), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    } elseif ($method === 'POST') {
        $raw = file_get_contents('php://input');
        $data = json_decode($raw, true);
        $newId = createProduct($data);
        http_response_code(201);
        echo json_encode(['message' => 'Product created', 'id' => $newId], JSON_PRETTY_PRINT);
    } elseif ($method === 'DELETE' && $id !== null) {
        deleteProduct($id);
        echo json_encode(['message' => "Deleted product $id"], JSON_PRETTY_PRINT);
    }
} elseif ($table === 'categories') {
    if ($method === 'GET' && $id === null) {
        echo json_encode(getAllCategories(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    } elseif ($method === 'GET' && $id !== null && $sub === 'products') {
        echo json_encode(getProductsByCategoryId($id), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}


