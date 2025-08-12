<?php include '../layouts/header.php';
require_once '../libs/database.php';
require_once '../category/class/Category.php';

$categories = Category::findAll($db);

?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/users/">Subcategory</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Sub-category</li>
    </ol>
</nav>
<div class="container-fluid">
    <div class="text-right my-2" id="msg"></div>
    <div class="card ">
        <div class="card-body">
            <form id="formSubcat" method="POST">
                <div class="form-group row text-dark">
                    <div class="form-group col-md-6">
                        <label class="col-form-label font-weight-bold">Sub Category</label>

                        <input type="text" name="sub-category" class="form-control  form-control-sm w-50"
                            contenteditable="true">
                        <small id="subcatError" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group col-lg-3">
                        <label class="col-form-label font-weight-bold">Category</label>
                        <select class="form-control form-control-sm" name="category">
                            <option value="none">--select--</option>
                            <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category->id ?>"><?php echo $category->catname ?></option>
                            <?php endforeach?>
                        </select>
                        <small id="catError" class="form-text text-danger"></small>
                    </div>



                </div>
                <div class="text-center float-right mx-5">
                    <a class="btn btn-danger btn-sm" href="#" onclick="location.reload()" style="margin-top:-30px">
                        <i class="fa fa-redo-alt"></i> Reset Details
                    </a>
                    <button type="submit" class="btn btn-primary btn-sm" style="margin-top:-30px">
                        <i class="fas fa-plus"></i> Add Subcategory
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
<?php include '../layouts/footer.php';?>

<script>
const subcategoryError = document.querySelector('#subcatError');
const categoryError = document.querySelector('#catError');

const formSubcat = document.querySelector('#formSubcat');

formSubcat.addEventListener('submit', function(event) {
    event.preventDefault();

    let data = new FormData(this);
    clearErrorMessage();
    msg.innerHTML = '';
    fetch('./api/subcategory-api.php', {
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
                formSubcat.reset();
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
    subcategoryError.innerHTML = error.subcategoryName;
    categoryError.innerHTML = error.categoryName;

}

function clearErrorMessage() {
    subcategoryError.innerHTML = '';
    categoryError.innerHTML = '';

}
</script>