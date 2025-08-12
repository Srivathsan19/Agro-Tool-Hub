<?php include '../layouts/header.php';
require '../libs/database.php';

$sql = "SELECT * FROM users";

$res = $db->query($sql);
$users = [];
while ($row = $res->fetch_object()) {
    $users[] = $row;
}




?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Users</li>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i= 0; foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo $i+1 ?></td>
                                <td><?php echo htmlspecialchars($user->name) ?></td>
                                <td><?php echo htmlspecialchars($user->email) ?></td> 
                                <td><?php echo htmlspecialchars($user->mobile) ?></td>
                                <td>
                                    <a href="" class="btn btn-info btn-sm"><i
                                            class="fa fa-eye"></i></a>
                                      

                                    <a onclick="return confirm('Are you sure to delete car data?')"
                                        href=""
                                        class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php $i++;endforeach;  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include '../layouts/footer.php'; ?>