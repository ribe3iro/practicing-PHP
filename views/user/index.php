<h1>Create User</h1>
    <?php
        if( !$this->userList['data'] ){
            echo "Error loading the users!";
        }else{
            ?>
            <form action="<?=URL?>user/create" method="POST">
                <div class="form-group w-25">
                    <label>Login</label>
                    <input class="form-control" type="text" name="login" placeholder="Login">
                </div>
                <div class="form-group w-25">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
                <div class="form-group w-25">
                    <label>Role</label>
                    <select class="form-control" name="role">
                        <option value="default">default</option>
                        <option value="admin">admin</option>
                    </select>
                </div>
                <input class="btn btn-primary" type="submit" value="Create">
            </form>
            <div class="mt-5">
                <h2>Users</h2>
                <div class='row'>
                    <div class='col-1 font-weight-bold'>ID</div>
                    <div class='col-3 font-weight-bold'>Login</div>
                    <div class='col-1 font-weight-bold'>Role</div>
                    <div class='col-1 font-weight-bold'>Edit</div>
                    <div class='col-1 font-weight-bold'>Delete</div>
                </div>
                <hr class="bg-info">
                <?php
                foreach($this->userList['data'] as $user){
                    echo "<div class='row'>";
                        echo "<div class='col-1'>".$user['id']."</div>";
                        echo "<div class='col-3'>".$user['login']."</div>";
                        echo "<div class='col-1'>".$user['role']."</div>";
                        echo "<div class='col-1'><a class='btn-sm btn-outline-info' href='".URL."user/edit/".$user['id']."'>Edit</a></div>";
                        if( $user['id'] != Session::get("id") && $user['role'] != 'owner'){
                            echo "<div class='col-1'><a class='btn-sm btn-outline-danger' href='".URL."user/delete/".$user['id']."'>Delete</a></div>";
                        }
                    echo "</div>";
                }
            }
                ?>
            </div>