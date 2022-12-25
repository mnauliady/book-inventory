<?php $id_buku = $_GET['id_buku'];?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">

    </div>
    <div class="col-md-6">
      <form action="<?php echo site_url('Buku/aksi_update'); ?>" method="post">
        <?php foreach($buku as $key){ ?>
        <fieldset>
        <br>
        <legend>Formulir Edit Data Buku</legend>

        <legend> <b>Data Buku</b></legend>
        <div class="form-group">
          <input class="form-control" type="hidden" name="id_buku" value="<?php echo $key->id_buku?>" required>
        </div>

        <div class="form-group">
          <label >Judul Buku</label>
          <input class="form-control" type="text" name="judul" value="<?php echo $key->judul?>" required>
        </div>

        <div class="form-group">
          <label >Pengarang</label>
          <input class="form-control" type="text" name="pengarang" value="<?php echo $key->pengarang?>" required>
        </div>

        <div class="form-group">
          <label >Penerbit</label>
          <input class="form-control" type="text" name="penerbit" value="<?php echo $key->penerbit?>" required>
        </div>

        <div class="form-group">
          <label >Jumlah Halaman</label>
          <input class="form-control" type="number" name="halaman" value="<?php echo $key->halaman?>" required>
        </div>

        <div class="form-group">
          <label >Tahun</label>
          <input class="form-control" type="number" name="tahun" value="<?php echo $key->tahun?>" required>
        </div>

        <div class="form-group">
          <label>Pilih Kategori</label>
          <select name="kategori" class="form-control" required>
            <option value="<?php echo $key->kategori?>"><?php echo $key->kategori?></option>
            <option value="Novel">Novel</option>
            <option value="Komik">Komik</option>
            <option value="Biografi">Biografi</option>
            <option value="Buku Pelajaran">Buku Pelajaran</option>
          </select>
        </div>

        <div class="form-group">
          <label>Deskripsi</label>
          <textarea class="form-control" name="deskripsi" rows="5"><?php echo $key->deskripsi?></textarea>
        </div>

        <div class="form-group">
          <input class="form-control" type="hidden" name="id_user" value="<?php echo $key->id_user?>" required>
        </div>

        <br>
        <button class="btn btn-success" type="submit">Submit</button><br><br><br>
        <?php }?>
        </fieldset>
      </form>
    </div>
  </div>
</div>
