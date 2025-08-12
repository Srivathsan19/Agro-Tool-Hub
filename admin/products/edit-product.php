<?php include '../layouts/header.php';

require_once '../libs/database.php';
require_once '../category/class/Category.php';
require_once '../sub-category/class/Subcategory.php';
require_once './class/Product.php';

$categories = Category::findAll($db);
//$subcategories = Subcategory::findAll(db: $db);

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $product = Product::find($id, $db);
    //print_r($product);die;
}

?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/users/">Product</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
    </ol>
</nav>
<div class="container-fluid">
    <div class="text-right my-2" id="msg"></div>
    <div class="card ">

        <div class="card-body">

            <form id="editproductForm" enctype="multipart/form-data" method="POST">
                <div class="form-group row col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 ">
                    <label for="name" class="col-sm-12 col-lg-2 col-md-2 col-form-label text-dark">Product Name</label>
                    <div class="col-sm-8">
                        <input type="hidden" name="id" value="<?php echo $product->id ?>" class="form-control">
                        <input type="text" name="product-name" value="<?php echo $product->name ?>" class="form-control"
                            placeholder="Enter product name">
                        <small id="productnameError" class="form-text text-danger"></small>
                    </div>
                </div>
                <div class="form-group row col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 text-dark">
                    <label for="email" class="col-sm-12 col-lg-2 col-md-2 col-form-label">Product Description</label>
                    <div class="col-sm-8">
                        <textarea class="form-control"
                            name="description"><?php echo $product->description ?> </textarea>
                        <small id="descriptionError" class="form-text text-danger"></small>
                    </div>
                </div>
                <div class="form-group row col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 text-dark">
                    <label for="email" class="col-sm-12 col-lg-2 col-md-2 col-form-label">Quantity</label>
                    <div class="col-sm-8">
                        <input type="text" name="quantity" value="<?php echo $product->quantity ?>" class="form-control"
                            placeholder="Enter quantity">
                        <small id="quantityError" class="form-text text-danger"></small>
                    </div>
                </div>
                <div class="form-group row col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 text-dark">
                    <label for="name" class="col-sm-12 col-lg-2 col-md-2 col-form-label">Regular price</label>
                    <div class="col-sm-8">
                        <input type="text" name="regular-price" value="<?php echo $product->regular_price ?>"
                            class="form-control" placeholder="Enter regular price">
                        <small id="regularpriceError" class="form-text text-danger"></small>
                    </div>
                </div>
                <div class="form-group row col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 text-dark">
                    <label for="name" class="col-sm-12 col-lg-2 col-md-2 col-form-label">Sell price</label>
                    <div class="col-sm-8">
                        <input type="text" name="sell-price" value="<?php echo $product->sell_price ?>"
                            class="form-control" placeholder="Enter sell price">
                        <small id="sellpriceError" class="form-text text-danger"></small>
                    </div>
                </div>
                <div class="form-group row col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 text-dark">
                    <label for="name" class="col-sm-12 col-lg-2 col-md-2 col-form-label">Category</label>
                    <div class="col-sm-8">
                        <select id="dropdown-category" name="category" class="form-control">
                            <option value="none">--Select category--</option>
                            <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category->id ?>" <?php

if ($product->category == $category->id) {
    echo 'selected';
}
?>>
                                <?php echo $category->catname ?>
                            </option>

                            <?php endforeach?>
                        </select>
                        <small id="categoryError" class="form-text text-danger"></small>
                    </div>
                </div>

              
                <div class="form-group row col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 text-dark">
                    <label for="name" class="col-sm-12 col-lg-2 col-md-2 col-form-label">Product Warranty Period</label>
                    <div class="col-sm-8">
                        <input type="text" name="product-size" value="<?php echo $product->product_size ?>"
                            class="form-control" id="" placeholder="Enter product Warranty Period">
                        <small id="productsizeError" class="form-text text-danger"></small>
                    </div>
                </div>
                <div class="form-group row col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 text-dark">
                    <label for="name" class="col-sm-12 col-lg-2 col-md-2 col-form-label">Product color</label>
                    <div class="col-sm-8">
                        <input type="text" name="product-color" value="<?php echo $product->product_color ?>"
                            class="form-control" placeholder="Enter product color">
                        <small id="productcolorError" class="form-text text-danger"></small>
                    </div>
                </div>
                <div class="form-group row col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 text-dark">
                    <label for="name" class="col-sm-12 col-lg-2 col-md-2 col-form-label">Product image1</label>
                    <div class="col-sm-8">
                        <input type="file" name="image1" class="form-control">
                        <small id="image1Error" class="form-text text-danger"></small>
                    </div>
                </div>
                <div class="form-group row col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 text-dark">
                    <label for="name" class="col-sm-12 col-lg-2 col-md-2 col-form-label">Product image2</label>
                    <div class="col-sm-8">
                        <input type="file" name="image2" class="form-control">
                        <small id="image2Error" class="form-text text-danger"></small>
                    </div>
                </div>
                <div class="form-group row col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 text-dark">
                    <label for="name" class="col-sm-12 col-lg-2 col-md-2 col-form-label">Product image3</label>
                    <div class="col-sm-8">
                        <input type="file" name="image3" class="form-control">
                        <small id="image3Error" class="form-text text-danger"></small>
                    </div>
                </div>
                <div class="form-group row col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 text-dark">
                    <label for="name" class="col-sm-12 col-lg-2 col-md-2 col-form-label">Brand</label>
                    <div class="col-sm-8">
                        <input type="text" name="brand" value="<?php echo $product->brand ?>" class="form-control"
                            placeholder="Enter brand">
                        <small id="brandError" class="form-text text-danger"></small>
                    </div>
                </div>
                <div class="form-group row col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 text-dark">
                    <label for="name" class="col-sm-12 col-lg-2 col-md-2 col-form-label">Status</label>
                    <div class="col-sm-8">
                        <select id="avail" name="status" class="form-control">
                            <option value="none">--select--</option>

                            <option <?php echo $product->status == 0 ? 'selected' : null ?> value="0">Unavailable
                            </option>
                            <option <?php echo $product->status == 1 ? 'selected' : null ?> value="1">Available</option>


                        </select>
                        <small id="statusError" class="form-text text-danger"></small>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-lg btn-primary">Edit Product</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../layouts/footer.php';?>

<script>
const productnameError = document.querySelector('#productnameError');
const descriptionError = document.querySelector('#descriptionError');
const quantityError = document.querySelector('#quantityError');
const regularpriceError = document.querySelector('#regularpriceError');
const sellpriceError = document.querySelector('#sellpriceError');
const categoryError = document.querySelector('#categoryError');
//const subcategoryError = document.querySelector('#subcategoryError');
const productsizeError = document.querySelector('#productsizeError');
const productcolorError = document.querySelector('#productcolorError');
const image1Error = document.querySelector('#image1Error');
const image2Error = document.querySelector('#image2Error');
const image3Error = document.querySelector('#image3Error');
const brandError = document.querySelector('#brandError');
const statusError = document.querySelector('#statusError');

const editproductForm = document.querySelector('#editproductForm');

editproductForm.addEventListener('submit', function(event) {
    event.preventDefault();

    let data = new FormData(this);
    clearErrorMessage();
    msg.innerHTML = '';
    fetch('./api/edit-product-api.php', {
            method: 'POST',
            body: data
        })
        .then(res => {
            if (res.status == 200) {

                res.json().then(json => {
                    console.log(json);
                    msg.innerHTML =
                        '<div class="alert alert-success"><strong><i class="fa fa-check"></i> Success! </strong>' +
                        json.msg + '</div>'
                })
                editproductForm.reset();
            } else {
                res.json().then(json => {
                    if (json.errors) displayErrors(json.errors);
                    msg.innerHTML =
                        '<div class="alert alert-danger"><strong><i class="fa fa-times"></i> Failed! </strong>' +
                        json.msg + '</div>'
                })
            }
        })
        .catch(error => {
            console.error(error);
        })
})



function displayErrors(error) {
    productnameError.innerHTML = error.productName;
    descriptionError.innerHTML = error.description;
    quantityError.innerHTML = error.quantity;
    regularpriceError.innerHTML = error.regularPrice;
    sellpriceError.innerHTML = error.sellPrice;
    categoryError.innerHTML = error.category;
    //subcategoryError.innerHTML = error.subcategory;
    productsizeError.innerHTML = error.productSize;
    productcolorError.innerHTML = error.productColor;
    image1Error.innerHTML = error.image1;
    image2Error.innerHTML = error.image2;
    image3Error.innerHTML = error.image3;
    brandError.innerHTML = error.brand;
    statusError.innerHTML = error.status;


}

function clearErrorMessage() {
    productnameError.innerHTML = '';
    descriptionError.innerHTML = '';
    quantityError.innerHTML = '';
    regularpriceError.innerHTML = '';
    sellpriceError.innerHTML = '';
    categoryError.innerHTML = '';
    //subcategoryError.innerHTML = '';
    productsizeError.innerHTML = '';
    productcolorError.innerHTML = '';
    image1Error.innerHTML = '';
    image2Error.innerHTML = '';
    image3Error.innerHTML = '';
    brandError.innerHTML = '';
    statusError.innerHTML = '';



}
</script>