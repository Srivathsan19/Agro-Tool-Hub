<?php include '../layouts/header.php';
require_once '../libs/database.php';

require_once './class/Category.php';

$category = new Category();

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $category = Category::find($id, $db);
    //print_r($category->name);

}

?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/users/">Category</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
    </ol>
</nav>

<div class="container-fluid">

    <div class="card ">
        <div class="card-body">
            <form id="editCategory" method="POST">
                <div class="form-group row text-dark">
                    <div class="form-group col-md-6">
                        <label class="col-form-label font-weight-bold">Category</label>
                        <input type="hidden" id="id" name="id" placeholder="" value="<?php echo $category->id ?>" />
                        <input type="text" id="category" name="category" value="<?php echo $category->catname ?>"
                            class="form-control  form-control-sm w-50" contenteditable="true">
                        <small id="categoryError" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group col-md-12 ">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Edit Category
                        </button>
                    </div>
                </div>

            </form>
            <div id="msg"></div>
        </div>
    </div>
</div>

<?php include '../layouts/footer.php';?>

<script>
const categoryError = document.querySelector('#categoryError');

const editCategory = document.querySelector('#editCategory');

editCategory.addEventListener('submit', function(event) {
    event.preventDefault();

    let data = new FormData(this);
    clearErrorMessage();
    msg.innerHTML = '';
    fetch('./api/edit-category-api.php', {
            method: 'POST',
            body: data
        })
        .then(res => {
            if (res.status == 200) {
                res.json().then(json => {

                    msg.innerHTML =
                        '<div class="alert alert-success"><strong><i class="fa fa-check"></i> Success! </strong>' +
                        json.msg + '</div>'
                })
                formCategory.reset();
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
    categoryError.innerHTML = error.categoryName;
}

function clearErrorMessage() {
    categoryError.innerHTML = '';

}
</script>