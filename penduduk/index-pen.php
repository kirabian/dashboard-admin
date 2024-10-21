<?php
include 'controller/function.php';
$db = new database();

$data = $db->tampil_data_penduduk();
?>

<div class="container mt-5">
    <div class="text-center mb-3">
        <a href="?page=fp" class="btn btn-primary">Tambah Penduduk</a>
    </div>

<table id="table-penduduk" class="table table-striped table-hover">
  <thead class="table-dark">
    <tr>
      <th>ID</th>
      <th>NIK</th>
      <th>Nama</th>
      <th>Jenis Kelamin</th>
      <th>Umur</th>
      <th>Alamat</th>
      <th>No Telepon</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $penduduk) { ?>
    <tr>
      <td><?= $penduduk['id'] ?></td> <!-- Menampilkan ID -->
      <td><?= $penduduk['nik'] ?></td>
      <td><?= $penduduk['nama'] ?></td>
      <td><?= $penduduk['jenis_kelamin'] ?></td>
      <td><?= $penduduk['umur'] ?></td>
      <td><?= $penduduk['alamat'] ?></td>
      <td><?= $penduduk['no_telp'] ?></td>
      <td>
        <a href="?page=penduduk&aksi=edit&id=<?= $penduduk['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
        <a href='controller/proses-pen.php?aksi=hapus&id=<?= $penduduk['id'] ?>' class='btn btn-sm btn-danger'>Hapus</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
