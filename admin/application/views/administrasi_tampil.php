<div class="container">
    <h5>Data Customer</h5>
    <table class="table table-bordered" id="tabelku">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Alamat</th>
                <th>Tanggal Daftar</th>
                <th>Opsi</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($customer as $key => $value) :  ?>
                <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $value['nama_customer']; ?></td>
                    <td><?php echo $value['email_customer']; ?></td>
                    <td><?php echo $value['no_telepon']; ?></td>
                    <td><?php echo $value['alamat']; ?></td>
                    <td><?php echo date('d F Y H:i', strtotime($value['tanggal_daftar'])); ?></td>
                    <td>
                        <a href="<?php echo base_url("administrasi/detail/".$value['id_customer']) ?>" class="btn btn-info">Detail</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <a href="<?php echo base_url("administrasi/tambah") ?>" class="btn btn-primary">Tambah Customer</a>
</div>
