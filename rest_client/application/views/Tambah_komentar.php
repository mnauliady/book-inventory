<?php $id_buku = $_GET['id_buku']; 
  $id_user = $_GET['id_user'];
  date_default_timezone_set('Asia/Jakarta');
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">

    </div>
    <div class="col-md-6">
      <form action="<?php echo site_url('Komentar/aksi_tambah'); ?>" method="post">
        <fieldset>
        <br>
        <h3>Tulis Komentarmu</h3>
        <hr>
        <br>
        <div class="form-group">
          <input class="form-control" type="hidden" name="id_buku" value="<?php echo $id_buku?>" required>
        </div>
        <div class="form-group">
          <input class="form-control" type="hidden" name="id_user" value="<?php echo $id_user?>" required>
        </div>
        <div class="form-group">
          <input class="form-control" type="hidden" name="waktu" value="<?php echo date('H:i:s d-m-Y')?>" required>
        </div>
        <div class="form-group">
          <label>Komentar (max 1000 karakter)</label>
          <textarea class="form-control" name="komentar" rows="3"></textarea>
        </div>
        <br>
        <button class="btn btn-success" type="submit">Submit</button><br><br><br>
        </fieldset>
      </form>
    </div>
  </div>
</div>
