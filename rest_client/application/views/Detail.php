<?php $id_buku = $_GET['id_buku'];?>
  <div class="container"> 
    <br>
    <h1 align="center">Data Detail Buku</h1>
    <hr><br>
    <?php foreach($detail as $data){ ?>
    <div class="row">
      <div class="col-md-2">Judul Buku</div>
      <div class="col-md">: <?php echo $data->judul;?></div>
    </div>
    <div class="row">
      <div class="col-md-2">Pengarang</div>
      <div class="col-md">: <?php echo $data->pengarang;?></div>
    </div>
    <div class="row">
      <div class="col-md-2">Penerbit</div>
      <div class="col-md">: <?php echo $data->penerbit;?></div>
    </div>
    <div class="row">
      <div class="col-md-2">Jumlah Halaman</div>
      <div class="col-md">: <?php echo $data->halaman;?></div>
    </div>
    <div class="row">
      <div class="col-md-2">Tahun</div>
      <div class="col-md">: <?php echo $data->tahun;?></div>
    </div>
    <div class="row">
      <div class="col-md-2">Kategori</div>
        <div class="col-md">: <?php echo $data->kategori;?></div>
    </div>
    <div class="row">
      <div class="col-md-2">Deskripsi</div>
      <div class="col-md">: <?php echo $data->deskripsi;?></div>
    </div>
    <?php } ?>

    <br>
    <a href="<?php echo site_url('Buku/update?id_buku='.$data->id_buku); ?>"><button class="btn btn-success" type="button">Edit Data Buku</button></a>

    <br><br>
      <h3>Komentar</h3>
    <hr>
    <?php if ($komen != null) { 
      foreach($komen as $data){ ?>
    <div class="card">
      <div class="card-body">
        <blockquote class="blockquote mb-0">
          <p><?php echo $data->komentar;?></p>
        <footer class="blockquote-footer"><?php echo $data->username;?> at <cite title="Source Title"><?php echo $data->waktu;?></cite></footer>
        </blockquote>
        <?php if ($data->username == $this->session->userdata('username')){ ?>
             <a href="<?php echo site_url('Komentar/update?id_komen='.$data->id_komen); ?>"><button class="btn btn-success btn-sm" type="button">Edit Komentar</button></a>
             <a href="<?php echo site_url('Komentar/delete?id_komen='.$data->id_komen); ?>"><button class="btn btn-danger btn-sm" type="button">Hapus Komentar</button></a>
        <?php } ?>
        </div>
    </div>
    <br>
    <?php } }?>
    <a href="<?php echo site_url('Komentar/tambah_komentar?id_buku='.$data->id_buku.'&'.'id_user='.$this->session->userdata('id_user')); ?>"><button class="btn btn-primary pull-right" type="button">Tulis Komentar</button></a>
    <br>
    <br>

    
  </div>
    
