<?php
require_once '../../libs/database.php';


$cat = $_POST['category_id'];

$sql = "SELECT * FROM subcategory WHERE category = '$cat'";

$res = $db->query($sql);
while ($row = mysqli_fetch_object($res)) {
    $subcatories[] = $row;
}

//print_r($subcatories);die();
echo json_encode($subcatories);