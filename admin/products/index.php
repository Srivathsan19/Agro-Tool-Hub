<?php include '../layouts/header.php';

require '../libs/database.php';
require_once '../sub-category/class/Subcategory.php';
require_once '../category/class/Category.php';
require_once './class/Product.php';

$products = Product::findAll($db);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $product_to_delete = Product::delete($id, $db);
    if ($product_to_delete) {
        $msg = "Product Deleted";
    } else {
        $error = "Failed to delete Product ";
    }
}


?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Products</li>
    </ol>
    <?php if (isset($error) && strlen($error) > 1): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error; ?>
    </div>
    <?php endif?>
    <?php if (isset($msg) && strlen($msg) > 1): ?>
    <div class="alert alert-success" role="alert">
        <strong><i class="fas fa-check"></i> Success! </strong>
        <?php echo $msg; ?>
    </div>
    <?php endif?>
</nav>
<div class="container-fluid">
    <div class="col-lg-4 my-3">
        <a class="btn btn-sm btn-primary mr-2" href="./add-product.php"> <i class="fas fa-user"></i> Add New Product
        </a>

    </div>

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
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Sell Price</th>
                            <th>Category</th>
                            
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; foreach ($products as $product): ?>
                        <tr>
                            <td><?php echo $i+1 ?></td>
                            <td><?php echo $product->name ?></td>
                            <td><?php echo $product->quantity ?></td>
                            <td><?php echo $product->sell_price ?></td>
                            <td><?php echo (Category::find($product->category, $db) !== false) ? Category::find($product->category, $db)->catname : ''; ?></td>
                           
                            <td><?php echo $product->created_at ?></td>
                            <td>
                                <a class="btn btn-outline-primary btn-sm"
                                    href="<?php echo ROOT ?>/products/view-product.php?view=<?php echo $product->id ?>">
                                    <i class="fa fa-eye"></i></a>
                                <a class="btn btn-outline-info btn-sm"
                                    href="<?php echo ROOT ?>/products/edit-product.php?edit=<?php echo $product->id ?>">
                                    <i class="fa fa-edit"></i></a>
                                    <a class="btn btn-outline-danger btn-sm"
                                    onclick="return confirm('Are you sure to delete')"
                                    href="<?php echo $_SERVER['PHP_SELF'] ?>?delete=<?php echo $product->id ?>">
                                    <i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                    <?php $i++; endforeach?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include '../layouts/footer.php';?>