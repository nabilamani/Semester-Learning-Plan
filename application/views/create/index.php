
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
                    <a href="<?= base_url('') ?>" class="btn" style="color: rgb(204, 205, 222)">
                        <i class="fa-solid fa-square-plus fa-fw me-2"></i> Create RPS
                    </a>
                </div>
            </div>
            <div class="col-10 p-4" style="margin-left: calc(16.66666667%);">
                <h3 class="text-center mb-3"><i class="fa-solid fa-square-plus fa-fw me-2"></i> Create RPS</h3>
                <div style="width: 100%; height: 2px; background-color: #3468C0; margin: 30px auto 10px;" ></div>

                <div class="form-wrapper-create">
                    <form action="<?= base_url('create/addRPS') ?>" method="post">
                        <div class="row">
                            <div class="col d-grid">
                                <label for="nama_mata_kuliah">Mata Kuliah</label>
                                <div class="d-flex gap-1">
                                    <input type="text" name="nama_mata_kuliah" id="nama_mata_kuliah" class="w-75"  placeholder="Mata Kuliah">
                                    <input type="text" name="kode" id="kode" class="w-25" placeholder="DT000">
                                </div>
                            </div>
                            <div class="col-4 d-grid">
                                <label for="program_studi">Program Studi</label>
                                <select name="program_studi" id="program_studi">
                                    <option value="D3 Teknik Informatika">D3 Teknik Informatika</option>
                                    <option value="D3 Manajemen Informaika">D3 Manajemen Informaika</option>
                                    <option value="S1 Informatika">S1 Informatika</option>
                                    <option value="S1 Sistem Informasi">S1 Sistem Informasi</option>
                                    <option value="S1 Teknologi Informasi">S1 Teknologi Informasi</option>
                                    <option value="S1 Teknik Komputer">S1 Teknik Komputer</option>
                                </select>
                            </div>
                            <div class="col-3 d-grid">
                                <label for="bobot_sks">Bobot SKS</label>
                                <select name="bobot_sks" id="bobot_sks">
                                    <option value="2 Teori">2 Teori</option>
                                    <option value="2 Praktikum">2 Praktikum</option>
                                    <option value="2 Teori / 2 Praktikum">2 Teori / 2 Praktikum</option>
                                    <option value="4 Praktikum">4 Praktikum</option>
                                    <option value="4 Teori">4 Teori</option>
                                    <option value="8 Teori">8 Teori</option>
                                    <option value="8 Praktikum">8 Praktikum</option>
                                </select>
                            </div>
                            <div class="col-1 d-grid">
                                <label for="semester">Semester</label>
                                <select name="semester" id="semester">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-2 d-grid row-gap-3">
                                <label for="tanggal_susun">Tanggal Disusun</label>
                                <label for="tanggal_berlaku">Tanggal Berlaku</label>
                                <label for="nomor">Nomor</label>
                                <label for="revisi">Revisi</label>
                            </div>
                            <div class="col-3 d-grid row-gap-3">
                                <input type="date" name="tanggal_susun" id="tanggal_susun">
                                <input type="date" name="tanggal_berlaku" id="tanggal_berlaku">
                                <input type="text" name="nomor" id="nomor" placeholder="00/RPS/2023/DT000">
                                <input type="text" name="revisi" id="revisi" placeholder="0">
                            </div>
                            <div class="col-1 d-grid row-gap-3">
                                <label for="dosen_pengampu">Pengampu</label>
                                <label for="dosen_kaprodi">Kaprodi</label>
                                <label for="dosen_sekretaris">Sekretaris</label>
                                <label for="dosen_dekan">Dekan</label>
                            </div>
                            <div class="col-3 d-grid row-gap-3">
                                <select name="dosen_pengampu" id="dosen_pengampu">
                                    <?php foreach($dosen_pengampu as $dp) : ?>
                                        <option value="<?= $dp['nik'] ?>"><?= $dp['name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <select name="dosen_kaprodi" id="dosen_kaprodi">
                                    <?php foreach($dosen_kaprodi as $dk) : ?>
                                        <option value="<?= $dk['nik'] ?>"><?= $dk['name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <select name="dosen_sekretaris" id="dosen_sekretaris">
                                    <?php foreach($dosen_sekretaris as $ds) : ?>
                                        <option value="<?= $ds['nik'] ?>"><?= $ds['name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <select name="dosen_dekan" id="dosen_dekan">
                                    <?php foreach($dosen_dekan as $dd) : ?>
                                        <option value="<?= $dd['nik'] ?>"><?= $dd['name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col d-grid">
                                <label for="">Detail Presentasi Penilaian :</label>
                                <div class="row">
                                    <div class="col d-grid">
                                        <label for="nilai_presensi">Presensi</label>
                                        <label for="nilai_uts">UTS</label>
                                        <label for="nilai_uas">UAS</label>
                                        <label for="nilai_tugas">Tugas</label>
                                    </div>
                                    <div class="col d-grid">
                                        <input type="text" name="nilai_presensi" id="nilai_presensi" placeholder="00">
                                        <input type="text" name="nilai_uts" id="nilai_uts" placeholder="00">
                                        <input type="text" name="nilai_uas" id="nilai_uas" placeholder="00">
                                        <input type="text" name="nilai_tugas" id="nilai_tugas" placeholder="00">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <button type="submit" name="addRPS" class="btn nabil-btn btn-sm text-white mx-auto rounded-3" style="width: auto;">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>