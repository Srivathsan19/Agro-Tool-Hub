<?php include '../layouts/header.php';
require '../libs/database.php';
if (isset($_POST['submit'])) {
    $error = '';
    $msg = '';
    if (strlen($_POST['pincode']) < 1) {
        $error = "please enter pincode ";
    } else {

        $pincode = $db->real_escape_string($_POST['pincode']);


        $sql = "INSERT INTO available_pincodes
                (pincode)
                values ('$pincode')";
        if ($db->query($sql) === true) {
            $msg = "Pincode added successfully";
        } else {
            $error = "Failed to add pincode Please check your details and try again";
        }
    }
}

?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/pincodes/">Pincode</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Pincode</li>
    </ol>
</nav>

<div class="container-fluid">

    <div class="card ">
        <div class="card-body">
        <?php if (isset($error) && strlen($error) > 1) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endif ?>

                    <?php if (isset($msg) && strlen($msg) > 1) : ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $msg; ?>
                        </div>
                    <?php endif ?>

                    <?php if (isset($_SESSION['error']) && strlen($_SESSION['error']) > 1) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $_SESSION['error'];
                            unset($_SESSION['error']) ?>
                        </div>
                    <?php endif ?>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                <div class="form-group row text-dark">
                    <div class="form-group col-md-6">
                        <label class="col-form-label font-weight-bold">Pincode</label>

                        <input type="text" id="pincode" name="pincode" class="form-control  form-control-sm w-50"
                            contenteditable="true">
                        <small id="categoryError" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group col-md-12 ">
                        <button type="submit" name="submit"  class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add Pincode
                        </button>
                    </div>
                </div>

            </form>
            <div id="msg"></div>
        </div>
    </div>
</div>

<?php include '../layouts/footer.php';?>

