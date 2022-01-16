<?php

class Produto extends CI_Object {

    public function cria($cardapio) {
        $this->db->insert('cardapio', $cardapio);
        return $this->db->insert_id();
    }

    public function lista_cardapio() {
        $this->db->select('id,nome,categoria,descricao,preco');
        $this->db->from('cardapio');
        $rs = $this->db->get();
        return $rs->result_array();
     }

     
     public function cardapio_data($id) {
        $cond = array('id' => $id);
        $rs = $this->db->get_where('cardapio', $cond);
        return $rs->row_array(); 
    }

    public function detalhes($id) {
        $sql = 'SELECT * FROM `cardapio`, categoria WHERE
        categoria.id = cardapio.categoria AND  cardapio.id='.$id;
       $rs = $this->db->query($sql);
       return $rs->row_array();
    }

    public function visualiza_cardapio($id) {
        $sql = 'SELECT * FROM `cardapio`, categoria WHERE
         categoria.id = cardapio.categoria AND  cardapio.id='.$id;
        $rs = $this->db->query($sql);
        return $rs->result_array();
     }
   
    public function edita_cardapio($data, $id) {
       $this->db->update('cardapio', $data, "id = $id");
      
    }

     public function delete($id) {
        $cond = array('id' => $id);
        $this->db->delete('cardapio', $cond);
    }   

}