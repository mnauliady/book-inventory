<?php $id_komen = $_GET['id_komen']; 
  date_default_timezone_set('Asia/Jakarta');
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">

    </div>
    <div class="col-md-6">
      <form action="<?php echo site_url('Komentar/aksi_update'); ?>" method="post">
        <?php foreach($komentar as $key){ ?>
        <fieldset>
        <br>
        <h3>Edit Komentar</h3>
        <hr>
        <br>
        <div class="form-group">
          <input class="form-control" type="hidden" name="id_komen" value="<?php echo $key->id_komen?>" required>
        </div>
        <div class="form-group">
          <input class="form-control" type="hidden" name="id_buku" value="<?php echo $key->id_buku?>" required>
        </div>
        <div class="form-group">
          <input class="form-control" type="hidden" name="id_user" value="<?php echo $key->id_user?>" required>
        </div>
        <div class="form-group">
          <input class="form-control" type="hidden" name="waktu" value="<?php echo date('H:i:s d-m-Y')?>" required>
        </div>
        <div class="form-group">
          <label>Komentar (max 1000 karakter)</label>
          <textarea class="form-control" name="komentar" rows="3"><?php echo $key->komentar?></textarea>
        </div>
        <br>
        <button class="btn btn-success" type="submit">Submit</button><br><br><br>
      <?php }?>
      </fieldset>
      </form>
    </div>
  </div>
</div>
