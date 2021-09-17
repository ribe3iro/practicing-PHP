<?php

class User_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function createUser($login, $password, $role){
        try{
            $query = "INSERT INTO users(login, password, role) VALUES (:login, MD5(:password), :role)";
            $sth = $this->db->prepare($query);
            $args = [
                ":login" => $login,
                ":password" => $password,
                ":role" => $role
            ];
            $sth->execute($args);
            
            if($sth->rowCount() > 0){
                return ["okay" => true];
            }else{
                throw new Exception();
            }

        }catch(Exception $e){
            return ["okay" => false];
        }
    }

    function selectAllUsers(){
        try{
            $query = "SELECT id, login, role FROM users ORDER BY id";
            $sth = $this->db->prepare($query);
            $sth->setFetchMode(PDO::FETCH_ASSOC);
            $sth->execute();
            
            if($sth->rowCount() > 0){
                $posts = $sth->fetchAll();
                return ["okay" => true, "data" => $posts];
            }else{
                throw new Exception();
            }

        }catch(Exception $e){
            return ["okay" => false];
        }
    }

    function selectUser($id){
        try{
            $query = "SELECT id, login, role FROM users WHERE id = :id";
            $sth = $this->db->prepare($query);
            $sth->setFetchMode(PDO::FETCH_ASSOC);
            $sth->execute([":id" => $id]);
            
            if($sth->rowCount() > 0){
                $user = $sth->fetch();
                return ["okay" => true, "data" => $user];
            }else{
                throw new Exception();
            }

        }catch(Exception $e){
            return ["okay" => false];
        }
    }

    function editUser($id, $login, $password, $role){
        try{
            $params = [
                ":id" => $id,
                ":login" => $login,
                ":role" => $role,
            ];
            if($password == ""){
                $query = "UPDATE users SET login = :login, role = :role WHERE id = :id";
            }else{
                $query = "UPDATE users SET login = :login, password = MD5(:password), role = :role WHERE id = :id";
                $params[":password"] = $password;
            }
            $sth = $this->db->prepare($query);
            $sth->setFetchMode(PDO::FETCH_ASSOC);
            $sth->execute($params);
            
            if($sth->rowCount() > 0){
                $user = $sth->fetch();
                return ["okay" => true];
            }else{
                throw new Exception();
            }

        }catch(Exception $e){
            return ["okay" => false];
        }
    }

    function deleteUser($id){
        try{
            $query = "DELETE FROM users WHERE id = :id AND role != 'owner'";
            $sth = $this->db->prepare($query);
            $sth->execute( [":id"=>$id] );
            
            if($sth->rowCount() > 0){
                return ["okay" => true];
            }else{
                throw new Exception();
            }

        }catch(Exception $e){
            return ["okay" => false];
        }
    }
}
