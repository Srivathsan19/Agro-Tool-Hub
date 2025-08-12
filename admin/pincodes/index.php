<?php include '../layouts/header.php';
require '../libs/database.php';


if (isset($_GET['delete'])) {
    $id = $db->real_escape_string($_GET['delete']);
    $sql = "SELECT * from available_pincodes WHERE id = '$id'";
    $res = $db->query($sql);

    if ($res->num_rows < 1) {
        header('Location:' . $_SERVER['PHP_SELF']);
        exit();
    }

    $sql = "DELETE FROM available_pincodes WHERE id = '$id'";
    if ($db->query($sql) === true) {
        $msg = "Pin deleted";
    } else {
        $error = "Can not delete pin";
    }
}



$sql = "SELECT * FROM available_pincodes ORDER BY id DESC";
$res = $db->query($sql);
$pins = [];
while ($row = $res->fetch_object()) {
    $pins[] = $row;
}


?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pincodes</li>
    </ol>
</nav>

<div class="container-fluid">
<div class="col-lg-4 my-3">
        <a class="btn btn-sm btn-primary mr-2" href="./add-pincode.php"> <i class="fas fa-user"></i> Add New pincode
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
                            <th>Pincode</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0; foreach ($pins as $pin): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($i+1) ?></td>
                                <td><?php echo htmlspecialchars($pin->pincode) ?></td>
                      
                                <td>
                             
                                    <a onclick="return confirm('Are you sure to delete pincode data?')"
                                        href="<?php echo $_SERVER['PHP_SELF'] ?>?delete=<?php echo $pin->id ?>"
                                        class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php $i++; endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include '../layouts/footer.php'; ?>