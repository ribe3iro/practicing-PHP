<?php

class Dashboard_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function insertNewPost($user_id, $text){
        try{
            $query = "INSERT INTO posts(user_id, text) VALUES (:user_id, :text)";
            $sth = $this->db->prepare($query);
            $args = [
                ":user_id" => $user_id,
                ":text" => $text
            ];
            $sth->execute($args);
            
            if($sth->rowCount() > 0){
                Session::init();
                return json_encode(["okay" => true,
                                    "text" => $text,
                                    "id" => $this->db->lastInsertId(),
                                    "login" => Session::get("login")]);
            }else{
                throw new Exception();
            }

        }catch(Exception $e){
            return json_encode(["okay" => false]);
        }
    }

    function selectAllPosts(){
        try{
            $query = "SELECT posts.user_id, posts.id, users.login, posts.text FROM posts INNER JOIN users ON posts.user_id = users.id ORDER BY posts.user_id";
            $sth = $this->db->prepare($query);
            $sth->setFetchMode(PDO::FETCH_ASSOC);
            $sth->execute();
            
            if($sth->rowCount() > 0){
                Session::init();
                $user_id = Session::get("user_id");
                $posts = $sth->fetchAll();
                for($i = 0; $i < count($posts); $i++){ 
                    if($posts[$i]["user_id"] == $user_id){
                        $posts[$i]["this"] = true;
                    }
                    unset($posts[$i]["user_id"]);
                }
                return json_encode(["okay" => true,
                                    "data" => $posts]);
            }else{
                throw new Exception();
            }

        }catch(Exception $e){
            return json_encode(["okay" => false]);
        }
    }

    function deletePost($id){
        try{
            $query = "DELETE FROM posts WHERE id = :id";
            $sth = $this->db->prepare($query);
            $sth->execute([":id"=>$id]);
            
            if($sth->rowCount() > 0){
                return json_encode(["okay" => true]);
            }else{
                throw new Exception();
            }

        }catch(Exception $e){
            return json_encode(["okay" => false]);
        }
    }
}
