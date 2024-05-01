<div class ="shadow p-3 mb-3 bg-white rounded">
    <h5>Halaman Pembelian</h5>
</div>
<?php

$produk = array();
$ambil = $conn->query("SELECT * FROM pembelian JOIN pelanggan
    ON pembelian.id_pelanggan=pelanggan.id_pelanggan");
while ($pecah = $ambil->fetch_assoc())
    {
        $pembelian[]=$pecah;
    }
?>
<div class="card shadow bg-white">
    <div class="card-body">
        <table class="table table-bordered table-hover table-striped" id="tables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal Pembelian</th>
                    <th>Total Pembelian</th>
                    <th>Status Pembelian</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($pembelian as $key => $value): ?>
                <tr>                    
                    <td width="50"><?php echo $key+1; ?></td>
                    <td><?php echo $value['nama_pelanggan']; ?></td>
                    <td><?php echo date("d F Y", strtotime($value['tanggal_pembelian'])); ?></td>
                    <td>Rp<?php echo number_format($value['total_pembelian']); ?></td>
                    <td><?php echo $value['status_pembelian']; ?></td>
                    <td class="text-center" width="300">
                        <a href="homepage_admin.php?halaman=detailpembelian&id=<?php echo 
                        $value['id_pembelian']; ?> "class="btn btn-sm btn-info">Detail Pembayaran</a>
                        <!-- status tidak pending -->
                        <?php if($value['status_pembelian']!=='Pending'): ?>
                        <a href="homepage_admin.php?halaman=pembayaran&id=<?php echo 
                        $value['id_pembelian']; ?> "class="btn btn-sm btn-success">Lihat Pembayaran</a> 
                        <?php endif ?>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>