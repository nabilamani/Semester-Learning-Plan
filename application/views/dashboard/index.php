
        <div class="row" style="height: 100vh;">
            <div class="col-2 nabil-bg p-4 text-white position-fixed bottom-0 top-0">
                <div class="profile text-center mb-4">
                    <div class="photo bg-dark mx-auto mt-3 mb-2"></div>
                    <p class="mb-0"><?= $name ?></p>
                    <p class="small fst-italic"><?= $nik ?></p>
                    <a href="<?= base_url('login/logout') ?>" class="btn btn-sm nabil-btn text-white align-self-end">
                        <i class="fa-solid fa-sign-out" style="color: #ffffff;"></i> Logout
                    </a>
                </div>

                <div class="menu">
                    <hr class="mb-1">
                    <a href="<?= base_url('') ?>" class="btn" style="color: rgb(204, 205, 222)">
                        <i class="fa-solid fa-gauge fa-fw me-2"></i> Dashboard
                    </a>
                    <hr class="mb-1">
                    <a href="<?= base_url('listt') ?>" class="btn text-white">
                        <i class="fa-solid fa-clipboard-list fa-fw me-2" style="color: #ffffff;"></i> List RPS
                    </a>
                    <hr class="mb-1">
                    <a href="<?= base_url('create') ?>" class="btn text-white">
                        <i class="fa-solid fa-square-plus fa-fw me-2" style="color: #ffffff;"></i> Create RPS
                    </a>
                </div>
            </div>
            <div class="col-10 p-4" style="margin-left: calc(16.66666667%);">
                <h3 class="text-center mb-3"><i class="fa-solid fa-gauge fa-fw me-2"></i> Dashboard</h3>
                <div style="width: 100%; height: 2px; background-color: #3468C0; margin: 30px auto 10px;" ></div>
                <h5 class="mb-4">RPS Terbaru</h5>

                <?php foreach($rps as $r) : ?>
                <a href="<?= base_url('extra/index') ?>/<?= $r['id_rps'] ?>" class="btn nabil2-btn mb-3" style="width: 100%;">
                    <table class="table-borderless bg-transparent w-100 text-start">
                        <tr>
                            <td class="fs-4 fst-italic" colspan="2"><?= $r['nama_mata_kuliah'] ?> (<?= $r['kode'] ?>)</td>
                            <td class="text-center " style="width: 10%; letter-spacing: 5px;" rowspan="2">
                                <a href="<?= base_url('extra/edit/') ?><?= $r['id_rps'] ?>"><i class="fa-solid fa-pen" style="color: #000;"></i></a>
                                <a href="<?= base_url('view/index/') ?><?= $r['id_rps'] ?>" target="_blank"><i class="fa-solid fa-eye" style="color: #000;"></i></a>
                            </td>
                        </tr>
                        <tr class="fst-italic">
                            <td><?= $r['bobot_sks'] ?> | Semester <?= $r['semester'] ?></td>
                        </tr>
                    </table>
                </a>
                <?php endforeach ?>

            </div>
        </div>