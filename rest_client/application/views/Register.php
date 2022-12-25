<br>
<div class="col-lg-5 col-sm-10 mx-auto p-5 border">
    <form action="<?= site_url('auth/register') ?>" method="post">
        <div class="form-group">
            <label for="">Username</label>
            <input class="form-control" type="text" name="username" id="" placeholder="Username" required>
        </div>
                <div class="form-group">
            <label for="">Email</label>
            <input class="form-control" type="email" name="email" id="" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input class="form-control" type="password" name="password" id="password1" placeholder="Password" required>
        </div>
        <div class="form-group mb-0">
            <label for="">Konfirmasi Password</label>
            <input class="form-control" type="password" id="password2" placeholder="Konfirmasi password" required>
        </div>
        <div class="form-group">
            <span class="text-danger mb-3" id="error" ></span>
        </div>
        <div class="col-5 mx-auto mt-5">
            <button type="submit" class="btn btn-success w-100 font-weight-bold">Daftar</button>
        </div>
    </form>
</div>

<script>
//cek inputan
$( "form" ).submit(function( event ) {
    
    var password1 = $('#password1').val();
    var password2 = $('#password2').val();
    if(password1 != password2){
        event.preventDefault();
        $('#error').text("Passsword tidak sesuai");
    }

    return;
});
</script>