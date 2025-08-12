<?php
function pr($arr)
{
    echo '<pre>';
    print_r($arr);
}

function prx($arr)
{
    echo '<pre>';
    print_r($arr);
    die();
}

function get_safe_value($con, $str)
{
    if ($str != '') {
        $str = trim($str);
        return mysqli_real_escape_string($con, $str);
    }
}

function get_product($con, $limit = '', $cat_id = '', $product_id = '')
{
    $sql = "select product.*,category.catname from product,category where product.status=1 ";

    if ($cat_id != '') {
        $sql .= " and product.category=$cat_id ";
    }
    if ($product_id != '') {
        $sql .= " and product.id=$product_id ";
    }
    $sql .= " and product.category=category.id ";

    $sql .= " order by product.id desc";
    if ($limit != '') {
        $sql .= " limit $limit";
    }
 
   // echo $sql;die;
    $res = mysqli_query($con, $sql);
    //print_r($res);die;
    $data = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }
    //print_r($data);die;
    return $data;
}
?>