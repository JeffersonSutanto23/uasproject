<div class ="shadow p-3 mb-3 bg-white rounded">
    <h5>Halaman Pelanggan</h5>
</div>

<?php

$pelanggan = array();
$ambil = $conn->query("SELECT * FROM pelanggan");
while ($pecah = $ambil->fetch_assoc())
    {
        $pelanggan[]=$pecah;
    }
?>
<div class="card shadow bg-white">
    <div class="card-body">
        <table class="table table-bordered table-hover table-striped" id="tables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Email Pelanggan</th>
                    <th>Telepon Pelanggan</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($pelanggan as $key => $value): ?>
                <tr>                    
                    <td width="50"><?php echo $key+1; ?></td>
                    <td><?php echo $value['nama_pelanggan']; ?></td>
                    <td><?php echo $value['email_pelanggan']; ?></td>
                    <td><?php echo $value['telepon_pelanggan']; ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>