<div class="row">

    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Total Kata Uji</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"><?= $total_uji ?></h1>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Total Kata Ketemu</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-success"><?= $total_found ?></h1>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Total Gagal</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-danger"><?= $total_failed ?></h1>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Persentase</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"><?= number_format((float)(($total_found / $total_uji) * 100), 2, '.', '') . ' %'  ?></h1>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Kata Uji</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#" class="dropdown-item">Config option 1</a>
                        </li>
                        <li><a href="#" class="dropdown-item">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="table-uji" >
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Input</th>
                                <th>Output</th>
                                <th>Ketemu</th>
                                <th>Rule</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($hasil_uji['data'] as $uji): ?>
                                <?php 
                                $alert = '<span class="label label-danger">Gagal</span>';
                                if ($uji['result']) {
                                    $alert = '<span class="label label-primary">Sucess</span>';
                                }
                                ?>
                                <tr>
                                    <td><?= $uji['id']?></td>
                                    <td><?= $uji['input']?></td>
                                    <td><?= $uji['output']?></td>
                                    <td><?= $alert ?></td>
                                    <td><?= $uji['rule'] ?></td>
                                </tr>
                            <?php endforeach ?>

                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
</div>