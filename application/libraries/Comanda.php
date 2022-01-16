<?php

class Comanda extends CI_Object{


    public function get_all(){
        $this->db->select('id, data, nome, mesa, status');
        $rs = $this->db->get('comanda');
        $result = $rs->result_array();
        return $result;
    }
    public function get_data(){
        date_default_timezone_set('America/Bahia');
        $data = date('Y-m-d');
        $sql = 'SELECT * FROM comanda WHERE comanda.data LIKE "'.$data.'%"';
        $rs = $this->db->query($sql);
        return $rs->result_array();
      
    }
    public function get_status(){
        date_default_timezone_set('America/Bahia');
        $data = date('Y-m-d');
        $sql = 'SELECT * FROM comanda WHERE comanda.data LIKE "'.$data.'%" AND status=0';
        $rs = $this->db->query($sql);
        return $rs->result_array();
      
    }

    public function cria($pedido){

        $this->db->insert('comanda', $pedido);
        return $this->db->insert_id();
    }

    public function add($data, $returnId = false){

        $this->db->insert('comanda', $data);
        if ($this->db->affected_rows() == '1') {
            if ($returnId == true) {
                return $this->db->insert_id('comanda');
            }
            return true;
        }
        return false;
    }

    public function comanda_data($id){
        $cond = array('id' => $id);
        $rs = $this->db->get_where('comanda', $cond);
        return $rs->row_array();
    }


    public function edita_comanda($data, $id) {
        $this->db->update('comanda', $data, "id = $id");
    }

    public function delete($id) {

        $this->db->where('comanda_id', $id);
        $this->db->delete('itens_do_pedido');
        $this->db->where('id', $id);
        $this->db->delete('comanda');
    }
}
