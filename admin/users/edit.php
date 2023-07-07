<?php include("../../path.php") ?>
<?php include(IN_DIR . "../app/controllers/users.php"); ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cakahal - Dashboard</title>
    <!-- link bootstrap 4 -->
    <link href="../../assets/cssA/bootstrap.min.css">
    <link href="../../assets/cssA/bootstrap.css">

    <!-- Custom fonts for this template-->
    <link href="../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../assets/cssA/sb-admin-2.min.css" rel="stylesheet">

    <!-- paid rich text editor -->
    <!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        
        <script>
          tinymce.init({
            selector: 'textarea#editor',
          });
        </script> -->

    <!-- free rich text editor -->
    <link rel="stylesheet" href="../../assets/download/richtexteditor/rte_theme_default.css" />
    <!-- Free rich text editor -->
    <script type="text/javascript" src="../../assets/download/richtexteditor/rte.js"></script>
    <script type="text/javascript" src='../../assets/download/richtexteditor/plugins/all_plugins.js'></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include(IN_DIR . "/app/includes/adminSidebar.php") ?>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <!-- header section -->
                <?php include(IN_DIR . "/app/includes/adminHeader.php") ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <?php include(IN_DIR . "/app/includes/adminHeaderD.php") ?>

                    <!-- Page Heading -->


                    <!-- ====================== form ======================== -->
                    <div class="container">

                        <h3 class="text-dark">Edit Blog User</h3>

                        
                             <!-- message display -->
                             <?php include(IN_DIR . "/app/helpers/formErrors.php"); ?> 

                        <div>
                            <a href="create.php" class="btn p-2 mx-0 my-5 btn-outline-primary">Add User</a>
                            <a href="index.php" class="btn p-2 mx-2 my-5 btn-outline-secondary">Manage  User</a>
                        </div>

                        <!-- ================ Form Section ===================== -->

                        
                        <form method="POST" action="edit.php" class="container">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                        
                            <div class="form-group">
                                <label for="text">Username</label>
                                <input type="text" value="<?php echo $username;?>" name="username" class="form-control" id="" aria-describedby="">

                            </div>

                            <div class="form-group">
                                <label for="text">Email</label>
                                <input type="email" value="<?php echo $email;?>" name="email" class="form-control" id="" aria-describedby="">
                                <small id="" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>

                            <div class="form-group">
                                <label for="text">Password</label>
                                <input type="password" value="<?php echo $password;?>" name="password" class="form-control" id="" aria-describedby="">
                            </div>

                            <div class="form-group">
                                <label for="text">Confirm Password</label>
                                <input type="password" value="<?php echo $confirmPass;?>" name="confirmPass" class="form-control" id="" aria-describedby="">
                            </div>

                            <div class="form-group">
                                <?php if(isset($admin) && $admin == 1) : ?> 
                                    <label for="sel1">
                                        <input type="checkbox" name="admin" checked>
                                        Admin Title
                                    </label>
                                    <?php else: ?> 
                                        <label for="sel1">
                                            <input type="checkbox" name="admin">
                                            Admin Title
                                        </label>
                                <?php endif; ?> 
                               
                                
                            </div>

                            <button type="submit" name="update_user" class="btn mb-4 btn-primary">Update User</button>
                        </form>

                    </div>
                    <!-- ====================== form ======================== -->

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->

                                <!-- Card Body -->

                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->

                                <!-- Card Body -->

                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->

                            <!-- Color System -->


                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->


                            <!-- Approach -->


                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Cakahal 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- free rich text editor -->
    <script>
        var editor1 = new RichTextEditor("#div_editor1");
        //editor1.setHTMLCode("Use inline HTML or setHTMLCode to init the default content.");
    </script>

    <!-- free rich text editor -->


    <!-- jQuery first, then Popper.js, then Bootstrap JS rich text editor -->

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
     
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js" integrity="sha512-BmM0/BQlqh02wuK5Gz9yrbe7VyIVwOzD1o40yi1IsTjriX/NGF37NyXHfmFzIlMmoSIBXgqDiG1VNU6kB5dBbA==" crossorigin="anonymous"></script>
     
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS rich text editor -->

    <!-- Bootstrap core JavaScript-->
    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../assets/jsA/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../assets/jsA/demo/chart-area-demo.js"></script>
    <script src="../../assets/jsA/demo/chart-pie-demo.js"></script>



</body>

</html>