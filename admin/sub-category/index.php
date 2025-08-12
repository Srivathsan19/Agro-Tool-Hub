<?php include '../layouts/header.php';

require '../libs/database.php';
require './class/Subcategory.php';
require_once '../category/class/Category.php';

$subcategories = Subcategory::findAll($db);
//print_r($subcategories);die();

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $subcategory_to_delete = Subcategory::delete($id, $db);
    if ($subcategory_to_delete) {
        $msg = "Subcategory Deleted";

    } else {
        $error = "Failed to delete Subcategory ";
    }
}
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Sub-Categories</li>
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
        <a class="btn btn-sm btn-primary mr-2" href="./add-subcat.php"> <i class="fas fa-user"></i> Add New Sub-Category
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
                            <th>Sub-Category Name</th>
                            <th>Category</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($subcategories as $subcategory): ?>
                        <tr>
                            <td></td>
                            <td><?php echo $subcategory->name ?></td>
                            <td><?php echo Category::find($subcategory->category, $db)->catname ?></td>
                            <td><?php echo $subcategory->created_at ?></td>
                            <td>
                                <a class="btn btn-outline-primary btn-sm"
                                    href="<?php echo ROOT ?>/sub-category/edit-subcategory.php?edit=<?php echo $subcategory->id ?>">
                                    <i class="fa fa-edit"></i></a>

                                <a class="btn btn-outline-danger btn-sm"
                                    onclick="return confirm('Are you sure to delete')"
                                    href="<?php echo $_SERVER['PHP_SELF'] ?>?delete=<?php echo $subcategory->id ?>">
                                    <i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                    <?php endforeach?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include '../layouts/footer.php';?>