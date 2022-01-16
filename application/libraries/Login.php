<?php
class Login extends CI_Object {

    public function verifica_login($email,$senha) {
        $this->db->where('email',$email);
        $this->db->where('senha',$senha);
        $rs = $this->db->get('administrador');

        if($rs->num_rows() > 0) {
            return true;
        }
        else {
            return false;
        }       
    }
}
