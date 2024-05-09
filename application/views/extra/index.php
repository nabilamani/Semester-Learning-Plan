
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
                    <a href="<?= base_url('dashboard') ?>" class="btn text-white">
                        <i class="fa-solid fa-gauge fa-fw me-2" style="color: #ffffff;"></i> Dashboard
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
                <h3 class="text-center"><i class="fa-solid fa-calendar-plus fa-fw me-2"></i> Add Data RPS</h3>
                <h5 class="text-center fst-italic"><?= $rps['nama_mata_kuliah'] ?> (<?= $rps['kode'] ?>)</h5>
                <div class="text-center">
                    <a href="<?= base_url('view/index/') ?><?= $rps['id_rps'] ?>" target="_blank" class="btn btn-sm nabil-btn text-white" style="font-size: 10px;"><i class="fa-solid fa-eye" style="color: #fff;"></i> View</a>
                    <a href="<?= base_url('extra/edit/') ?><?= $rps['id_rps'] ?>" class="btn btn-sm nabil-btn text-white" style="font-size: 10px;"><i class="fa-solid fa-pen" style="color: #fff;"></i> Edit RPS</a>
                    <a href="<?= base_url('listt/delete/') ?><?= $rps['id_rps'] ?>" onclick="return confirm('Anda akan menghapus semua data RPS?')" class="btn btn-sm nabil-btn text-white" style="font-size: 10px;"><i class="fa-solid fa-trash" style="color: #fff;"></i> Delete</a>
                </div>
                <div style="width: 100%; height: 2px; background-color: #3468C0; margin: 30px auto 10px;" ></div>
                
                <div class="wrapper-data">

                    <!-- Gambaran Umum -->
                    <div class="row">
                        <div class="col-11">
                            <h6>Gambaran Umum</h6>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#gambaranAdd" name="addGambaran" class="btn btn-sm btn-success text-white me-3" style="font-size: 12px; padding: 3px 10px;"><i class="fa-solid fa-plus" style="color: #fff;"></i> Add</button>
                        </div>
                    </div>
                    <div class="px-3 mt-2">
                        <?php foreach($gambaran_umum as $gu) : ?>
                        <div class="row align-items-center mb-2 py-1 border border-black rounded-3">
                            <div class="col-10">
                                <p class="mb-0"><?= $gu['content_gambaran'] ?></p>
                            </div>
                            <div class="col d-flex gap-1 justify-content-end">
                                <a href="" data-bs-toggle="modal" data-bs-target="#gambaranEdit<?= $gu['id_gu'] ?>"" class="btn btn-sm nabil-btn text-white" style="font-size: 10px;"><i class="fa-solid fa-pen" style="color: #fff;"></i> Edit</a>
                                <a href="<?= base_url('extra/deleteGU/') ?><?= $rps['id_rps'] ?>/<?= $gu['id_gu'] ?>" onclick="return confirm('Anda yakin menghapus ini?')" class="btn btn-sm nabil-btn text-white" style="font-size: 10px;"><i class="fa-solid fa-trash" style="color: #fff;"></i> Delete</a>
                            </div>
                        </div>
                        <div class="modal fade modal-lg" id="gambaranEdit<?= $gu['id_gu'] ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="<?= base_url('extra/editGambaran') ?>" method="post">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="d-grid mb-3"">
                                                <input type="text" name="id_gu" hidden value="<?= $gu['id_gu'] ?>">
                                                <input type="text" name="id_rps" hidden value="<?= $rps['id_rps'] ?>">
                                                <label for="content_gambaran">Edit Gambaran Umum</label>
                                                <textarea name="content_gambaran" id="content_gambaran" rows="2"><?= $gu['content_gambaran'] ?>
                                                </textarea>
                                            </div>  
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" name="editGambaran" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                    <div class="modal fade modal-lg" id="gambaranAdd" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                        <form action="<?= base_url('extra/addGambaran') ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="d-grid mb-3"">
                                    <input type="text" name="id_rps" hidden value="<?= $rps['id_rps'] ?>">
                                    <label for="content_gambaran">Add Gambaran Umum</label>
                                    <textarea name="content_gambaran" id="content_gambaran" rows="2">
                                    </textarea>
                                </div>  
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="addGambaran" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                        </form>
                        </div>
                    </div>

                    <!-- Capaian Pembelajaran -->
                    <div class="row mt-4">
                        <div class="col-11">
                            <h6>Capaian Pembelajaran</h6>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#capaianAdd" name="addGambaran" class="btn btn-sm btn-success text-white me-3" style="font-size: 10px; padding: 3px 10px;"><i class="fa-solid fa-plus" style="color: #fff;"></i> Add</button>
                        </div>
                    </div>
                    <div class="px-3 mt-2">
                        <?php foreach($capaian_pembelajaran as $cp) : ?>
                        <div class="row align-items-center mb-2 py-1 border border-black rounded-3">
                            <div class="col-10">
                                <p class="mb-0"><?= $cp['content_capaian'] ?></p>
                            </div>
                            <div class="col d-flex gap-1 justify-content-end">
                                <a href="" data-bs-toggle="modal" data-bs-target="#capaianEdit<?= $cp['id_cp'] ?>" class="btn btn-sm nabil-btn text-white" style="font-size: 10px;"><i class="fa-solid fa-pen" style="color: #fff;"></i> Edit</a>
                                <a href="<?= base_url('extra/deleteCP/') ?><?= $rps['id_rps'] ?>/<?= $cp['id_cp'] ?>" onclick="return confirm('Anda yakin menghapus ini?')" class="btn btn-sm nabil-btn text-white" style="font-size: 10px;"><i class="fa-solid fa-trash" style="color: #fff;"></i> Delete</a>
                            </div>
                        </div>
                        <div class="modal fade modal-lg" id="capaianEdit<?= $cp['id_cp'] ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="<?= base_url('extra/editCapaian') ?>" method="post">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="d-grid mb-3"">
                                                <input type="text" name="id_cp" hidden value="<?= $cp['id_cp'] ?>">
                                                <input type="text" name="id_rps" hidden value="<?= $rps['id_rps'] ?>">
                                                <label for="content_capaian">Edit Capaian Pembelajaran</label>
                                                <textarea name="content_capaian" id="content_capaian" rows="2"><?= $cp['content_capaian'] ?>
                                                </textarea>
                                            </div>  
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" name="editCapaian" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                    <div class="modal fade modal-lg" id="capaianAdd" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                        <form action="<?= base_url('extra/addCapaian') ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="d-grid mb-3"">
                                    <input type="text" name="id_rps" hidden value="<?= $rps['id_rps'] ?>">
                                    <label for="content_capaian">Add Capaian Pembelajaran</label>
                                    <textarea name="content_capaian" id="content_capaian" rows="2">
                                    </textarea>
                                </div>  
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="addCapaian" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                        </form>
                        </div>
                    </div>

                    <!-- Prasyarat dan Pengetahuan Awal (Prior Knowledge) -->
                    <div class="row mt-4">
                        <div class="col-11">
                            <h6>Prasyarat dan Pengetahuan Awal (Prior Knowledge)</h6>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#prasyaratAdd" name="addGambaran" class="btn btn-sm btn-success text-white me-3" style="font-size: 10px; padding: 3px 10px;"><i class="fa-solid fa-plus" style="color: #fff;"></i> Add</button>
                        </div>
                    </div>
                    <div class="px-3 mt-2">
                        <?php foreach($prasyarat as $p) : ?>
                        <div class="row align-items-center mb-2 py-1 border border-black rounded-3">
                            <div class="col-10">
                                <p class="mb-0"><?= $p['content_prasyarat'] ?></p>
                            </div>
                            <div class="col d-flex gap-1 justify-content-end">
                                <a href="" data-bs-toggle="modal" data-bs-target="#prasyaratEdit<?= $p['id_p'] ?>" class="btn btn-sm nabil-btn text-white" style="font-size: 10px;"><i class="fa-solid fa-pen" style="color: #fff;"></i> Edit</a>
                                <a href="<?= base_url('extra/deleteP/') ?><?= $rps['id_rps'] ?>/<?= $p['id_p'] ?>" onclick="return confirm('Anda yakin menghapus ini?')" class="btn btn-sm nabil-btn text-white" style="font-size: 10px;"><i class="fa-solid fa-trash" style="color: #fff;"></i> Delete</a>
                            </div>
                        </div>
                        <div class="modal fade modal-lg" id="prasyaratEdit<?= $p['id_p'] ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="<?= base_url('extra/editPrasyarat') ?>" method="post">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="d-grid mb-3"">
                                                <input type="text" name="id_p" hidden value="<?= $p['id_p'] ?>">
                                                <input type="text" name="id_rps" hidden value="<?= $rps['id_rps'] ?>">
                                                <label for="content_prasyarat">Edit Prasyarat</label>
                                                <textarea name="content_prasyarat" id="content_prasyarat" rows="2"><?= $p['content_prasyarat'] ?>
                                                </textarea>
                                            </div>  
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" name="editPrasyarat" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                    <div class="modal fade modal-lg" id="prasyaratAdd" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                        <form action="<?= base_url('extra/addPrasyarat') ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="d-grid mb-3"">
                                    <input type="text" name="id_rps" hidden value="<?= $rps['id_rps'] ?>">
                                    <label for="content_prasyarat">Add Prasyarat</label>
                                    <textarea name="content_prasyarat" id="content_prasyarat" rows="2">
                                    </textarea>
                                </div>  
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="addPrasyarat" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                        </form>
                        </div>
                    </div>

                    <!-- Unit-Unit Pembelajaran secara Spesifik -->
                    <div class="row mt-4">
                        <div class="col-11">
                            <h6>Unit-Unit Pembelajaran secara Spesifik</h6>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#unitAdd" name="addGambaran" class="btn btn-sm btn-success text-white me-3" style="font-size: 10px; padding: 3px 10px;"><i class="fa-solid fa-plus" style="color: #fff;"></i> Add</button>
                        </div>
                    </div>
                    <div class="px-3 mt-2">
                        <div class="row align-items-center mb-2 border border-black rounded-3">
                            <div class="col">
                                <table class="table">
                                    <tr class="text-center">
                                        <th style="width: 17%;">Kemampuan Akhir yang diharapkan</th>
                                        <th style="width: 13%;">Indikator</th>
                                        <th style="width: 15%;">Bahan Kajian</th>
                                        <th style="width: 15%;">Metode Pembelajaran</th>
                                        <th style="width: 10%;">Waktu</th>
                                        <th style="width: 10%;">Metode Penilaian</th>
                                        <th style="width: 15%;">Bahan Ajar</th>
                                        <th></th>
                                    </tr>
                                    <?php foreach($unit_pembelajaran as $up) : ?>
                                    <tr>
                                        <td><?= $up['unit_kemampuan'] ?></td>
                                        <td><?= $up['unit_indikator'] ?></td>
                                        <td><?= $up['bahan_kajian'] ?></td>
                                        <td class="text-center"><?= $up['metode_pembelajaran'] ?></td>
                                        <td class="text-center"><?= $up['unit_waktu'] ?></td>
                                        <td class="text-center"><?= $up['metode_penilaian'] ?></td>
                                        <td><?= $up['bahan_ajar'] ?></td>
                                        <td>
                                            <a href="" data-bs-toggle="modal" data-bs-target="#unitEdit<?= $up['id_up'] ?>" class="btn btn-sm" style="font-size: 10px;"><i class="fa-solid fa-pen" style="color: #3468C0;"></i></a>
                                            <a href="<?= base_url('extra/deleteUP/') ?><?= $rps['id_rps'] ?>/<?= $up['id_up'] ?>" onclick="return confirm('Anda yakin menghapus ini?')" class="btn btn-sm" style="font-size: 10px;"><i class="fa-solid fa-trash" style="color: #3468C0;"></i></a>
                                        </td>
                                    </tr>
                                    <div class="modal fade modal-lg" id="unitEdit<?= $up['id_up'] ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <form action="<?= base_url('extra/editUnit') ?>" method="post">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Unit Pembelajaran</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="text" name="id_up" hidden value="<?= $up['id_up'] ?>">
                                                <input type="text" name="id_rps" hidden value="<?= $rps['id_rps'] ?>">
                                                <div class="col d-grid">
                                                    <label for="unit_kemampuan">Kemampuan Akhir yang Diharapakan</label>
                                                    <textarea name="unit_kemampuan" id="unit_kemampuan" rows="2"><?= $up['unit_kemampuan'] ?>
                                                    </textarea>
                                                </div>
                                                <div class="col d-grid">
                                                    <label for="unit_indikator">Indikator</label>
                                                    <textarea name="unit_indikator" id="unit_indikator" rows="2"><?= $up['unit_indikator'] ?>
                                                    </textarea>
                                                </div>
                                                <div class="col">
                                                    <label for="bahan_kajian">Bahan Kajian</label>
                                                    <textarea class="w-100" name="bahan_kajian" id="bahan_kajian" rows="2"><?= $up['bahan_kajian'] ?>
                                                    </textarea>
                                                </div>
                                                <div class="col">
                                                    <label for="metode_pembelajaran">Metode Pembelajaran</label>
                                                    <textarea class="w-100" name="metode_pembelajaran" id="metode_pembelajaran" rows="2"><?= $up['metode_pembelajaran'] ?>
                                                    </textarea>
                                                </div>
                                                <div class="col">
                                                    <label for="metode_penilaian">Metode Penilaian</label>
                                                    <textarea class="w-100" name="metode_penilaian" id="metode_penilaian" rows="2"><?= $up['metode_penilaian'] ?>
                                                    </textarea>
                                                </div>
                                                <div class="col">
                                                    <label for="bahan_ajar">Bahan Ajar</label>
                                                    <textarea class="w-100" name="bahan_ajar" id="bahan_ajar" rows="2"><?= $up['bahan_ajar'] ?>
                                                    </textarea>
                                                </div>
                                                <div class="col d-grid">
                                                    <label for="unit_waktu">Waktu</label>
                                                    <input class="w-100" type="text" name="unit_waktu" id="unit_waktu" value="<?= $up['unit_waktu'] ?>">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" name="editUnit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                        </form>
                                        </div>
                                    </div>
                                    <?php endforeach ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade modal-lg" id="unitAdd" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                        <form action="<?= base_url('extra/addUnit') ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Unit Pembelajaran</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="text" name="id_rps" hidden value="<?= $rps['id_rps'] ?>">
                                <div class="col d-grid">
                                    <label for="unit_kemampuan">Kemampuan Akhir yang Diharapakan</label>
                                    <textarea name="unit_kemampuan" id="unit_kemampuan" rows="2">
                                    </textarea>
                                </div>
                                <div class="col d-grid">
                                    <label for="unit_indikator">Indikator</label>
                                    <textarea name="unit_indikator" id="unit_indikator" rows="2">
                                    </textarea>
                                </div>
                                <div class="col">
                                    <label for="bahan_kajian">Bahan Kajian</label>
                                    <textarea class="w-100" name="bahan_kajian" id="bahan_kajian" rows="2">
                                    </textarea>
                                </div>
                                <div class="col">
                                    <label for="metode_pembelajaran">Metode Pembelajaran</label>
                                    <textarea class="w-100" name="metode_pembelajaran" id="metode_pembelajaran" rows="2">
                                    </textarea>
                                </div>
                                <div class="col">
                                    <label for="metode_penilaian">Metode Penilaian</label>
                                    <textarea class="w-100" name="metode_penilaian" id="metode_penilaian" rows="2">
                                    </textarea>
                                </div>
                                <div class="col">
                                    <label for="bahan_ajar">Bahan Ajar</label>
                                    <textarea class="w-100" name="bahan_ajar" id="bahan_ajar" rows="2">
                                    </textarea>
                                </div>
                                <div class="col d-grid">
                                    <label for="unit_waktu">Waktu</label>
                                    <input class="w-100" type="text" name="unit_waktu" id="unit_waktu" value="">
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="addUnit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                        </form>
                        </div>
                    </div>

                    <!-- Tugas/Aktivitas dan Penilaian -->
                    <div class="row mt-4">
                        <div class="col-11">
                            <h6>Tugas/Aktivitas dan Penilaian</h6>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#tugasAdd" name="addGambaran" class="btn btn-sm btn-success text-white me-3" style="font-size: 10px; padding: 3px 10px;"><i class="fa-solid fa-plus" style="color: #fff;"></i> Add</button>
                        </div>
                    </div>
                    <div class="px-3 mt-2">
                        <div class="row align-items-center mb-2 border border-black rounded-3">
                            <div class="col">
                                <table class="table">
                                    <tr class="text-center">
                                        <th style="width: 15%;">Tugas/Aktivitas</th>
                                        <th style="width: 20%;">Kemampuan akhir yang diharapkan atau dievaluasi</th>
                                        <th style="width: 12%;">Waktu</th>
                                        <th style="width: 13%;">Bobot</th>
                                        <th style="width: 20%;">Kriteria Penilaian</th>
                                        <th style="width: 15%;">Indikator Penilaian</th>
                                        <th></th>
                                    </tr>
                                    <?php foreach($tugas_penilaian as $tp) : ?>
                                    <tr>
                                        <td class="text-center"><?= $tp['tugas'] ?></td>
                                        <td><?= $tp['tugas_kemampuan'] ?></td>
                                        <td class="text-center"><?= $tp['tugas_waktu'] ?></td>
                                        <td class="text-center"><?= $tp['bobot'] ?></td>
                                        <td class="text-center"><?= $tp['kriteria_penilaian'] ?></td>
                                        <td><?= $tp['tugas_indikator'] ?></td>
                                        <td>
                                            <a href="" data-bs-toggle="modal" data-bs-target="#tugasEdit<?= $tp['id_tp'] ?>" class="btn btn-sm" style="font-size: 10px;"><i class="fa-solid fa-pen" style="color: #3468C0;"></i></a>
                                            <a href="<?= base_url('extra/deleteTP/') ?><?= $rps['id_rps'] ?>/<?= $tp['id_tp'] ?>" onclick="return confirm('Anda yakin menghapus ini?')" class="btn btn-sm" style="font-size: 10px;"><i class="fa-solid fa-trash" style="color: #3468C0;"></i></a>
                                        </td>
                                    </tr>
                                    <div class="modal fade modal-lg" id="tugasEdit<?= $tp['id_tp'] ?>" tabindex="-1"  aria-hidden="true">
                                        <div class="modal-dialog">
                                        <form action="<?= base_url('extra/editTugas') ?>" method="post">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Tugas & Penilaian</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row p-0 align-items-start mb-3">
                                                    <input type="text" name="id_tp" hidden value="<?= $tp['id_tp'] ?>">
                                                    <input type="text" name="id_rps" hidden value="<?= $rps['id_rps'] ?>">
                                                    <div class="col">
                                                        <label for="tugas">Tugas/Aktivitas</label>
                                                        <input class="w-100" type="text" name="tugas" id="tugas" value="<?= $tp['tugas'] ?>">
                                                    </div>
                                                    <div class="col d-grid">
                                                        <label for="tugas_waktu">Waktu</label>
                                                        <input class="w-100" type="text" name="tugas_waktu" id="tugas_waktu" value="<?= $tp['tugas_waktu'] ?>">
                                                    </div>
                                                    <div class="col">
                                                        <label for="bobot">Bobot</label>
                                                        <input class="w-100" type="text" name="bobot" id="bobot" value="<?= $tp['bobot'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col d-grid mb-1">
                                                    <label for="tugas_kemampuan">Kemampuan Akhir yang Diharapakan atau dievaluasi</label>
                                                    <textarea name="tugas_kemampuan" id="tugas_kemampuan" rows="2"><?= $tp['tugas_kemampuan'] ?>
                                                    </textarea>
                                                </div>
                                                <div class="col mb-1">
                                                    <label for="kriteria_penilaian">Kriteria Penilaian</label>
                                                    <textarea class="w-100" name="kriteria_penilaian" id="kriteria_penilaian" rows="2"><?= $tp['kriteria_penilaian'] ?>
                                                    </textarea>
                                                </div>
                                                <div class="col">
                                                    <label for="tugas_indikator">Indikator Penilaian</label>
                                                    <textarea class="w-100" name="tugas_indikator" id="tugas_indikator" rows="2"><?= $tp['tugas_indikator'] ?>
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" name="editTugas" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                        </form>
                                        </div>
                                    </div>
                                    <?php endforeach ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade modal-lg" id="tugasAdd" tabindex="-1"  aria-hidden="true">
                        <div class="modal-dialog">
                        <form action="<?= base_url('extra/addTugas') ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Tugas & Penilaian</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row p-0 align-items-start mb-3">
                                    <input type="text" name="id_rps" hidden value="<?= $rps['id_rps'] ?>">
                                    <div class="col">
                                        <label for="tugas">Tugas/Aktivitas</label>
                                        <input class="w-100" type="text" name="tugas" id="tugas" value="">
                                    </div>
                                    <div class="col d-grid">
                                        <label for="tugas_waktu">Waktu</label>
                                        <input class="w-100" type="text" name="tugas_waktu" id="tugas_waktu" value="">
                                    </div>
                                    <div class="col">
                                        <label for="bobot">Bobot</label>
                                        <input class="w-100" type="text" name="bobot" id="bobot" value="">
                                    </div>
                                </div>
                                <div class="col d-grid mb-1">
                                    <label for="tugas_kemampuan">Kemampuan Akhir yang Diharapakan atau dievaluasi</label>
                                    <textarea name="tugas_kemampuan" id="tugas_kemampuan" rows="2">
                                    </textarea>
                                </div>
                                <div class="col mb-1">
                                    <label for="kriteria_penilaian">Kriteria Penilaian</label>
                                    <textarea class="w-100" name="kriteria_penilaian" id="kriteria_penilaian" rows="2">
                                    </textarea>
                                </div>
                                <div class="col">
                                    <label for="tugas_indikator">Indikator Penilaian</label>
                                    <textarea class="w-100" name="tugas_indikator" id="tugas_indikator" rows="2">
                                    </textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="addTugas" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                        </form>
                        </div>
                    </div>

                    <!-- Referensi -->
                    <div class="row mt-4">
                        <div class="col-11">
                            <h6>Referensi</h6>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#referensiAdd" name="addGambaran" class="btn btn-sm btn-success text-white me-3" style="font-size: 10px; padding: 3px 10px;"><i class="fa-solid fa-plus" style="color: #fff;"></i> Add</button>
                        </div>
                    </div>
                    <div class=" px-3 mt-2">
                        <?php foreach($referensi as $r) : ?>
                        <div class="row align-items-center mb-2 py-1 border border-black rounded-3">
                            <div class="col-10">
                                <p class="mb-0"><?= $r['content_referensi'] ?></p>
                            </div>
                            <div class="col d-flex gap-1 justify-content-end">
                                <a href="" data-bs-toggle="modal" data-bs-target="#referensiEdit<?= $r['id_r'] ?>" class="btn btn-sm nabil-btn text-white" style="font-size: 10px;"><i class="fa-solid fa-pen" style="color: #fff;"></i> Edit</a>
                                <a href="<?= base_url('extra/deleteR/') ?><?= $rps['id_rps'] ?>/<?= $r['id_r'] ?>" onclick="return confirm('Anda yakin menghapus ini?')" class="btn btn-sm nabil-btn text-white" style="font-size: 10px;"><i class="fa-solid fa-trash" style="color: #fff;"></i> Delete</a>
                            </div>
                        </div>
                        <div class="modal fade modal-lg" id="referensiEdit<?= $r['id_r'] ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="<?= base_url('extra/editReferensi') ?>" method="post">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="d-grid mb-3"">
                                                <input type="text" name="id_r" hidden value="<?= $r['id_r'] ?>">
                                                <input type="text" name="id_rps" hidden value="<?= $rps['id_rps'] ?>">
                                                <label for="content_referensi">Edit Referensi</label>
                                                <textarea name="content_referensi" id="content_referensi" rows="2"><?= $r['content_referensi'] ?>
                                                </textarea>
                                            </div>  
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" name="editreferensi" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                    <div class="modal fade modal-lg" id="referensiAdd" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                        <form action="<?= base_url('extra/addReferensi') ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="d-grid mb-3"">
                                    <input type="text" name="id_rps" hidden value="<?= $rps['id_rps'] ?>">
                                    <label for="content_referensi">Add Referensi</label>
                                    <textarea name="content_referensi" id="content_referensi" rows="2">
                                    </textarea>
                                </div>  
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="addreferensi" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                        </form>
                        </div>
                    </div>

                    <!-- Rencana Pelaksanaan Pembelajaran -->
                    <div class="row mt-4">
                        <div class="col-11">
                            <h6>Rencana Pelaksanaan Pembelajaran</h6>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#rencanaAdd" name="addGambaran" class="btn btn-sm btn-success text-white me-3" style="font-size: 10px; padding: 3px 10px;"><i class="fa-solid fa-plus" style="color: #fff;"></i> Add</button>
                        </div>
                    </div>
                    <div class="px-3 mt-2">
                        <div class="row align-items-center mb-2 border border-black rounded-3">
                            <div class="col">
                                <table class="table">
                                    <tr class="text-center">
                                        <th style="width: 10%;">Minggu/pertemuan</th>
                                        <th style="width: 18%;">Kemampuan Akhir yang Diharapkan</th>
                                        <th style="width: 15%;">Indikator</th>
                                        <th style="width: 14%;">Topik & Sub Topik</th>
                                        <th style="width: 13%;">Aktivitas dan Strategi Pembelajaran</th>
                                        <th style="width: 10%;">Waktu</th>
                                        <th style="width: 15%;">Penilaian</th>
                                        <th></th>
                                    </tr>
                                    <?php foreach($rencana_pembelajaran as $rp) : ?>
                                    <tr>
                                        <td class="text-center"><?= $rp['minggu'] ?></td>
                                        <td><?= $rp['rencana_kemampuan'] ?></td>
                                        <td><?= $rp['rencana_indikator'] ?></td>
                                        <td><?= $rp['topik'] ?></td>
                                        <td><?= $rp['aktivitas'] ?></td>
                                        <td class="text-center"><?= $rp['rencana_waktu'] ?></td>
                                        <td class="text-center"><?= $rp['penilaian'] ?></td>
                                        <td>
                                            <a href="" data-bs-toggle="modal" data-bs-target="#rencanaEdit<?= $rp['id_rp'] ?>" class="btn btn-sm" style="font-size: 10px;"><i class="fa-solid fa-pen" style="color: #3468C0;"></i></a>
                                            <a href="<?= base_url('extra/deleteRP/') ?><?= $rps['id_rps'] ?>/<?= $rp['id_rp'] ?>" onclick="return confirm('Anda yakin menghapus ini?')" class="btn btn-sm" style="font-size: 10px;"><i class="fa-solid fa-trash" style="color: #3468C0;"></i></a>
                                        </td>
                                    </tr>
                                    <div class="modal fade modal-lg" id="rencanaEdit<?= $rp['id_rp'] ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <form action="<?= base_url('extra/editRencana') ?>" method="post">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Rencana Pemebelajaran</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row w-100 m-auto column-gap-2">
                                                    <div class="col-1 p-0 ">
                                                        <input type="text" name="id_rp" hidden value="<?= $rp['id_rp'] ?>">
                                                        <input type="text" name="id_rps" hidden value="<?= $rps['id_rps'] ?>">    
                                                        <label for="minggu">Minggu</label>
                                                        <select class="w-100" name="minggu" id="minggu">
                                                            <option selected hidden value="<?= $rp['minggu'] ?>"><?= $rp['minggu'] ?></option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                            <option value="13">13</option>
                                                            <option value="14">14</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-2 p-0 d-grid">
                                                        <label for="rencana_waktu">Waktu</label>
                                                        <input class="w-100" type="text" name="rencana_waktu" id="rencana_waktu" value="<?= $rp['rencana_waktu'] ?>">
                                                    </div>
                                                    <div class="col p-0 d-grid">
                                                        <label for="penilaian">Penilaian</label>
                                                        <input class="w-100" type="text" name="penilaian" id="penilaian" value="<?= $rp['penilaian'] ?>">
                                                    </div>    
                                                </div>
                                                <div class="col p-0 d-grid mb-2">
                                                    <label for="aktivitas">Aktivitas dan Strategi Pembelajaran</label>
                                                    <textarea cols="30" rows="3" name="aktivitas" id="aktivitas"><?= $rp['aktivitas'] ?></textarea>
                                                </div>
                                                <div class="col p-0 d-grid mb-2">
                                                    <label for="rencana_kemampuan">Kemampuan Akhir yang Diharapkan</label>
                                                    <textarea cols="30" rows="3" name="rencana_kemampuan" id="rencana_kemampuan"><?= $rp['rencana_kemampuan'] ?></textarea>
                                                </div>    
                                                <div class="col p-0 d-grid mb-2">
                                                    <label for="rencana_indikator">Indikator</label>
                                                    <textarea cols="30" rows="3" name="rencana_indikator" id="rencana_indikator"><?= $rp['rencana_indikator'] ?></textarea>
                                                </div>    
                                                <div class="col p-0 d-grid mb-2">
                                                    <label for="topik">Topik & Sub Topik</label>
                                                    <textarea cols="30" rows="3" name="topik" id="topik"><?= $rp['topik'] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" name="editRencana" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                        </form>
                                        </div>
                                    </div>
                                    <?php endforeach ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade modal-lg" id="rencanaAdd" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                        <form action="<?= base_url('extra/addRencana') ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Rencana Pemebelajaran</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row w-100 m-auto column-gap-2">
                                    <div class="col-1 p-0 ">
                                        <input type="text" name="id_rps" hidden value="<?= $rps['id_rps'] ?>">   
                                        <label for="minggu">Minggu</label>
                                        <select class="w-100" name="minggu" id="minggu">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                        </select>
                                    </div>
                                    <div class="col-2 p-0 d-grid">
                                        <label for="rencana_waktu">Waktu</label>
                                        <input class="w-100" type="text" name="rencana_waktu" id="rencana_waktu" value="">
                                    </div>
                                    <div class="col p-0 d-grid">
                                        <label for="penilaian">Penilaian</label>
                                        <input class="w-100" type="text" name="penilaian" id="penilaian" value="">
                                    </div>    
                                </div>
                                <div class="col p-0 d-grid mb-2">
                                    <label for="aktivitas">Aktivitas dan Strategi Pembelajaran</label>
                                    <textarea cols="30" rows="3" name="aktivitas" id="aktivitas"></textarea>
                                </div>
                                <div class="col p-0 d-grid mb-2">
                                    <label for="rencana_kemampuan">Kemampuan Akhir yang Diharapkan</label>
                                    <textarea cols="30" rows="3" name="rencana_kemampuan" id="rencana_kemampuan"></textarea>
                                </div>    
                                <div class="col p-0 d-grid mb-2">
                                    <label for="rencana_indikator">Indikator</label>
                                    <textarea cols="30" rows="3" name="rencana_indikator" id="rencana_indikator"></textarea>
                                </div>    
                                <div class="col p-0 d-grid mb-2">
                                    <label for="topik">Topik & Sub Topik</label>
                                    <textarea cols="30" rows="3" name="topik" id="topik"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="addRencana" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                        </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>