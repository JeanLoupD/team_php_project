<?php
include_once "../controller/RestaurantController.php";
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
    <script src="https://unpkg.com/imask"></script>
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
                    <h4 class="card-header">Edit Footer Details</h4>
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <!-- Show Picture -->
                            <img src="../Restaurantly/assets/img/<?php echo $_SESSION['footerPic']; ?>" alt="menu-avatar" class="d-block rounded" id="uploadedAvatar" width="100" height="100">
                            <div class="button-wrapper">
                                <!-- Start Of Form -->
                                <form id="formAccountSettings" method="POST" action="#" enctype="multipart/form-data">
                                    <!-- Upload Input-->
                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Upload new photo</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" id="upload" class="account-file-input" accept="image/png, image/jpeg" hidden="" name="footerPic"
                                               onchange="document.getElementById('uploadedAvatar').src = window.URL.createObjectURL(this.files[0])" required>
                                    </label>
                                    <p class="text-muted mb-0">Allowed JPG, GIF or PNG.</p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                            <div class="row">
                                <!-- Title -->
                                <div class="mb-3 col-md-6">
                                    <label for="footerTitle" class="form-label">Location</label>
                                    <input class="form-control" type="text" id="footerTitle"
                                           name="footerTitle" <?php echo 'value="'.$_SESSION['footerTitle'] .'"'; ?> autocomplete="off" required>
                                </div>
                                <!-- Address -->
                                <div class="mb-3 col-md-3">
                                    <label for="footerAddress" class="form-label">Add Address</label>
                                    <input class="form-control" type="text" name="footerAddress" id="footerAddress" <?php echo 'value="'.$_SESSION['footerAddress'].'"'; ?> autocomplete="off" required>
                                </div>
                                <!-- Area -->
                                <div class="mb-3 col-md-3">
                                    <label for="footerArea" class="form-label">Add Area</label>
                                    <input class="form-control" type="text" name="footerArea" id="footerArea" <?php echo 'value="'.$_SESSION['footerArea'].'"'; ?> autocomplete="off" required>
                                </div>
                                <!-- Telephone -->
                                <div class="mb-3 col-md-6">
                                    <label for="footerPhone" class="form-label">Telephone</label>
                                    <input class="form-control" type="text" id="footerPhone" name="footerPhone" minlength="10" <?php echo 'value="'.$_SESSION['footerPhone'].'"'; ?> autocomplete="off" required>
                                </div>
                                <!-- Email -->
                                <div class="mb-3 col-md-6">
                                    <label for="footerEmail" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="footerEmail" name="footerEmail" <?php echo 'value="'.$_SESSION['footerEmail'].'"'; ?> autocomplete="off" required>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2" name="edit_footer">Save changes</button>
                                 <a href="./home.php" class="btn btn-outline-secondary">Cancel</a>
                            </div>
                        </form>
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
                </div>
            </div>
            </div>
        </div>
    </div>
<script>
    var element = document.getElementById('footerPhone');
    var maskOptions = {
        mask: '000-000-0000'
    };
    var mask = IMask(element, maskOptions);
</script>
</body>
</html>