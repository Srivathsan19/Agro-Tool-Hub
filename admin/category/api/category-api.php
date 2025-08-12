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

$cat = new Category([
    'category' => $category,
], $db);

$s = $cat->save();

http_response_code(200);
echo json_encode(['msg' => 'Category Added Successfully']);

/*
$sale = new Sale($sale_data);

try{
$sale->save();
echo "Passed: Sale save".PHP_EOL;
} catch(Exception $e){
echo $e->getMessage();
echo "Failed: Sale save".PHP_EOL;
}
 */