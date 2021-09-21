<h1>Edit User</h1>
<form action="<?=URL?>user/save/<?=$this->user['id']?>" method="POST">
    <div class="form-group w-25">
        <label>Login</label>
        <input onfocus="showInfo(this)" onfocusout="removeInfo(this)" class="form-control" type="text" name="login" value="<?=$this->user['login']?>" placeholder="Login">
        <small class="form-text text-info"></small>
    </div>
    <div class="form-group w-25">
        <label>Password</label>
        <input onfocus="showInfo(this)" onfocusout="removeInfo(this)" class="form-control" type="password" name="password" placeholder="Password">
        <small class="form-text text-info"></small>
    </div>
    <div class="form-group w-25">
        <label>Role</label>
        <select class="form-control" name="role">
            <option <?php if($this->user['role']=="default") echo "selected"?> value="default">default</option>
            <option <?php if($this->user['role']=="admin") echo "selected"?> value="admin">admin</option>
            <option <?php if($this->user['role']=="owner") echo "selected"?> value="owner">owner</option>
        </select>
    </div>
    <input class="btn btn-primary" type="submit" value="Save">
</form>

<script>
    function showInfo(element){
        let small = element.nextElementSibling;
        small.innerText = "Leave it blank to keep the currently saved information!";
    }
    function removeInfo(element){
        let small = element.nextElementSibling;
        small.innerText = "";
    }
</script>