<?php
require '../../libs/database.php';
require '../class/Category.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(400);
    echo 'Method not allowed';
    return;
}

$isError = false;
$errors = [
    "categoryName" => "",
];

if (empty($_POST['category'])) {
    $isError = true;
    $errors['categoryName'] = 'please enter category';
}

if ($isError) {
    http_response_code(400);
    $payload = json_encode(['msg' => 'Correct the following fields', 'errors' => $errors]);
    echo $payload;
    return;
}

$category = $_POST['category'];
$id = $_POST['id'];

$cat = new Category([
    'category' => $category,
], $db);

$s = $cat->update($id);
http_response_code(200);
echo json_encode(['msg' => 'Category Updated Successfully']);