<?php

require '../../libs/database.php';
require '../class/Product.php';


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(400);
    echo 'Method not allowed';
    return;
}

$isError = false;
$errors = [
    "productName" => "",
    "description" => "",
    "quantity" => "",
    "regularPrice" => "",
    "sellPrice" => "",
    "category" => "",
    //"subcategory" => "",
    "productSize" => "",
    "productColor" => "",
    "image1" => "",
    "image2" => "",
    "image3" => "",
    "brand" => "",
    "status" => "",
];

if (strlen($_POST['product-name']) < 1) {
    $isError = true;
    $errors['productName'] = 'please enter product name';
}

if (empty($_POST['description'])) {
    $isError = true;
    $errors['description'] = 'please enter product description';
}

if (empty($_POST['quantity'])) {
    $isError = true;
    $errors['quantity'] = 'please enter product quantity';
}

if (empty($_POST['regular-price'])) {
    $isError = true;
    $errors['regularPrice'] = 'please enter product regular price';
}

if (empty($_POST['sell-price'])) {
    $isError = true;
    $errors['sellPrice'] = 'please enter product selling price';
}

if ($_POST['category'] == 'none') {
    $isError = true;
    $errors['category'] = 'please select category';
}

/*if ($_POST['subcategory'] == 'none') {
    $isError = true;
    $errors['subcategory'] = 'please select subcategory';
}*/
if (empty($_POST['product-size'])) {
    $isError = true;
    $errors['productSize'] = 'please enter product size';
}
if (empty($_POST['product-color'])) {
    $isError = true;
    $errors['productColor'] = 'please enter product color';
}

if (empty($_POST['brand'])) {
    $isError = true;
    $errors['brand'] = 'please enter brand';
}

if ($_POST['status'] == 'none') {
    $isError = true;
    $errors['status'] = 'please select status';
}

# File validation
$allowedExts = ['png', 'jpeg', 'jpg', 'webp'];
$maxAllowedSize = 1024 * 100; #100KB

if ($_FILES['image1']['error'] == 4) {
    $isError = true;
    $errors['image1'] = 'Please select first image';
} else {
    if (
        !in_array(
            strtolower(pathinfo($_FILES['image1']['name'], PATHINFO_EXTENSION)),
            $allowedExts
        )
    ) {
        $isError = true;
        $errors['image1'] = 'Invalid file format for first image (jpg, jpeg, png only)';
    }

    if ($_FILES['image1']['size'] > $maxAllowedSize) {
        $isError = true;
        $errors['image1'] = 'first image size is too large (MAX 100KB)';
    }
}

if ($_FILES['image2']['error'] == 4) {
    $isError = true;
    $errors['image2'] = 'Please select second image';
} else {
    if (
        !in_array(
            strtolower(pathinfo($_FILES['image2']['name'], PATHINFO_EXTENSION)),
            $allowedExts
        )
    ) {
        $isError = true;
        $errors['image2'] = 'Invalid file format for second image (jpg, jpeg, png only)';
    }

    if ($_FILES['image2']['size'] > $maxAllowedSize) {
        $isError = true;
        $errors['image2'] = 'second image size is too large (MAX 100KB)';
    }
}

if ($_FILES['image3']['error'] == 4) {
    $isError = true;
    $errors['image3'] = 'Please select third image';
} else {
    if (
        !in_array(
            strtolower(pathinfo($_FILES['image3']['name'], PATHINFO_EXTENSION)),
            $allowedExts
        )
    ) {
        $isError = true;
        $errors['image3'] = 'Invalid file format for third image (jpg, jpeg, png only)';
    }

    if ($_FILES['image3']['size'] > $maxAllowedSize) {
        $isError = true;
        $errors['image3'] = 'third image size is too large (MAX 100KB)';
    }
}

if ($isError) {
    http_response_code(400);
    $payload = json_encode(['msg' => 'Correct the following fields', 'errors' => $errors]);
    echo $payload;
    return;
}

$productname = $_POST['product-name'];
$description = $_POST['description'];

$quantity = $_POST['quantity'];
$regularprice = $_POST['regular-price'];

$sellprice = $_POST['sell-price'];
$category = $_POST['category'];
//$subcategory = $_POST['subcategory'];
$productsize = $_POST['product-size'];
$productcolor = $_POST['product-color'];

$brand = $_POST['brand'];
$status = $_POST['status'];

# File path and extension
$image1Ext = pathinfo($_FILES['image1']['name'], PATHINFO_EXTENSION);
$image2Ext = pathinfo($_FILES['image2']['name'], PATHINFO_EXTENSION);
$image3Ext = pathinfo($_FILES['image3']['name'], PATHINFO_EXTENSION);
$image1Path = '../../uploaded-files/product/' . md5(time()) . '.' . $image1Ext;
$image2Path = '../../uploaded-files/product/' . md5(time() + 100000) . '.' . $image2Ext;
$image3Path = '../../uploaded-files/product/' . md5(time() + 200000) . '.' . $image3Ext;

try {
    $db->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);

    $product = new Product([
        'productname' => $productname,
        'description' => $description,
        'quantity' => $quantity,
        'regular-price' => $regularprice,
        'sell-price' => $sellprice,
        'category' => $category,
        //'subcategory' => $subcategory,
        'product-size' => $productsize,
        'product-color' => $productcolor,
        'image1' => $image1Path,
        'image2' => $image2Path,
        'image3' => $image3Path,
        'brand' => $brand,
        'status' => $status,
    ], $db);

    $product->save();


    if (!move_uploaded_file($_FILES['image1']['tmp_name'], $image1Path)) {
        throw new Exception('Failed move image1 file');
    }

    if (!move_uploaded_file($_FILES['image2']['tmp_name'], $image2Path)) {
        throw new Exception('Failed move image2 file');
    }

    if (!move_uploaded_file($_FILES['image3']['tmp_name'], $image3Path)) {
        throw new Exception('Failed move image3 file');
    }

    $db->commit();
    http_response_code(200);
    echo json_encode(['msg' => "product upload successfull"]);
} catch (Exception $e) {
    $db->rollback();

    if (file_exists($image1Path)) {
        unlink($image1Path);
    }

    if (file_exists($image2Path)) {
        unlink($image2Path);
    }
    if (file_exists($image3Path)) {
        unlink($image3Path);
    }

    http_response_code(500);
    echo json_encode(['msg' => 'failed to upload product, please try again ']);
}