<section class="mt-5 bg-light">
    <div class="container" data-aos="fade-up">
        <form action="<?php echo base_url('booking_tambah') ?>" method="POST">
            <?php
            $user = $this->session->userdata('id_pengguna');
            ?>
            <input type="hidden" name="id_pengguna" value="<?php echo $user ?>">
            <h1>1. Silahkan isi data booking jadwal makeup Anda</h1>
            <hr>
            <?php 
                $pk = $paket[0];
            ?>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tanggal Make Up</label>
                            <input type="text" class="form-control" name="tgl_makeup" value="" readonly>
                            <small><b>Pilih Tanggal Akad (Khusus Makeup Wedding Paket 2 dan Paket 3)</b></small>
                        </div>
                        <script>
                            var picker = new Pikaday({
                                disableDayFn: function(date) {
                                    var enabled_dates = ["2020-09-05"]; // dates I want to enabled.
                                    if ($.inArray(moment(date).format("YYYY-MM-DD"), enabled_dates) !== -1 || moment(date) < moment()) {
                                        return true;
                                    } else {
                                        return false;
                                    }
                                },
                                field: document.getElementsByName('tgl_makeup')[0],
                                format: 'YYYY-MM-DD'
                            });
                        </script>
                        <div class="form-group">
                            <label for="">Nama Booking</label>
                            <input type="text" class="form-control" name="nama_booking">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="alamat_booking" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama Kota</label>
                            <select name="id_kota" id="" class="form-control">
                                <?php foreach ($tarif as $tr) : ?>
                                    <option value="<?php echo $tr->id_kota ?>"><?php echo $tr->nm_kota ?> - <?php echo rupiah($tr->tarif) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <textarea name="keterangan" id="" cols="30" rows="5" class="form-control"></textarea>
                            <small><b>(Tuliskan tanggal akad dan tanggal resepsi jika paket yang dipilih makeup wedding paket 2 atau 3)</b></small>
                        </div>
                        <div class="form-group">
                            <label for="">No. Handphone</label>
                            <input type="text" class="form-control" name="nohp">
                        </div>
                    </div>
                </div>
                <h1>2. Tinjau kembali paket yang Anda pesan</h1>
                <hr>
                <div class="row">
                    <div class="col-md-9">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>Nama Paket</td>
                                    <td>:</td>
                                    <td><?php echo $pk->nm_makeup." - ".$pk->nm_paket ?></td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>:</td>
                                    <td><?php echo $pk->deskripsi ?></td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td>:</td>
                                    <td><?php echo rupiah($pk->harga_paket) ?></td>
                                </tr>
                                <tr>
                                    <td>Dp</td>
                                    <td>:</td>
                                    <td><?php echo rupiah($pk->biaya_dp) ?></td>
                                </tr>
                                <tr>
                                    <td>Biaya Transportasi</td>
                                    <td>:</td>
                                    <td id="biaya_transportasi">-- Silahkan Pilih Kota --</td>
                                </tr>
                                <tr>
                                    <td>Total Harga</td>
                                    <td>:</td>
                                    <td id="total_harga"></td>
                                </tr>
                            </tbody>
                        </table>
                        <input type="hidden" name="id_paket" value="<?php echo $pk->id_paket ?>">
                    </div>
                    <div class="col-md-3">
                        <img src="<?php echo base_url('assets/upload/') . $pk->foto ?>" class="img-fluid" alt="">
                    </div>
                    <div class="col-12">
                        <input type="hidden" name="total_bayar" />
                        <input type="hidden" name="sudah_bayar" value="0" />
                        <input type="hidden" name="dp" value="<?php echo $pk->biaya_dp; ?>" />
                        <?php if($tombol): ?>
                            <p>
                                <b>*Cara Pembayaran :</b> <br>
                                <ol>
                                    <li><b>Silahkan transfer uang sejumlah besar DP jika paket yang Anda ambil MEMILIKI DP. Pelunasan sisa pembayaran dapat Anda lakukan setelah proses makeup selesai</b></li>
                                    <li><b>Silahkan transfer uang sejumlah TOTAL HARGA jika paket yang Anda ambil TIDAK memiliki DP.</b></li>
                                    <li><b>Setelah Anda transfer, silahkan konfirmasi pembayaran dengan mengupload bukti pembayaran melalui menu <a href="riwayat">Riwayat</a></b></li>
                                </ol>
                            </p>
                            <button class="btn btn-primary" type="submit">Daftar Booking Sekarang</button>

                        <?php else: ?>
                            <h3 class="text-center">Silahkan pilih tanggal makeup untuk melanjutkan booking jadwal</h3>
                        <?php endif; ?>
                    </div>
                </div>
        </form>
    <hr>
    </div>
</section><!-- End Portfolio Section -->
<script>
    var kota = <?php echo json_encode($tarif); ?>;
    var harga_paket = <?php echo $pk->harga_paket; ?>;
    var biaya_dp = <?php echo $pk->biaya_dp; ?>;
    var tarif = 0;

    function tampilTarif()
    {
        var kota_terpilih = kota[document.getElementsByName("id_kota")[0].selectedIndex];
        tarif = kota_terpilih.tarif;

        document.getElementById("biaya_transportasi").innerHTML = kota_terpilih.nm_kota + " (Rp" + numeral(kota_terpilih.tarif).format('Rp10,000') + ")";
        tampilTotalHarga();
    }

    function tampilTotalHarga()
    {
        var total = parseInt(harga_paket) + parseInt(biaya_dp) + parseInt(tarif);
        document.getElementsByName("total_bayar")[0].value = total;
        document.getElementById("total_harga").innerHTML = "Rp" + numeral(total).format('Rp10,000');
    }

    document.getElementsByName("id_kota")[0].addEventListener("change", function(){
        tampilTarif();
    });

    document.getElementsByName("tgl_makeup")[0].addEventListener("change", function(){
        window.location.href = "?tanggal=" + this.value + "&id_paket=" + <?=$id?>;
    });

    tampilTarif();
</script>