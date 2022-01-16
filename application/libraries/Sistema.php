<?php
class Sistema extends CI_Object {

    public function conta_contato() {
        $rs = $this->db->count_all('contato');;
        return $rs;
    }

    public function conta_cardapio() {
        $rs =  $this->db->count_all('cardapio');
        return $rs;
    }

    public function conta_comanda() {
        $rs =  $this->db->count_all('comanda');
        return $rs;
    }
    
    public function conta_categoria() {
        $rs =  $this->db->count_all('categoria');
        return $rs;
    }
}
