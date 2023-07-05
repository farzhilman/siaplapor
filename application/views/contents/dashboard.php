<style type="text/css">
    table.dataTable thead>tr>th,
    tbody>tr>td {
        border: black solid 1px;
    }

    table.dataTable tbody>tr>td {
        border: black solid 1px;
    }

    table.dataTable tfoot>tr>th {
        border: black solid 1px;
    }

    table.dataTable thead,
    table.dataTable tfoot {
        background-color: lightblue;
    }

    /*  table.dataTable tr.odd { background-color: white; }*/
    /*  table.dataTable tr.even { background-color: #E2E4FF; }*/
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-dark card-outline">
            <div class="card-header">
                <p class="card-title m-0 keterangan" style="text-align: justify;"> Selamat datang, <?=$this->session->userdata('user_name')?> ! </p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-info">
                            <span class="info-box-icon">
                                <i class="far fa-bookmark"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Laporan</span>
                                <span class="info-box-number"> <?=$count_lapor->count?> </span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                                <span class="progress-description"></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-success">
                            <span class="info-box-icon">
                                <i class="far fa-comments"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Laporan Warga</span>
                                <span class="info-box-number"> <?=$count_giat1->count?> </span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 
                                        <?=$count_giat1->count/$count_lapor->count*100?>%">
                                    </div>
                                </div>
                                <span class="progress-description"></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-warning">
                            <span class="info-box-icon">
                                <i class="fas fa-stopwatch"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Kejadian Darurat</span>
                                <span class="info-box-number"> <?=$count_giat2->count?> </span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 
                                        <?=$count_giat2->count/$count_lapor->count*100?>%">
                                    </div>
                                </div>
                                <span class="progress-description"></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-teal">
                            <span class="info-box-icon">
                                <i class="fas fa-calendar-alt"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Kegiatan Rutin</span>
                                <span class="info-box-number"> <?=$count_giat3->count?> </span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 
                                        <?=$count_giat3->count/$count_lapor->count*100?>%">
                                    </div>
                                </div>
                                <span class="progress-description"></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-danger">
                            <span class="info-box-icon">
                                <i class="fas fa-book"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Arahan Pimpinan</span>
                                <span class="info-box-number"> <?=$count_giat4->count?> </span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 
                                        <?=$count_giat4->count/$count_lapor->count*100?>%">
                                    </div>
                                </div>
                                <span class="progress-description"></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-lg-8">
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-info card-outline">
                            <div class="card-header border-0">
                                <h3 class="card-title">Terbanyak Melakukan Laporan</h3>
                                <div class="card-tools">
                                    <!-- <a href="#" class="btn btn-sm btn-tool"><i class="fas fa-download"></i></a><a href="#" class="btn btn-sm btn-tool"><i class="fas fa-bars"></i></a> -->
                                </div>
                            </div>
                            <div class="card-body"> <?php foreach($laporan_terbanyak as $lt):?> <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                    <p class="text-success text-xl">
                                        <i class="ion ion-ios-refresh-empty"></i>
                                    </p>
                                    <p class="d-flex flex-column text-right">
                                        <span class="font-weight-bold">
                                            <i class="ion ion-android-arrow-up text-success"></i> <?=$lt->count?> laporan </span>
                                        <span class="text-muted"> <?=$lt->petugas?> </span>
                                    </p>
                                </div>
                                <!-- /.d-flex --> <?php endforeach;?> </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
            </div>
        </div>
    </div>
</div>