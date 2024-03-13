<?php $User = Id_To_Data("Users",$this->session->userdata('User_Id'))?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--  Title -->
    <title>Panel</title>
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="handheldfriendly" content="true"/>
    <meta name="MobileOptimized" content="width"/>
    <meta name="description" content="Salamon"/>
    <meta name="author" content="Salamon"/>
    <meta name="keywords" content="Salamon"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!--  Favicon -->
    <link rel="shortcut icon" type="image/png"
          href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico"/>
    <!-- Owl Carousel  -->
    <link rel="stylesheet"
          href="<?php echo base_url() ?>assets/backend/libs/owl.carousel/dist/assets/owl.carousel.min.css">

    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="<?php echo base_url() ?>assets/backend/css/style.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">


    <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/libs/prismjs/themes/prism-okaidia.min.css">
    <link rel="stylesheet"
          href="<?php echo base_url() ?>assets/backend/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css">


</head>
<body>
<!-- Preloader -->
<div class="preloader">
    <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico"
         alt="loader" class="lds-ripple img-fluid"/>
</div>
<!-- Preloader -->
<div class="preloader">
    <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico"
         alt="loader" class="lds-ripple img-fluid"/>
</div>
<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-theme="blue_theme" data-layout="vertical" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
            <div class="brand-logo d-flex align-items-center justify-content-between">
                <a href="<?php echo base_url() ?>" class="text-nowrap logo-img">
                    <img
                        src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/dark-logo.svg"
                        class="dark-logo" width="180" alt=""/>
                    <img
                        src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/light-logo.svg"
                        class="light-logo" width="180" alt=""/>
                </a>
                <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                    <i class="ti ti-x fs-8 text-muted"></i>
                </div>
            </div>
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav scroll-sidebar" data-simplebar>
                <ul id="sidebarnav">
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Dashboard</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?php echo base_url() ?>" aria-expanded="false">
                              <span>
                                <i class="ti ti-home"></i>
                              </span>
                            <span class="hide-menu">Anasayfa</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                              <span class="d-flex">
                                <i class="ti ti-layout"></i>
                              </span>
                            <span class="hide-menu">Öğrenci Yönetimi</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="<?php echo base_url() ?>ogrenciler" class="sidebar-link">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">Listele</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="<?php echo base_url() ?>ogrenciekle" class="sidebar-link">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">Ekle</span>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                              <span class="d-flex">
                                <i class="ti ti-layout"></i>
                              </span>
                            <span class="hide-menu">Öğrenci Not</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="<?php echo base_url() ?>ogrencilernot" class="sidebar-link">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">Listele</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="<?php echo base_url() ?>ogrencinotekle" class="sidebar-link">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">Ekle</span>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?php echo base_url() ?>ayarlar" aria-expanded="false">
                              <span>
                                <i class="ti ti-adjustments-cog"></i>
                              </span>
                            <span class="hide-menu">Hesap Ayarları</span>
                        </a>
                    </li>

                </ul>

            </nav>
            <div class="fixed-profile p-3 bg-light-secondary rounded sidebar-ad mt-3">
                <div class="hstack gap-3">
                    <div class="john-img">
                        <img src="<?php echo base_url() ?>assets/backend/images/profile/user-1.jpg"
                             class="rounded-circle" width="40" height="40" alt="">
                    </div>
                    <div class="john-title">
                        <h6 class="mb-0 fs-4 fw-semibold"><?php  echo $User->Ad . ' ' . $User->Soyad ?></h6>
                        <span class="fs-2 text-dark"> </span>
                    </div>
                    <button class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button"
                            aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
                        <i class="ti ti-power fs-6"></i>
                    </button>
                </div>
            </div>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
        <!--  Header Start -->
        <header class="app-header">
            <nav class="navbar navbar-expand-lg navbar-light">


                <div class="d-block d-lg-none">
                    <img
                        src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/dark-logo.svg"
                        class="dark-logo" width="180" alt=""/>
                    <img
                        src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/light-logo.svg"
                        class="light-logo" width="180" alt=""/>
                </div>
                <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
              <span class="p-2">
                <i class="ti ti-dots fs-7"></i>
              </span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="javascript:void(0)"
                           class="nav-link d-flex d-lg-none align-items-center justify-content-center" type="button"
                           data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                           aria-controls="offcanvasWithBothOptions">
                            <i class="ti ti-align-justified fs-7"></i>
                        </a>
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">

                            <li class="nav-item dropdown">
                                <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <div class="user-profile-img">
                                            <img src="<?php echo base_url() ?>assets/backend/images/profile/user-1.jpg"
                                                 class="rounded-circle" width="35" height="35" alt=""/>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                     aria-labelledby="drop1">
                                    <div class="profile-dropdown position-relative" data-simplebar>
                                        <div class="py-3 px-7 pb-0">
                                            <h5 class="mb-0 fs-5 fw-semibold">Profilim</h5>
                                        </div>
                                        <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                            <img src="<?php echo base_url() ?>assets/backend/images/profile/user-1.jpg"
                                                 class="rounded-circle" width="80" height="80" alt=""/>
                                            <div class="ms-3">
                                                <h5 class="mb-1 fs-3"><?php echo $User->Ad . ' ' . $User->Soyad ?></h5>
                                                <span
                                                    class="mb-1 d-block text-dark"> </span>
                                                <p class="mb-0 d-flex text-dark align-items-center gap-2">
                                                    <i class="ti ti-mail fs-4"></i> <?php echo $User->Email ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="message-body">
                                            <a href=" "
                                               class="py-8 px-7 mt-8 d-flex align-items-center">
                                                    <span
                                                        class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                                      <img
                                                          src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-account.svg"
                                                          alt="" width="24" height="24">
                                                    </span>
                                                <div class="w-75 d-inline-block v-middle ps-3">
                                                    <h6 class="mb-1 bg-hover-primary fw-semibold"> Profilim </h6>
                                                    <span class="d-block text-dark">Hesap Ayarları</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="d-grid py-4 px-7 pt-8">
                                            <a href="<?php echo base_url() ?>logout"
                                               class="btn btn-outline-primary">Çıkış
                                                Yap</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <!--  Header End -->
