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
    <title>Home Page</title>

    <!-- JQUERY & SWEETALERT 2-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.20/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.20/dist/sweetalert2.min.css">

    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/profilestyles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <style type="text/css">
        table.table td a {
            cursor: pointer;
            display: inline-block;
            margin: 0 5px;
            min-width: 24px;
        }

        table.table td a.add {
            color: #27C46B;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #E34724;
        }

        table.table td i {
            font-size: 19px;
        }

        table.table td a.add i {
            font-size: 24px;
            margin-right: -1px;
            position: relative;
            top: 3px;
        }
    </style>
</head>

<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.php">Admin Panel</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
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
                                    Profil
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
                <h1 class="mt-4">Contact Table</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Contact Table</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        Contact informations about the restaurant, the address, phone, location etc.</div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Contact DataTable
                        <div class="float-end">
                            <button type="button" class="btn btn-info"><a href="addcontact.php" style="text-decoration: none;">+Add New</a>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple" class="table table-striped">
                            <thead>
                            <tr>
                                <th>Location</th>
                                <th>Opening</th>
                                <th>Closing</th>
                                <th>Email</th>
                                <th>Telephone</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($_SESSION['loggedInUser']['level'] == "1") : ?>
                                <?php foreach ($_SESSION['all_contact'] as $contact) : ?>
                                    <tr>
                                        <td><?php echo $contact['location'] ?></td>
                                        <td><?php echo $contact['open'] ?></td>
                                        <td><?php echo $contact['close'] ?></td>
                                        <td><?php echo $contact['email'] ?></td>
                                        <td><?php echo $contact['phone'] ?></td>
                                        <td>
                                            <a href="editcontact.php?updateID=<?= $contact['id'] ?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                            <a href="contact.php?contactDeleteID=<?= $contact['id'] ?>"class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <?php foreach ($_SESSION['all_contact'] as $contact) : ?>
                                    <tr>
                                        <td><?php echo $contact['location'] ?></td>
                                        <td><?php echo $contact['open'] ?></td>
                                        <td><?php echo $contact['close'] ?></td>
                                        <td><?php echo $contact['email'] ?></td>
                                        <td><?php echo $contact['phone'] ?></td>
                                        <td>
                                            <a href="editcontact.php?updateID=<?= $contact['id'] ?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
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
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<?php if (isset($_GET["deleteSuccess"])) : ?>
    <script>
        Swal.fire({
            title: 'Success',
            text: 'Contact Deleted Successfully',
            icon: 'success',
            color: 'LimeGreen',
            confirmButtonText: 'Thank You!'
        });

        // After Showing Alert, Remove Parameter GET createSuccess
        window.history.replaceState(null, null, window.location.pathname);
    </script>
<?php endif; ?>

<?php if (isset($_GET["updateSuccess"])) : ?>
    <script>
        Swal.fire({
            title: 'Success',
            text: 'Contact Updated Successfully',
            icon: 'success',
            color: 'LimeGreen',
            confirmButtonText: 'Thank You!'
        });

        // After Showing Alert, Remove Parameter GET createSuccess
        window.history.replaceState(null, null, window.location.pathname);
    </script>
<?php endif; ?>

<?php if (isset($_GET["addSuccess"])) : ?>
    <script>
        Swal.fire({
            title: 'Success',
            text: 'Added Successfully',
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