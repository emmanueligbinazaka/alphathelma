<?php
session_start();
include('includes/connect.php');
require_once('includes/fns.php');


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../images/logo (2) 1.png" type="image/png" />
    <!--plugins-->
    <link href="ltr/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="ltr/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="ltr/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="ltr/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="ltr/assets/css/bootstrap-extended.css" rel="stylesheet" />
    <link href="ltr/assets/css/style.css" rel="stylesheet" />
    <link href="ltr/assets/css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- loader-->
    <link href="ltr/assets/css/pace.min.css" rel="stylesheet" />


    <!--Theme Styles-->
    <link href="ltr/assets/css/dark-theme.css" rel="stylesheet" />
    <link href="ltr/assets/css/light-theme.css" rel="stylesheet" />
    <link href="ltr/assets/css/semi-dark.css" rel="stylesheet" />
    <link href="ltr/assets/css/header-colors.css" rel="stylesheet" />
    <link rel="stylesheet" href="datatables/dataTables.bootstrap5.min.css" />

    <title>Alpha Thelma</title>
    <script src="js/jquery-3.5.1.js"></script>
    <script>
        $(function () {
            $("#checkAll").click(function () {
                $('input:checkbox').not(this).prop('checked', this.checked);
                // $('#delete1').toggle();
            });


        })

        $(document).ready(function () {
            $(".table").each(function (_, table) {
                $(table).DataTable();
            });
        });
    </script>
</head>

<body>


    <!--start wrapper-->
    <div class="wrapper">
        <!--start top header-->
        <?php include "./header.php" ?>
        <!--end top header-->

        <!--start sidebar -->
        <?php
        include "./aside.php";
        ?>
        <!--end sidebar -->

        <!--start content-->
        <main class="page-content">
            <!--breadcrumb-->
            <!-- <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Blogs</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">COn</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="./blog_form"> <button type="button" class="btn btn-primary">Add Blogs</button></a>
                    </div>
                </div>
            </div> -->
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body">
                    <form action="contact_delete" method="post">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0">Contact</h5>
                            <div class="ms-auto position-relative">

                                <!-- <input type="submit" class="btn btn-outline-danger"
                                    onclick="return confirm('Are you sure you want to delete this product?');"
                                    id="delete2" value="Delete"> -->
                            </div>
                        </div>
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered align-middle">
                                <thead class="table-secondary">
                                    <tr>
                                        <th><input type="checkbox" id="checkAll"></th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone No</th>
                                        <th>Subject</th>
                                        <th>Messages</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $query = "SELECT * FROM contact_form ORDER by id DESC";
                                    $result = mysqli_query($conn, $query);
                                    $num = mysqli_num_rows($result);

                                    for ($i = 0; $i < $num; $i++) {
                                        $row = mysqli_fetch_array($result);
                                        ?>
                                        <tr>
                                            <td><input type="checkbox" name="check_id[]" value="<?php echo $row['id']; ?>"
                                                    id="del<?= $i ?>">
                                            </td>
                                            <td><?php echo $row['firstname'] . ' ' . $row['lastname']; ?>
                                            </td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['phone_no']; ?></td>
                                            <td><?php echo $row['subject']; ?></td>
                                            <td><?php echo $row['message']; ?></td>



                                            <td>
                                                <div class="table-actions d-flex align-items-center gap-3 fs-4">
                                                    <a href="contact_delete?id=<?php echo ($row['id']); ?>"
                                                        onclick="return confirm('Are you sure you want to delete this contact?')"
                                                        class="text-danger" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Delete"><i
                                                            class="bi bi-trash-fill"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php } ?>
                            </table>
                        </div>
                    </form>
                </div>
            </div>




        </main>
        <!--end page main-->


        <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
        <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

        <!--start switcher-->
        <div class="switcher-body">
            <button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i
                    class="bi bi-paint-bucket me-0"></i></button>
            <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true"
                data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling">
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body">
                    <h6 class="mb-0">Theme Variation</h6>
                    <hr>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme"
                            value="option1" checked>
                        <label class="form-check-label" for="LightTheme">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme"
                            value="option2">
                        <label class="form-check-label" for="DarkTheme">Dark</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDarkTheme"
                            value="option3">
                        <label class="form-check-label" for="SemiDarkTheme">Semi Dark</label>
                    </div>
                    <hr>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="MinimalTheme"
                            value="option3">
                        <label class="form-check-label" for="MinimalTheme">Minimal Theme</label>
                    </div>
                    <hr />
                    <h6 class="mb-0">Header Colors</h6>
                    <hr />
                    <div class="header-colors-indigators">
                        <div class="row row-cols-auto g-3">
                            <div class="col">
                                <div class="indigator headercolor1" id="headercolor1"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor2" id="headercolor2"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor3" id="headercolor3"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor4" id="headercolor4"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor5" id="headercolor5"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor6" id="headercolor6"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor7" id="headercolor7"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor8" id="headercolor8"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end switcher-->

    </div>
    <!--end wrapper-->


    <!-- Bootstrap bundle JS -->
    <script src="ltr/assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="ltr/assets/js/jquery.min.js"></script>
    <script src="ltr/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="ltr/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="ltr/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="ltr/assets/js/pace.min.js"></script>
    <!--app-->
    <script src="ltr/assets/js/app.js"></script>
    <!-- Datatables -->
    <script src="datatables/jquery.dataTables.min.js"></script>
    <script src="datatables/dataTables.bootstrap5.min.js"></script>
    <!-- Datatables -->


</body>

</html>