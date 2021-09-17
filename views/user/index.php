<h1>User</h1>
    <?php
        if( !$this->userList['data'] ){
            echo "Error loading the users!";
        }else{
            ?>
            <form action="<?=URL?>user/create" method="POST">
                <label>Login</label><input type="text" name="login"><br>
                <label>Password</label><input type="password" name="password"><br>
                <label>Role</label>
                    <select name="role">
                        <option value="default">default</option>
                        <option value="admin">admin</option>
                    </select><br>
                <input type="submit" value="Create">
            </form>
            <?php
            echo "<table>";
            foreach($this->userList['data'] as $user){
                echo "<tr>";
                echo "<td>".$user['id']."</td>";
                echo "<td>".$user['login']."</td>";
                echo "<td>".$user['role']."</td>";
                echo "<td><a href='".URL."user/edit/".$user['id']."'>Edit</a></td>";
                if( $user['id'] != Session::get("id") && $user['role'] != 'owner'){
                    echo "<td><a href='".URL."user/delete/".$user['id']."'>Delete</a></td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    ?>