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
    </head>
    <body class="bg-secondary">

<!-- Wrapper -->
<div class="content-wrapper" style="margin-top: 35px;">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h4 class="card-header">Add Service Details</h4>
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <!-- Show Picture -->
                            <img src="../Restaurantly/assets/img/default_pic.png" alt="slider-avatar" class="d-block rounded" id="uploadedAvatar" width="100" height="100">
                            <div class="button-wrapper">
                                <!-- Start Of Form -->
                                <form id="formAccountSettings" method="POST" action="#" enctype="multipart/form-data">
                                <!-- Upload Input-->
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>

                                    <input type="file" id="upload" class="account-file-input" accept="image/png, image/jpeg" hidden="" name="addSliderPic"
                                           onchange="document.getElementById('uploadedAvatar').src = window.URL.createObjectURL(this.files[0])" required>
                                
                                </label>
                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG.</p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                            <div class="row">
                                <!-- Slider Title -->
                                <div class="mb-3 col-md-6">
                                    <label for="addSliderTitle" class="form-label">Add Title</label>
                                    <input class="form-control" type="text" id="addSliderTitle"
                                           name="addSliderTitle" autocomplete="off" required minlength="10" placeholder="Title" maxlength="50">
                                </div>
                                <!-- Slider Price -->
                                <div class="mb-3 col-md-6">
                                    <label for="addSliderPrice" class="form-label">Add Price</label>
                                    <input class="form-control" type="number" min="1" step="any" name="addSliderPrice" id="addSliderPrice" placeholder="Price" autocomplete="off" required minlength="2">
                                </div>
                                <!-- Description -->
                                <div class="mb-3 col-md-6">
                                    <label for="addSliderDesc" class="form-label">Add Description</label>
                                    <textarea class="form-control" type="text" id="addSliderDesc" name="addSliderDesc" style="height: 150px" placeholder="Description" maxlength="200" autocomplete="off" required></textarea>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2" name="new_services">Save changes</button>
                                 <a href="./services.php" class="btn btn-outline-secondary">Cancel</a>
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
    <!-- End Content Section -->
		</div>
    </body>
</html>