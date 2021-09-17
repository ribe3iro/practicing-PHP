<h1>Login</h1>
<form action="<?=URL?>login/loginDo" method="POST">
    <label>Login</label><input type="text" name="login"><br>
    <label>Password</label><input type="password" name="password"><br>
    <input type="submit" value="Send"><label><?=$this->loginStatus?></label>
</form>