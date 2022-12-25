<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">

    </div>
    <div class="col-md-6">
      <form action="<?php echo site_url('Buku/aksi_tambah'); ?>" method="post">
  <fieldset>
    <br>
    <h3>Formulir Pengisian Data Buku Baru</h3>
    <hr>
    <br>
    <div class="form-group">
      <label >Judul Buku</label>
      <input class="form-control" type="text" name="judul" required>
    </div>
    <div class="form-group">
      <label >Pengarang</label>
      <input class="form-control" type="text" name="pengarang" required>
    </div>
    <div class="form-group">
      <label >Penerbit</label>
      <input class="form-control" type="text" name="penerbit" required>
    </div>
    <div class="form-group">
      <label >Jumlah Halaman</label>
      <input class="form-control" type="number" name="halaman" required>
    </div>
    <div class="form-group">
      <label >Tahun</label>
      <input class="form-control" type="number" name="tahun" >
    </div>
    <div class="form-group">
      <label>Pilih Kategori</label>
      <select name="kategori" class="form-control" required>
        <option value="">- Pilih Kategori -</option>
        <option value="Novel">Novel</option>
        <option value="Komik">Komik</option>
        <option value="Biografi">Biografi</option>
        <option value="Buku Pelajaran">Buku Pelajaran</option>
      </select>
    </div>
    <div class="form-group">
      <label>Deskripsi</label>
      <textarea class="form-control" name="deskripsi" rows="3"></textarea>
    </div>
    <div class="form-group">
      <input class="form-control" type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user')?>" required>
    </div>
    <br>
    <button class="btn btn-success" type="submit">Submit</button><br><br><br>
  </fieldset>
</form>
    </div>
  </div>
</div>
