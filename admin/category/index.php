<?php 
ini_set('display_errors', 1);
include '../layouts/header.php';

require '../libs/database.php';
require './class/Category.php';

$categories = Category::findAll($db);
//print_r($categories);die();
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $category_to_delete = Category::delete($id, $db);
    if ($category_to_delete) {
        $msg = "Category Deleted";
    } else {
        $error = "Failed to delete Category ";
    }
}

?>



<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Categories</li>
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
        <a class="btn btn-sm btn-primary mr-2" href="./add-category.php"> <i class="fas fa-user"></i> Add New Category
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
                            <th>Category Name</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;foreach ($categories as $category): ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $category->catname ?></td>
                            <td><?php echo $category->created_at ?></td>
                            <td>
                                <a class="btn btn-outline-primary btn-sm"
                                    href="<?php echo ROOT ?>/category/edit-category.php?edit=<?php echo $category->id ?>">
                                    <i class="fa fa-edit"></i></a>
                                <a class="btn btn-outline-danger btn-sm"
                                    onclick="return confirm('Are you sure to delete')"
                                    href="<?php echo $_SERVER['PHP_SELF'] ?>?delete=<?php echo $category->id ?>">
                                    <i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                    <?php $i++;endforeach?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include '../layouts/footer.php';?>