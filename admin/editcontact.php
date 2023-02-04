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

        <!-- Plugins for Clock-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
        <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />


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
                    <h4 class="card-header">Edit Contact Details</h4>
                    <div class="card-body">
                    	<form method="POST" action="#">
                            <div class="row">
                                <!-- Location -->
                                <div class="mb-3 col-md-6">
                                    <label for="contactLocation" class="form-label">Location</label>
                                    <input class="form-control" type="text" id="contactLocation"
                                           name="contactLocation" <?php echo 'value="'.$_SESSION['contactLocation'].'"'; ?> autocomplete="off">
                                </div>
                                <!-- Opening Hours -->
                                <div class="mb-3 col-md-3">
                                    <label for="contactOpen" class="form-label">Opening Hours</label>
                                    <input class="form-control" type="text" name="contactOpen" id="contactOpen" <?php echo 'value="'.$_SESSION['contactOpen'].'"'; ?> autocomplete="off" width="276">
                                </div>
                                <!-- Closing Hours -->
                                <div class="mb-3 col-md-3">
                                    <label for="contactClose" class="form-label">Closing Hours</label>
                                    <input class="form-control" type="text" name="contactClose" id="contactClose" <?php echo 'value="'.$_SESSION['contactClose'].'"'; ?> autocomplete="off" width="276">
                                </div>
                                <!-- Email -->
                                <div class="mb-3 col-md-6">
                                    <label for="contactEmail" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="contactEmail" name="contactEmail" <?php echo 'value="'.$_SESSION['contactEmail'].'"'; ?> autocomplete="off">
                                </div>
                                <!-- Telephone -->
                                <div class="mb-3 col-md-6">
                                    <label for="contactPhone" class="form-label">Telephone</label>
                                    <input class="form-control" type="text" id="contactPhone" name="contactPhone" minlength="10" placeholder="123-123-1234" <?php echo 'value="'.$_SESSION['contactPhone'].'"'; ?> autocomplete="off">
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2" name="edit_contact">Save changes</button>
                                 <a href="./contact.php" class="btn btn-outline-secondary">Cancel</a>
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
            <script>
                var element = document.getElementById('addContactPhone');
                var maskOptions = {
                    mask: '000-000-0000'
                };
                var mask = IMask(element, maskOptions);
            </script>
            <!-- clock script code -->
            <script>
                $('#contactOpen').timepicker();
                $('#contactClose').timepicker();
            </script>
    </body>
</html>