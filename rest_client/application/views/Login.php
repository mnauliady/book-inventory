<br>
<div class="col-lg-5 col-sm-10 mx-auto p-5 border">
    <form action="<?= site_url('auth/verify') ?>" method="post">
        <?php if($error){  ?>
        <div class="form-group">
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span>Wrong username or password!</span>
            </div>
        </div>
        <?php } ?>
        <div class="form-group">
            <label for="">Username</label>
            <input class="form-control" type="text" name="username" id="" autofocus required>
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input class="form-control" type="password" name="password" id="" required>
        </div>
        <div class="col-5 mx-auto mt-4">
            <button type="submit" class="btn btn-success w-100 font-weight-bold">Login </button>
        </div>
    </form>
</div>