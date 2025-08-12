<?php

require '../../libs/database.php';
require '../class/Subcategory.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(400);
    echo 'Method not allowed';
    return;
}

$isError = false;
$errors = [
    "subcategoryName" => "",
    "categoryName" => "",
];

if (empty($_POST['sub-category'])) {
    $isError = true;
    $errors['subcategoryName'] = 'please enter subcategory';
}

if ($_POST['category'] == 'none') {
    $isError = true;
    $errors['categoryName'] = 'please select category';
}

if ($isError) {
    http_response_code(400);
    $payload = json_encode(['msg' => 'Correct the following fields', 'errors' => $errors]);
    echo $payload;
    return;
}

$subcategory = $_POST['sub-category'];
$category = $_POST['category'];

$subcat = new Subcategory([
    'subcategory' => $subcategory,
    'category' => $category,
], $db);
$s = $subcat->save();
http_response_code(200);
echo json_encode(['msg' => 'Sub Category Added Successfully']);