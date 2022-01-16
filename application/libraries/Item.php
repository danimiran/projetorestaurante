<?php
class Item extends CI_Object {

    public function cria($pedido){

        $this->db->insert('itens_do_pedido', $pedido);
        return $this->db->insert_id();
    }

    public function lista($id) {
        $sql = 'SELECT nome_produto,comanda_id,id_item,itens_do_pedido.preco,quantidade,subtotal
        FROM itens_do_pedido WHERE comanda_id ='.$id;
         $rs = $this->db->query($sql);
        return $rs->result_array();
    }
    public function itens_vendidos() {
        date_default_timezone_set('America/Bahia');
        $ano = date('Y');
        $sql = "SELECT YEAR(data_venda), MONTH(data_venda) as mes, nome_produto, sum(quantidade) as quantidade, format(SUM(subtotal),2,'de_DE') as total
        FROM itens_do_pedido WHERE YEAR(data_venda) = ".$ano." And  nome_produto =  nome_produto GROUP BY nome_produto,mes order by quantidade desc ";
         $rs = $this->db->query($sql);
        return $rs->result_array();
    }

    public function vendas_mes() {
        date_default_timezone_set('America/Bahia');
        $data = date('Y');
        $sql = " SELECT YEAR(data_venda) as ano, MONTH(data_venda) as mes, format(SUM(subtotal),2,'de_DE') 
        as total FROM itens_do_pedido WHERE YEAR(data_venda) = ".$data." GROUP BY YEAR(data_venda), MONTH(data_venda) order by total desc";
         $rs = $this->db->query($sql);
        return $rs->result_array();
    }

    public function delete($id){
        $cond = array('id_item' => $id);
        $this->db->delete('itens_do_pedido', $cond);
    }

    public function completeProduto($q){

        $this->db->select('*');
        $this->db->limit(5);
        $this->db->like('nome', $q);
        $query = $this->db->get('cardapio');
        return $query->result_array();
       
    }
}
