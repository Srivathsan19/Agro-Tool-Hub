<?php
include '../layouts/header.php';

if (!isset($_GET['view']) || strlen($_GET['view']) < 1 || !ctype_digit($_GET['view'])) {
    header('Location:./index.php');
    exit();
}
require_once '../libs/database.php';
require_once './class/Product.php';
require_once '../category/class/Category.php';
require_once '../sub-category/class/Subcategory.php';

//$product = Product::findAll();
if (isset($_GET['view'])) {
    $id = $_GET['view'];
    // print_r($id);die();
    $product = Product::find($id, $db);
    //$cat = Category::find($subcategory->category);

}

?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/users/">Product</a></li>
        <li class="breadcrumb-item active" aria-current="page">View Product</li>
    </ol>
</nav>

<div class="container-fluid">
    <div class="text-right my-2" id="msg"></div>
    <div class="card ">
        <div class="card-body">
            <form id="editSubcat" method="POST">
                <div class="form-group row text-dark">
                    <div class="form-group col-md-4">
                        <label class="col-form-label font-weight-bold">Product Name</label>

                        <input type="hidden" id="id" name="id" placeholder=""
                            value="<?php echo $subcategory->id ?>" /><input type="text" name="sub-category"
                            class="form-control  form-control-sm w-50" value="<?php echo $product->name ?>"
                            contenteditable="true">
                        <small id="subcatError" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="col-form-label font-weight-bold">Quantity</label>
                        <input type="text" name="sub-category" class="form-control  form-control-sm w-50"
                            value="<?php echo $product->quantity ?>" contenteditable="true">
                        <small id="subcatError" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group col-lg-4">
                        <label class="col-form-label font-weight-bold">Regular price</label>
                        <input type="text" name="sub-category" class="form-control  form-control-sm w-50"
                            value="<?php echo $product->regular_price ?>" contenteditable="true">
                        <small id="catError" class="form-text text-danger"></small>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="col-form-label font-weight-bold">Selling price</label>

                        <input type="text" name="sub-category" class="form-control  form-control-sm w-50"
                            value="<?php echo $product->sell_price ?>" contenteditable="true">
                        <small id="subcatError" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="col-form-label font-weight-bold">Category</label>
                        <input type="text" name="sub-category" class="form-control  form-control-sm w-50"
                            value="<?php echo Category::find($product->category, $db)->catname ?>" contenteditable="true">
                        <small id="subcatError" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group col-lg-4">
                        <label class="col-form-label font-weight-bold">Subcategory</label>
                        <input type="text" name="sub-category" class="form-control  form-control-sm w-50"
                            value="<?php echo Subcategory::find($product->subcategory, $db)->name ?>" contenteditable="true">
                        <small id="catError" class="form-text text-danger"></small>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="col-form-label font-weight-bold">Product Size</label>
                        <input type="text" name="sub-category" class="form-control  form-control-sm w-50"
                            value="<?php echo $product->product_size ?>" contenteditable="true">
                        <small id="subcatError" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="col-form-label font-weight-bold">Product color</label>

                        <input type="text" name="sub-category" class="form-control  form-control-sm w-50"
                            value="<?php echo $product->product_color ?>" contenteditable="true">
                        <small id="subcatError" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group col-lg-4">
                        <label class="col-form-label font-weight-bold">Brand</label>
                        <input type="text" name="sub-category" class="form-control  form-control-sm w-50"
                            value="<?php echo $product->brand ?>" contenteditable="true">
                        <small id="catError" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="col-form-label font-weight-bold">Status</label>

                        <input type="text" name="sub-category" class="form-control  form-control-sm w-50"
                            value="<?php echo $product->status ?>" contenteditable="true">
                        <small id="subcatError" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label font-weight-bold">Product Description</label>
                        <textarea class="form-control"><?php echo $product->description ?></textarea>
                        <small id="subcatError" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="col-form-label font-weight-bold">image1</label>
                        <a href="../product/<?php echo $product->image1 ?>" target="blank">view
                            image1</a>
                        <small id="subcatError" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group col-lg-4">
                        <label class="col-form-label font-weight-bold">image2</label>
                        <a href="../products/<?php echo $product->image2 ?>" target="blank">view
                            image2</a>
                        <small id="catError" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="col-form-label font-weight-bold">image3</label>
                        <a href="../product/<?php echo $product->image3 ?>" target="blank">view
                            image3</a>
                        <small id="subcatError" class="form-text text-danger"></small>
                    </div>

                </div>


            </form>
        </div>
    </div>
</div>

<?php include '../layouts/footer.php';?>