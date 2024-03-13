<!DOCTYPE html>
<html lang="en">

<head>
    <!--  Title -->
    <title>Mordenize</title>
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--  Favicon -->
    <link rel="shortcut icon" type="image/png" href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <!-- Core Css -->
    <link  id="themeColors"  rel="stylesheet" href="<?php echo base_url()?>assets/backend/css/style.min.css" />
</head>
<body>
<!-- Preloader -->
<div class="preloader">
    <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico" alt="loader" class="lds-ripple img-fluid" />
</div>
<!-- Preloader -->
<div class="preloader">
    <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico" alt="loader" class="lds-ripple img-fluid" />
</div>
<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-6 col-xxl-3">
                    <div class="card mb-0">
                        <div class="card-body">
                            <a href="<?php echo base_url()?>admin" class="text-nowrap logo-img text-center d-block mb-5 w-100">
                                <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/dark-logo.svg" width="180" alt="">
                            </a>

                            <?php print_r(validation_errors()); ?>
                            <?php echo form_open(); ?>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Kullanıcı Adı</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"  name="Email">
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Şifre</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="Password">
                                </div>
                                <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Giriş Yap</button>
                                <div class="d-flex align-items-center justify-content-center">
                                    <p class="fs-4 mb-0 fw-medium">Hesabın Yokmu ?</p>
                                    <a class="text-primary fw-medium ms-2" href="<?php echo base_url()?>register">Aramıza Katıl</a>
                                </div>
                            <?php echo form_close()?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--  Import Js Files -->
<script src="<?php echo base_url()?>assets/backend/libs/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/backend/libs/simplebar/dist/simplebar.min.js"></script>
<script src="<?php echo base_url()?>assets/backend/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!--  core files -->
<script src="<?php echo base_url()?>assets/backend/js/app.min.js"></script>
<script src="<?php echo base_url()?>assets/backend/js/app.init.js"></script>
<script src="<?php echo base_url()?>assets/backend/js/app-style-switcher.js"></script>
<script src="<?php echo base_url()?>assets/backend/js/sidebarmenu.js"></script>

<script src="<?php echo base_url()?>assets/backend/js/custom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<?php if (!empty($this->session->flashdata('error'))) {
    echo $this->session->flashdata('error');
} ?>
<?php if (!empty($this->session->flashdata('warning'))) {
    echo $this->session->flashdata('warning');
} ?>
<?php if (!empty($this->session->flashdata('success'))) {
    echo $this->session->flashdata('success');
} ?>
</body>

</html>
