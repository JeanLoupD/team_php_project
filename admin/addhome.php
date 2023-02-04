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
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://unpkg.com/imask"></script>
    </head>
    <body class="bg-secondary">

<!-- Wrapper -->
<div class="content-wrapper" style="margin-top: 35px;">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h4 class="card-header">Add Footer Details</h4>
                    <div class="card-body">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <!-- Show Picture -->
                                <img src="../Restaurantly/assets/img/menu/default_pic.png" alt="menu-avatar" class="d-block rounded" id="uploadedAvatar" width="100" height="100">
                                <div class="button-wrapper">
                                    <!-- Start Of Form -->
                                    <form id="formAccountSettings" method="POST" action="#" enctype="multipart/form-data">
                                        <!-- Upload Input-->
                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block">Upload new photo</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input type="file" id="upload" class="account-file-input" accept="image/png, image/jpeg" hidden="" name="addFooterPic"
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
                                    <label for="addFooterTitle" class="form-label">Add Title</label>
                                    <input class="form-control" type="text" id="addFooterTitle"
                                           name="addFooterTitle" autocomplete="off" placeholder="Title" required>
                                </div>
                                <!-- Address -->
                                <div class="mb-3 col-md-3">
                                    <label for="addFooterAddress" class="form-label">Add Address</label>
                                    <input class="form-control" type="text" name="addFooterAddress" id="addFooterAddress" autocomplete="off" placeholder="123 Fake Street" required>
                                </div>
                                <!-- Area -->
                                <div class="mb-3 col-md-3">
                                    <label for="addFooterArea" class="form-label">Add Area</label>
                                    <input class="form-control" type="text" name="addFooterArea" id="addFooterArea" autocomplete="off" placeholder="Somewhere"required>
                                </div>
                                <!-- Telephone -->
                                <div class="mb-3 col-md-6">
                                    <label for="addFooterPhone" class="form-label">Add Telephone</label>
                                    <input class="form-control" type="text" id="addFooterPhone" name="addFooterPhone" minlength="10"  autocomplete="off" placeholder="123-456-7890" required>
                                </div>
                                <!-- Email -->
                                <div class="mb-3 col-md-6">
                                    <label for="addFooterEmail" class="form-label">Add Email</label>
                                    <input type="text" class="form-control" id="addFooterEmail" name="addFooterEmail" autocomplete="off" placeholder="testing@gmail.com" required>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2" name="new_footer">Save changes</button>
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
    var element = document.getElementById('addContactPhone');
    var maskOptions = {
        mask: '000-000-0000'
    };
    var mask = IMask(element, maskOptions);
</script>
</body>
</html>