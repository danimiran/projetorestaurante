<?php
class Contact extends CI_Object {

    public function lista_contato() {
        $rs = $this->db->get('contato');
        return $rs->result_array();
    }

    public function cria($contato) {
        $this->db->insert('contato', $contato);
        return $this->db->insert_id();
    }

    public function visualiza_contato($id) {
        $id = array('id' => $id);
        $rs = $this->db->get_where('contato', $id);
        return $rs->row_array();
    }


    public function delete($id) {
        $cond = array('id' => $id);
        $this->db->delete('contato', $cond);
    }
}
