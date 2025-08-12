<?php include '../layouts/header.php';
require '../libs/database.php';

$sql = "
SELECT 
            o.*,
            od.*,
            p.name AS product_name,
            ot.name 
        FROM 
            `order` o
        JOIN 
            `order_detail` od ON o.id = od.order_id
        JOIN 
            `product` p ON od.product_id = p.id
         JOIN 
            `order_status` ot ON o.order_status = ot.id    

";

$res = $db->query($sql);
$orders = [];
while ($row = $res->fetch_object()) {
    $orders[] = $row;
}

//print_r($orders);die;


?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Orders</li>
    </ol>
</nav>
<div class="container-fluid">


    <div id="msg">

    </div>
    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-hover table-sm text-center text-dark"
                    width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sl.no</th>
                            <th>Order Id</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i= 0; foreach ($orders as $order): ?>
                            <tr>
                                <td><?php echo $i+1 ?></td>
                                <td><?php echo htmlspecialchars('order'.$order->order_id) ?></td>
                                <td><?php echo htmlspecialchars($order->product_name) ?></td>
                               
                                <td><?php echo htmlspecialchars($order->qty) ?></td>
                                <td> <?php echo htmlspecialchars($order->total_price) ?></td>
                                <?php $order->name == 'Pending' ? $labelColor = 'info' : $labelColor = 'success' ?>
                    <td><span class="badge badge-<?php echo $labelColor ?>"><?php echo $order->name ?></span>
                    </td>
                                <td>
                                    <a href="./view-order.php?id=<?php echo $order->id ?>" class="btn btn-info btn-sm"><i
                                            class="fa fa-eye"></i></a>
                            </tr>
                        <?php $i++;endforeach;  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include '../layouts/footer.php'; ?>