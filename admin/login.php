<?php
ini_set('display_errors', 1);
session_start();
require_once './libs/database.php';



if (isset($_POST['submit'])) {
    $error = '';
    if (strlen($_POST['username']) < 1) {
        $error = 'Please enter username';
    } else if (strlen($_POST['password']) < 1) {
        $error = 'Please enter password';
    } else {
        $username = $db->real_escape_string($_POST['username']);
        $password = $db->real_escape_string($_POST['password']);

        $sql = "SELECT username, password, name,role FROM admin_users WHERE username = '$username'";
        $res = $db->query($sql);
        if ($res->num_rows < 1) {
            $error = 'No user found';
        } else {
            $user = $res->fetch_object();
            if (password_verify($password, $user->password)) {
                $_SESSION['user'] = $user->username;
                $_SESSION['name'] = $user->name;
                $_SESSION['role'] = $user->role;
                header('Location: dashboard.php');
                exit();
            } else {
                $error = 'Wrong username or password';
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login | Agro Tools Hub</title>


    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <h1 class="text-white text-center font-weight-bold" style="margin-top:20%; font-size:50px ">
                    Agro Tools Hub</h1>
                <div class="card o-hidden border-0 shadow-lg" style="margin-top:5%">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">PLEASE LOGIN</h1>
                                    </div>
                                    <form class="user" id="formLogin" method="post"
                                        action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                        <div class="form-group">
                                            <label for="">Username</label>
                                            <input id="username" name="username" type="text"
                                                class="form-control  form-control-sm form-control-sm"
                                                placeholder="Enter Username">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input id="password" name="password" type="password"
                                                class="form-control form-control-sm" placeholder="Enter Password">
                                        </div>
                                        <button type="submit" name="submit" id="btn-submit"
                                            class="btn btn-success btn-sm btn-block font-weight-bold mt-4">
                                            Login
                                        </button>

                                        <hr>

                                    </form>
                                    <?php if (isset($error) && strlen($error) > 1): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $error; ?>
                                    </div>
                                    <?php endif?>

                                    <?php if (isset($_SESSION['error']) && strlen($_SESSION['error']) > 1): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $_SESSION['error'];
unset($_SESSION['error']) ?>
                                    </div>
                                    <?php endif?>
                                    <div id="msg"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

<!-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
 <script>
//const host = "localhost";
const formLogin = document.getElementById('formLogin');

formLogin.addEventListener('submit', function(e) {
    e.preventDefault();

    let username = document.getElementById('username');

    let password = document.getElementById('password');

    let msgArea = document.getElementById('msg');

    let submitBtn = document.getElementById('btn-submit');

    submitBtn.innerHTML = 'PLEASE WAIT...';

    var params = new URLSearchParams();
    params.append('username', username.value);
    params.append('password', password.value);

    axios.post('./auth/login.php', params)
        .then(function(response) {
            console.log(response.data.msg);
            if (response.data.status !== 'success') {
                submitBtn.innerHTML = 'SIGN IN';
                msgArea.innerHTML = ` <div class="alert alert-danger alert-fill-danger" role="alert">
                                              <i class="mdi mdi-alert-circle"></i>
                                              ${response.data.msg}
                                            </div>`;
                return;
            }

            window.location = './dashboard.php';
        })
        .catch(function(error) {
            submitBtn.innerHTML = 'SIGN IN';
            console.log(error);
        });
})
</script> -->