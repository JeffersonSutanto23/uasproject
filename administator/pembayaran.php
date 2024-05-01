<div class ="shadow p-3 mb-3 bg-white rounded">
    <h5><b>Halaman Pembayaran</b></h5>
</div>


<?php

$id_pembelian = $_GET['id'];

$ambil = $conn->query("SELECT * FROM pembayaran
    WHERE id_pembelian='$id_pembelian'");
$pecah = $ambil->fetch_assoc();


?>

<div class="card shadow bg-white">
    <div class="card-body row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Nama Pelanggan</th>
                        <td><?php echo $pecah['nama']; ?></td>
                    </tr>
                    <tr>
                        <th>Bank</th>
                        <td><?php echo $pecah['bank']; ?></td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>Rp. <?php echo $pecah['jumlah']; ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td><?php echo $pecah['tanggal']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
        <div class="card-footer">
            <form method="post">

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">No. Resi Pengiriman:</label>
                    <div class="col-sm-9">
                        <input type="text" name="resi" class="form-control" placeholder="Masukkan no resi">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Status:</label>
                    <div class="col-sm-9">
                        <select name="status" class="form-control">
                            <option selected disabled>Pilih Status</option>
                            <option value="pembayaran dikonfirmasi">Pembayaran dikonfirmasi</option>
                            <option value="barang dikirim">Barang dikirim</option>
                            <option value="pembayaran gagal">Pembayaran Gagal</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                        <button name="proses" class="btn btn-primary btn-sm">Proses</button>
                    </div>
                </div>

            </form>
       </div>
    </div>

    <?php 
    
    
    if(isset($_POST['proses']))
    {
        $resi = $_POST['resi'];
        $status = $_POST['status'];

        $conn->query("UPDATE pembelian SET 
        resi_pengiriman ='$resi',
        status_pembelian ='$status'
        WHERE id_pembelian='$id_pembelian'");

    echo "<script>alert('Data Pembayaran berhasil diupdate!');</script>";
    echo "<script>location='homepage_admin.php?halaman=pembelian';</script>";
    }
    
    ?>