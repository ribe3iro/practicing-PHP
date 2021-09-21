<h1>Login</h1>
<form action="<?=URL?>login/loginDo" method="POST">
    <div class="form-group w-25">
        <label>Login</label>
        <input class="form-control" type="text" name="login" placeholder="Login">
    </div>
    <div class="form-group w-25">
        <label>Password</label>
        <input class="form-control" type="password" name="password" placeholder="Password">
    </div>
    <div class="form-group w-25">
        <input class="btn btn-primary" type="submit" value="Login">
        <label class="text-danger"><?=$this->loginStatus?></label>
    </div>
</form>