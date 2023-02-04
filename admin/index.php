<?php
//session_start();
    include_once "../controller/AdminController.php";


    if (empty($_SESSION['loggedInUser'])) {
        header('location: login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>

    <!-- JQUERY & SWEETALERT 2-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.20/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.20/dist/sweetalert2.min.css">

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

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
        <?php if (!empty($_SESSION['loggedInUser'])) : ?>
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
        <?php endif ?>
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
                        <div class="collaps show" id="pagesCollapseAuth" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
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
                    <h1 class="mt-4">Dashboard</h1>
                    <!-- <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li> -->
                    <!-- </ol>  -->
                    <!-- <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Primary Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Warning Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Success Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Danger Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Admins/Moderators tables
                            <a href="./register.php" class="btn btn-primary" style="float: right;margin-right: 60px;padding: 0.375rem 2.75rem;">Add</a>
                        </div>
                        <div class="card-body">
                            <form action="#" method="POST">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Lastname</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Avatar</th>
                                            <th>Level</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($_SESSION['loggedInUser']['level'] == "1") : ?>  
                                            <?php foreach ($_SESSION['all_users'] as $user) : ?>
                                                <tr>
                                                    <td><?php echo $user['name'] ?></td>
                                                    <td><?php echo $user['lastname'] ?></td>
                                                    <td><?php echo $user['username'] ?></td>
                                                    <td><?php echo $user['email'] ?></td>
                                                    <td><?php echo $user['avatar'] ?></td>
                                                    <td><?php echo $user['level'] ?></td>
                                                    <!-- <td>
                                                        <input type="submit" name="upgrade" class="btn btn-success" value="Upgrade">
                                                    </td> -->
                                                    <td>
                                                        <a href="editUser.php?updateID=<?= $user['id'] ?>" class="btn btn-success">Update</a>
                                                        <a href="index.php?action=delete&id=<?= $user['id'] ?>" class="btn btn-danger ">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                        <?php foreach ($_SESSION['all_users'] as $user) : ?>
                                        <tr>
                                            <td><?php echo $user['name'] ?></td>
                                            <td><?php echo $user['lastname'] ?></td>
                                            <td><?php echo $user['username'] ?></td>
                                            <td><?php echo $user['email'] ?></td>
                                            <td><?php echo $user['avatar'] ?></td>
                                            <td><?php echo $user['level'] ?></td>
                                            <td>
                                                <?php if($user['level'] == 2) : ?>
                                                <?php echo '<a href="editUser.php?updateID='.$user['id'].'" class="btn btn-success">Update</a>'; ?>
                                                <?php  endif; ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
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
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> -->
    <!-- script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script> -->
    <script src="js/datatables-simple-demo.js"></script>

    <?php if (isset($_GET["updateSuccess"])) : ?>
        <script>
            Swal.fire({
                title: 'Success',
                text: 'User Updated Successfully',
                icon: 'success',
                color: 'LimeGreen',
                confirmButtonText: 'Thank You!'
            });

            // After Showing Alert, Remove Parameter GET createSuccess
            window.history.replaceState(null, null, window.location.pathname);
        </script>
    <?php endif; ?>

    <?php if (isset($_GET["deleteSuccess"])) : ?>
        <script>
            Swal.fire({
                title: 'Success',
                text: 'User Deleted Successfully',
                icon: 'success',
                color: 'LimeGreen',
                confirmButtonText: 'Thank You!'
            });

            // After Showing Alert, Remove Parameter GET createSuccess
            window.history.replaceState(null, null, window.location.pathname);
        </script>
    <?php endif; ?>
</body>
</html>