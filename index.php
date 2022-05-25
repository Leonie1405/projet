<?php

namespace App\Models;

use Library\Model;

class UserModel extends Model
{
    public function get_register(array $form_array, int $user_id)
    {
        // On va dans la bdd et on insere les donnees
        // Donnees recup grace a la fonction register dans le UserController
        
        $this->db->query(
            'INSERT INTO user (user_name, password, email, created_at) VALUES (?, ?, ?, NOW()) 
            WHERE user.id = ?',[
            $form_array['user_name'],
            $form_array['password'],
            $form_array['email'],
            $user_id
            ]);
    }
    
    public function login(string $user_name)
    {
        $user = $this->db->query(
            'SELECT id, user_name, email, password, created_at FROM user WHERE user_name = ?', [$user_name]);
        
        if(empty($user_name))
        {
            return null;   
        }
            
        return $user[0];
    }
}
