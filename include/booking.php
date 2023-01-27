<div class="header text-center bg-primary py-5 text-light">
    <h2 class="fw-bold text-3xl mb-4">Booking SIMAKSI</h2>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="index.php" class="text-center text-light">Home</a></li>
        <li class="breadcrumb-item active text-light" aria-current="page">Booking</li>
    </ol>
    </nav>
</div>
    <form action="index.php?include=konfirmasi-booking" method="post">
        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- dropdown provinsi -->
                    <div class="form-group col pt-3">
                        <label for="Provinsi" class="col-sm-3 col-form-label">Provinsi</label>
                        <div class="col-sm-10">
                        <select class="form-control" id="provinsi" name="provinsi">
                                <option value="0">-Pilih Provinsi-</option>
                                <?php
                            $sql = "SELECT `id_provinsi`, `nama_provinsi` FROM `provinsi` ORDER BY `nama_provinsi`";
                            $query = mysqli_query($koneksi, $sql);
                            while($data = mysqli_fetch_row($query)){ 
                                $id_provinsi = $data[0];
                                $nama_provinsi = $data[1];
                        ?>
                                <option value="<?php echo $id_provinsi?>">
                                    <?php echo $nama_provinsi;?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <!-- dropdown gunung -->
                    <div class="form-group col pt-3" >
                        <label for="gunung" class="col-sm-3 col-form-label">Gunung</label>
                        <div class="col-sm-10">
                        <select class="form-control" id="gunung" name="gunung">
                            <option value="0">-Pilih gunung-</option>
                        <?php
                            
                            $sql = "SELECT `harga_simaksi`, `nama_gunung` FROM `gunung`  ORDER BY `nama_gunung`";
                            $query = mysqli_query($koneksi, $sql);
                            while($data = mysqli_fetch_row($query)){ 
                                $harga_simaksi = $data[0];
                                $nama_gunung = $data[1];
                        ?>
                            <option value="<?php echo $harga_simaksi?>">
                                <?php echo $nama_gunung;?>
                            </option>
                        <?php } ?>
                        </select>
                        </div>
                    </div>
                    <!-- dropdown Jalur -->
                    <div class="form-group col pt-3 pb-5" >
                        <label for="Jalur" class="col-sm-3 col-form-label">Jalur</label>
                        <div class="col-sm-10">
                        <select class="form-control" id="jalur" name="jalur">
                            <option value="0">-Pilih Jalur-</option>
                        <?php
                            $sql = "SELECT `id_jalur`, `nama_jalur` FROM `jalur` ORDER BY `nama_jalur`";
                            $query = mysqli_query($koneksi, $sql);
                            while($data = mysqli_fetch_row($query)){ 
                                $id_jalur = $data[0];
                                $nama_jalur = $data[1];
                        ?>
                            <option value="<?php echo $id_jalur?>">
                                <?php echo $nama_jalur;?>
                            </option>
                        <?php } ?>
                        </select>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group col pt-3">
                        <label for="date" class="col-sm-3 col-form-label">Tanggal Naik</label>
                        <div class="col-sm-10">
                            <div class="input-group date" id="datepicker">
                                <input type="date" class="form-control" name="tgl_naik">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col pt-3">
                        <label for="date" class="col-sm-3 col-form-label">Tanggal Turun</label>
                        <div class="col-sm-10">
                            <div class="input-group date" id="datepicker">
                                <input type="date" class="form-control" name="tgl_turun">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col pt-3">
                        <label for="Total Rombongan" class="col-sm-3 col-form-label">Total Rombongan</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Total Rombongan" aria-label="Total Rombongan" aria-describedby="basic-addon1" name="rombongan">
                        </div>
                    </div>
                    <div class="tombol pb-5 pt-4 text-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn bg-secondary text-white float-right" style="background-color: #20774D;">Pesan Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>