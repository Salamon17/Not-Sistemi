<?php
/**
 *Created by Salamon
 *Developed by Salamon
 *Project: Panel
 *Date: 3/13/2024
 *Time: 10:35 PM
 */ ?>

<div class="container-fluid">
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Öğrenci Güncelle</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted text-decoration-none"
                                                           href="<?php echo base_url() ?>">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Öğrenci Güncelle</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="<?php echo base_url() ?>assets/backend/images/breadcrumb/ChatBc.png" alt=""
                             class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Öğrenci Güncelle</h5>
                        <?php print_r(validation_errors()); ?>
                        <?php echo form_open(); ?>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="tb-fname">Öğrenci Numarası</label>
                                    <select name="ogrencino" class="form-control" id="ogrencino">
                                        <option value="0" selected> Seçiniz</option>
                                        <?php foreach ($Ogrenciler as $ogrenci) {?>
                                            <option value="<?php echo $ogrenci->ogrencino?>"><?php echo $ogrenci->Ad .' '.$ogrenci->Soyad ?></option>

                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="tb-fname">Ders Adı</label>
                                    <input type="text" class="form-control" id="tb-fname" name="dersadi" >
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="tb-fname">Dönem</label>
                                    <input type="text" class="form-control" id="tb-fname" name="donem" >
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="tb-fname">Ders Notu</label>
                                    <input type="text" class="form-control" id="tb-fname" name="dersnot" >
                                </div>
                            </div>


                        </div>
                        <div class="col-12">
                            <div class="d-md-flex align-items-center mt-3">
                                <div class="ms-auto mt-3 mt-md-0">
                                    <button type="submit" class="btn btn-info font-medium rounded-pill px-4">
                                        <div class="d-flex align-items-center">
                                            <i class="ti ti-send me-2 fs-4"></i>
                                            ekle
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>

        </div>
</div>
</section>
</div>


