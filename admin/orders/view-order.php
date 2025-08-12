<?php include '../layouts/header.php';
require '../libs/database.php';

$id = filter_var($_GET['id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$id = $db->real_escape_string($id);



$sql = "SELECT 
    o.*, 
    od.* ,
    p.name AS product_name,
    ot.name,
    u.name AS customer_name
FROM 
    `order` o 
LEFT JOIN 
    `order_detail` od ON o.id = od.order_id 
LEFT JOIN 
    `product` p ON p.id = od.product_id    
LEFT JOIN 
    `order_status` ot ON o.order_status = ot.id   
    LEFT JOIN 
      `users` u ON o.user_id = u.id            
WHERE 
    o.id = '$id'";

//echo $sql;die;

$res = $db->query($sql);
$data = $res->fetch_object();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form submission
    if (isset($_POST['order_status'])) {
        $order_id = $_POST["order_id"];

        $order_status = $_POST["order_status"];
        //print_r($order_status);die;
        $sql = " UPDATE `order` SET order_status = '$order_status' WHERE id = '$order_id'";
        //echo $sql;die;
        if ($db->query($sql) === true) {
            echo "<script>alert('Order status updated successfully'); window.location.href = './index.php';</script>";
        } else {
            echo "<script>alert('Unable to update status');</script>";
        }

    }
}



?>
<div class="container-fluid">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><a href="">Dashboard</a> / View Order </li>
    </ol>
    <div class="card">
        <div class="card-header">
            Order details
        </div>
        <div class="card-body">
            <table class="table tabled-bordered">
                <tr>
                    <td><strong>Order Status:</strong></td>
                    <?php $data->name == 'Pending' ? $labelColor = 'info' : $labelColor = 'success' ?>
                    <td><span class="badge badge-<?php echo $labelColor ?>"><?php echo $data->name ?></span>
                    </td>

                    <td><strong>Order Id: </strong><?php echo htmlspecialchars('order-' . $data->id) ?></td>
                    <td><strong>Customer Name: </strong><?php echo htmlspecialchars($data->customer_name) ?></td>

                </tr>
                <tr>
                    <td><strong>Address.: </strong><?php echo htmlspecialchars($data->address) ?></td>
                    <td><strong>City: </strong><?php echo htmlspecialchars($data->city) ?></td>
                    <td><strong>Pin: </strong><?php echo htmlspecialchars(($data->pincode)) ?></td>


                </tr>

                <tr>
                    <td><strong>Payment Type.: </strong><?php echo htmlspecialchars($data->payment_type) ?></td>
                    <td><strong>Transaction Id.: </strong><?php echo htmlspecialchars($data->txnid) ?></td>

                    <?php $data->payment_status == 'sucess' ? $labelColor = 'info' : $labelColor = 'success' ?>
                    <td>Payment Status: <span
                            class="badge badge-<?php echo $labelColor ?>"><?php echo $data->payment_status ?></span>
                    </td>


                </tr>

            </table>
        </div>
    </div>
    <div class="card mt-2">
        <div class="card-header">
            Product details
        </div>
        <div class="card-body">
            <table class="table tabled-bordered">
                <tr>

                    <td><strong>Product Name: </strong><?php echo htmlspecialchars($data->product_name) ?></td>
                    <td><strong>Quantity: </strong><?php echo htmlspecialchars($data->qty) ?></td>
                    <td><strong>Total Amount.: </strong><?php echo htmlspecialchars($data->total_price) ?></td>

                </tr>

            </table>
        </div>
    </div>
    <div class="card m-5">
        <div class="card-body">
            <form method="POST" action="view-order.php">
                <div class="form-row">
                    <div class="form-group col-lg-12">
                        <h6>Status</h6>
                    </div>
                </div>
                <input type="hidden" name="order_id" value="<?php echo $id ?>">
                <div class="form-row">
                    <div class="form-group col-lg-8">
                        <select class="form-control" name="order_status">
                            <option value="1" <?php if ($data->name === 'Pending')
                                echo 'selected'; ?>>
                                Pending</option>
                            <option value="2" <?php if ($data->name === 'Processing')
                                echo 'selected'; ?>>Processing
                            </option>
                            <option value="3" <?php if ($data->name === 'Shipped')
                                echo 'selected'; ?>>Shipped</option>
                            <option value="4" <?php if ($data->name === 'Cancelled')
                                echo 'selected'; ?>>Cancelled</option>
                            <option value="5" <?php if ($data->name === 'Complete')
                                echo 'selected'; ?>>Complete</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-4">
                        <button type="submit" class="btn btn-primary ">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>

<?php include '../layouts/footer.php'; ?>