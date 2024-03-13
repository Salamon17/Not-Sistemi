<?php
/**
 *Created by Salamon
 *Developed by Salamon
 *Project: Panel
 *Date: 3/13/2024
 *Time: 10:59 PM
 */?>

<div class="container-fluid">
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Öğrenciler</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted "
                                                           href="<?php echo base_url() ?>">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Öğrenciler</li>
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
                        <div class="mb-2">
                            <h5 class="mb-0">Öğrenciler</h5>
                        </div>
                        <div class="table-responsive">
                            <table id="zero_config"
                                   class="table border table-striped table-bordered text-nowrap">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ogrenci No</th>
                                    <th>Ders adı</th>
                                    <th>Dönem</th>
                                    <th>Ders Notu</th>
                                    <th>İşlem</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0;
                                foreach ($Ogrencilernot as $ogrencinot) {
                                    $i++; ?>
                                    <tr>
                                        <td><?php echo $i ?></td>

                                        <td><?php echo $ogrencinot->ogrencino ?> - <?php echo Get_Ogrenci_By_No($ogrencinot->ogrencino)->Ad .' '.Get_Ogrenci_By_No($ogrencinot->ogrencino)->Soyad  ?></td>
                                        <td><?php echo $ogrencinot->dersadi ?></td>
                                        <td><?php echo $ogrencinot->donem ?></td>
                                        <td><?php echo $ogrencinot->dersnot ?></td>


                                        <td>
                                            <a href="<?php echo base_url() ?>ogrencinotguncelle/<?php echo $ogrencinot->Id ?>"
                                               type="button" class="btn btn-secondary">
                                                <i class="ti ti-settings fs-4"></i>
                                            </a>
                                            <a href="<?php echo base_url() ?>ogrencinotsil/<?php echo $ogrencinot->Id ?>"
                                               class="btn btn-secondary">
                                                <i class="ti ti-trash fs-4"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Ogrenci No</th>
                                    <th>Ders adı</th>
                                    <th>Dönem</th>
                                    <th>Ders Notu</th>
                                    <th>İşlem</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

