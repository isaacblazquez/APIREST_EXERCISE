<?php

require_once PROJECT_ROOT_PATH . "/Model/Database.php";
class UserModel extends Database
{
    public function getUsers($limit)
    {
        return $this->select("SELECT * FROM users ORDER BY user_id ASC LIMIT ?", ["i", $limit]);
    }

    public function updateUser($user_id,$username,$user_email,$user_status)
    {
        return $this->update("UPDATE users SET username=?, user_email=?,user_status=? WHERE user_id = ?", ["ssii", $username, $user_email, $user_status,$user_id ]);
    }
    
    public function deleteUser($user_id)
    {
        return $this->delete("DELETE FROM users WHERE user_id=?", ["i", $user_id ]);
    }

    // GUIA -> INSERT INTO `users` (`user_id`, `username`, `user_email`, `user_status`) VALUES (NULL, 'juanca', 'juanca@gggggmail.com', '1'); 
    public function setUser($username,$user_email,$user_status)
    {
        return $this->insert("INSERT INTO users (user_id, username, user_email, user_status) VALUES (NULL, ?, ?, ?); ", ["ssi", $username, $user_email, $user_status ]);
    }




}

?>