<?php

class Tipo extends CI_Object {

   public function get_all() {
       $rs = $this->db->get('categoria');
       return $rs->result_array();
    }

    public function get_name($id_categoria) {

        $cond['id'] = $id_categoria;
        $rs = $this->db->get_where('categoria',$cond);
        $tipo = $rs->row();
        return $tipo->nome_categoria;

    }

    public function cria($categoria) {
        $this->db->insert('categoria', $categoria);
        return $this->db->insert_id();
    }

    public function lista_cardapio($id_categoria) {
        $sql = 'SELECT * FROM `cardapio`, categoria WHERE
         categoria.id = cardapio.categoria AND  cardapio.categoria='.$id_categoria;
        $rs = $this->db->query($sql);
        return $rs->result_array();
     }
   
     public function categoria_data($id) {
        $cond = array('id' => $id);
        $rs = $this->db->get_where('categoria', $cond);
        return $rs->row_array(); 
    }
    

    public function edita_categoria($data, $id) {
       $this->db->update('categoria', $data, "id = $id");  
    }


     public function delete($id) {
        $cond = array('id' => $id);
        $this->db->delete('categoria', $cond);
    }

    public function select() {
         $this->db->order_by('nome_categoria', 'asc');
         $this->db->from('categoria');
         $rs = $this->db->get();
        return $rs->result_array();
    }
   
}