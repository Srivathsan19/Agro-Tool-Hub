<?php include '../layouts/header.php';
require '../libs/database.php';

$sql = "
SELECT    
            l.*,
            
            p.name AS product_name
        FROM 
            `lendings` l
     
        JOIN 
            `product` p ON l.product_id = p.id

";

//echo $sql;die;
$res = $db->query($sql);
$lendings = [];
while ($row = $res->fetch_object()) {
    $lendings[] = $row;
}

//print_r($orders);die;


?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Lendings</li>
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
                            <th>Lending Id</th>
                            <th>Product Name</th>

                            <th>Total Price</th>
                         
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i= 0; foreach ($lendings as $order): ?>
                            <tr>
                                <td><?php echo $i+1 ?></td>
                                <td><?php echo htmlspecialchars('order'.$order->lending_id) ?></td>
                                <td><?php echo htmlspecialchars($order->product_name) ?></td>
                               
                            
                                <td> <?php echo htmlspecialchars($order->amount) ?></td>
                                
                                
                            </tr>
                        <?php $i++;endforeach;  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include '../layouts/footer.php'; ?>