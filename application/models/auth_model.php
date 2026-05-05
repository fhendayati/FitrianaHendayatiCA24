<?php
defined('BASEPATH') OR exit('NO direct script access allowed');

class auth_model extends CI_Model {

    public function cek_login($username, $password)
    {
        return $this->db->get_where('users',[
            'username'=>$username,
            'password'=>md5($password) //enkripsi supaya tidak bisa dilihat orang lain 
        ])->row();
    }

    public function update_last_login($id)
    {
        $this->db->where('id', $id);
        $this->db->update('users',[
            'last_login'=>date('Y-m-d H:i:s')
        ]);
    }
}
?>