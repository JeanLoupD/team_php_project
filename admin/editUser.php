<?php
include_once "../controller/AdminController.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Profile</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</head>
<body class="bg-secondary">

<!-- Wrapper -->
<div class="content-wrapper" style="margin-top: 35px;">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h4 class="card-header">User Details</h4>
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <!-- Show Picture -->
                            <img src="./image/<?php echo $_SESSION['pic']; ?>" alt="user-avatar" class="d-block rounded" id="uploadedAvatar" width="100" height="100">
                            <div class="button-wrapper">
                                <!-- Start Of Form -->
                                <form id="formAccountSettings" method="POST" action="#" enctype="multipart/form-data">
                                    <!-- Upload Input-->
                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Upload new photo</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" id="upload" class="account-file-input" accept="image/png, image/jpeg" hidden="" name="userPic"
                                               onchange="document.getElementById('uploadedAvatar').src = window.URL.createObjectURL(this.files[0])">
                                    </label>
                                    <p class="text-muted mb-0">Allowed JPG, GIF or PNG.</p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                        <div class="row">
                            <!-- First Name -->
                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">First Name</label>
                                <input class="form-control" type="text" id="firstName"
                                       name="firstName" <?php echo 'value="'.$_SESSION['firstName'].'"'; ?> autocomplete="off">
                            </div>
                            <!-- Last Name -->
                            <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input class="form-control" type="text" name="lastName" id="lastName" <?php echo 'value="'.$_SESSION['lastName'].'"'; ?> autocomplete="off">
                            </div>
                            <!-- Username -->
                            <div class="mb-3 col-md-6">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" <?php echo 'value="'.$_SESSION['username'].'"'; ?> autocomplete="off">
                            </div>
                            <!-- Email Name -->
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input class="form-control" type="text" id="email" name="email" <?php echo 'value="'.$_SESSION['email'].'"'; ?> autocomplete="off">
                            </div>
                            <!--Password -->
                            <div class="mb-3 col-md-6">
                                <label for="Password" class="form-label">Password</label>
                                <input type="text" class="form-control" id="Password" name="Pwd" <?php echo 'value="'.$_SESSION['password'].'"'; ?> autocomplete="off">
                            </div>
                            <!-- Level -->
                            <div class="mb-3 col-md-6">
                                <label for="level" class="form-label">Level</label>
                                <input class="form-control" type="text" id="level" name="level" <?php echo 'value="'.$_SESSION['level'].'"'; ?> disabled >
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2" name="edit">Save changes</button>
                            <a href="./index.php" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </div>
                    <!-- End Account -->
                    <div id="layoutAuthentication_footer">
                        <footer class="py-4 bg-light mt-auto">
                            <div class="container-fluid px-4">
                                <div class="d-flex align-items-center justify-content-between small">
                                    <div class="text-muted">Copyright &copy; <b>Team-C</b> the best team in the world  ❤</div>
                                </div>
                            </div>
                        </footer>
                    </div>
                    </form>
                </div>
            </div>
            <!-- End Content Section -->
        </div>
</body>
</html>