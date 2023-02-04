<?php

    include_once "../controller/AdminController.php";

    editProfile();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Profile Page</title>
    <link href="css/styles.css" rel="stylesheet" />
<!--    <link href="css/profilestyles.css" rel="stylesheet" />-->
    <!-- JQUERY & SWEETALERT 2-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.20/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.20/dist/sweetalert2.min.css">

    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>
<style>
    .form-control {
        background-color: rgba(0, 0, 0, 0);
        color: rgba(var(--bs-secondary-rgb), var(--bs-text-opacity)) !important;
        border: none;
        outline: none;
        padding: unset;
    }

    #displayName{
        background-color: rgba(0, 0, 0, 0);
        border: none;
        outline: none;
        font-size: 1.5rem;
        text-align: center;
    }

    #displayName:focus{
        background-color: rgba(0, 0, 0, 0);
        border: none;
        outline: none;
    }

</style>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">Admin Panel</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group"></div>
        </form>
        <!-- Navbar-->
        <form method="POST" action="">
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><input class="dropdown-item" type="submit" name="logout" value="Logout"></li>
                    </ul>
                </li>
            </ul>
        </form>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <?php if (empty($_SESSION['loggedInUser'])) : ?>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="true" aria-controls="pagesCollapseAuth">
                            <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                            Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse show" id="pagesCollapseAuth" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link" href="login.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-sign-in"></i></div>Login
                                </a>
                                <a class="nav-link" href="register.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-user-plus"></i></div>Register
                                </a>
                            </nav>
                        </div>
                        <?php endif ?>
                        <?php if (!empty($_SESSION['loggedInUser'])) : ?>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Users
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="profil.php">
                                        <div class="sb-nav-link-icon"><i class="fas fa-id-card"></i></div>
                                        Profile
                                    </a>
                                </nav>
                            </div>
                        <?php endif ?>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="home.php">Home</a>
                                <a class="nav-link" href="about.php">About</a>
                                <a class="nav-link" href="contact.php">Contact</a>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="team.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Team
                        </a>
                        <a class="nav-link" href="portfolio.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Portfolio
                        </a>
                        <a class="nav-link" href="services.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Services
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php if (empty($_SESSION['loggedInUser'])) : ?>
                        Start Bootstrap
                    <?php else : ?>
                        <?php echo $_SESSION['loggedInUser']['name'] . " " . $_SESSION['loggedInUser']['lastname'] ?>
                    <?php endif; ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Profile</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
                <!-- Form Start -->
                <form method="POST" action="#" enctype="multipart/form-data">
                <div style="display: flex; justify-content: center; gap: 1rem">
                    <div class="row mb-4">
                        <div class="col-md-4 mb-3">
                            <div class="card" style="width: 250px">
                                <div class="card-body" style="height: 460px;">
                                    <!-- User Avatar -->
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="<?php echo "./image/" . $_SESSION['userAvatar']  ?>" id="userAvatar" alt="profile_picture" class="rounded-circle" height="150" width="150">
                                        <div class="mt-3">
                                            <!-- Display Username-->
<!--                                            <h4>--><?php //echo $_SESSION['loggedInUser']['username'] ?><!--</h4>-->
                                            <label for="displayName" class="form-label">
                                            <input class="form-control" type="text" id="displayName"
                                                    <?php echo 'value="'.$_SESSION['userFirstName'].'"'; ?>  disabled="disabled">
                                            </label>
                                        </div>
                                        <div class="mt-3">
                                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                <span class="d-none d-sm-block">Upload New photo</span>
                                                <i class="bx bx-upload d-block d-sm-none"></i>
                                                <input type="file" id="upload" class="account-file-input" accept="image/png, image/jpeg" hidden="" name="userPic"
                                                       onchange="document.getElementById('userAvatar').src = window.URL.createObjectURL(this.files[0])">
                                            </label>
                                            <p class="text-muted mb-0">Allowed JPG, GIF or PNG.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <!-- User First Name-->
                                    <div class="col-sm-3">
                                        <label for="firstName" class="form-label">First Name</label>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="form-control" type="text" id="firstName" name="userFirstname" required
                                            <?php echo 'value="'.$_SESSION['userFirstName'].'"'; ?> autocomplete="off">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <!-- User Last Name-->
                                    <div class="col-sm-3">
                                        <label for="lastName" class="form-label">Last Name</label>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="form-control" type="text" id="lastName" name="userLastname" required
                                            <?php echo 'value="'.$_SESSION['userLastName'].'"'; ?> autocomplete="off">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <!-- User's Username-->
                                    <div class="col-sm-3">
                                        <label for="userName" class="form-label">Username</label>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="form-control" type="text" id="userName" name="userName" required
                                            <?php echo 'value="'.$_SESSION['userName'].'"'; ?> autocomplete="off" onchange="test()" maxlength="15">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <!-- User Email -->
                                    <div class="col-sm-3">
                                        <label for="email" class="form-label">Email</label>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="form-control" type="text" id="email" name="userEmail" required
                                            <?php echo 'value="'.$_SESSION['userEmail'].'"'; ?> autocomplete="off">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <!-- User Password-->
                                    <div class="col-sm-3">
                                        <label for="userPwd" class="form-label">Password</label>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="form-control" type="password" id="userPwd" name="userPwd" required
                                            <?php echo 'value="'.$_SESSION['userPassword'].'"'; ?> autocomplete="off" minlength="5">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <!-- Confirm Password-->
                                    <div class="col-sm-3">
                                        <label for="confirm-pw" class="form-label">Confirm Password</label>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="form-control" type="password" id="confirm-pw" name="confirmPwd" required
                                               autocomplete="off" placeholder="Confirm Password" minlength="5">
                                    </div>
                                </div>
                                <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-warning" name="saveProfile">Save Changes</button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Team-C the best team in the world</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
<script>
    //JS function to change value of Display Username
    function test(){
        //save value into variables
        let oldUser = document.getElementById("displayName");
        let newUser = document.getElementById("userName");

        //set value from userName input to display Input
        oldUser.value = newUser.value;

    }
    //execute function
    test();
</script>
    <?php if (isset($_GET["PwdDontMatch"])) : ?>
        <script>
            Swal.fire({
                title: 'Error',
                text: 'Passwords Do Not Match!',
                icon: 'error',
                color: 'crimson',
                confirmButtonText: 'Ok!'
            });

            // After Showing Alert, Remove Parameter GET createSuccess
            window.history.replaceState(null, null, window.location.pathname);
        </script>
    <?php endif; ?>

    <?php if (isset($_GET["updateSuccess"])) : ?>
        <script>
            Swal.fire({
                title: 'Success',
                text: 'Profile Details Updated',
                icon: 'success',
                color: 'limegreen',
                confirmButtonText: 'Thank You!'
            });

            // After Showing Alert, Remove Parameter GET createSuccess
            window.history.replaceState(null, null, window.location.pathname);
        </script>
    <?php endif; ?>
</body>

</html>