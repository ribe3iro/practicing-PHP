<h1>Edit</h1>
<form action="<?=URL?>user/save/<?=$this->user['id']?>" method="POST">
    <label>Login</label><input type="text" name="login" value="<?=$this->user['login']?>"><br>
    <label>Password</label><input type="password" name="password"><br>
    <label>Role</label>
    <select name="role">
        <option <?php if($this->user['role']=="default") echo "selected"?> value="default">default</option>
        <option <?php if($this->user['role']=="admin") echo "selected"?> value="admin">admin</option>
        <option <?php if($this->user['role']=="owner") echo "selected"?> value="owner">owner</option>
    </select><br>
    <input type="submit" value="Save">
</form>