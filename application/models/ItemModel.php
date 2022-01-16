<?php

include_once APPPATH . 'libraries/Item.php';
include_once APPPATH . 'libraries/component/Table.php';

class ItemModel extends CI_Model{

    public function addProduto() {

        if (sizeof($_POST) == 0) return;

        $this->form_validation->set_rules('itemPedido[nome_produto]', 'produto', 'trim|required');
        $this->form_validation->set_rules('itemPedido[quantidade]', 'Quantidade', 'trim|required');
        $this->form_validation->set_rules('itemPedido[preco]', 'Preço', 'trim|required|min_length[4]|max_length[6]');

        if ($this->form_validation->run()) {

            $pedido = $this->input->post('itemPedido');
            $pedido['subtotal'] = $pedido['preco'] * $pedido['quantidade'];
            $item = new Item();
            $item->cria($pedido);
        }
    }

    public function gera_tabela($id){

        $html = '';
        $item = new Item();
        $data = $item->lista($id);
        $total = 0;
        
        foreach ($data as $itens) {

            $total = $total + $itens['subtotal'];
            $html .= '<tr>';
            $html .= '<td> ' . $itens['nome_produto'] . '</td>';
            $html .= '<td> ' . $itens['quantidade'] . '</a></td>';
            $html .= '<td> R$ ' . $itens['preco'] . '</td>';
            $html .= '<td class="text-center"> ' . $this->action_buttons($itens['id_item']) . '</td>';
            $html .= '<td> R$ ' . number_format($itens['subtotal'], 2, ',', '.') . '</td>';
            $html .= '</tr>';
        }
            $html .= '<tr>';
            $html .= ' <th colspan="4" class="text-right">Total:</th>';
            $html .= '<td> R$ ' . number_format($total, 2, ',', '.') . '</td>';
            $html .= '</tr>';
            return $html;
    }

    private function action_buttons($id){

        $html = '<a title="Excluir Item" href="' . base_url('index.php/itens/deletar/' . $id) . '">';
        $html .= ' <i class="fas fa-times-circle h4"></i></a>';

        return $html;
    }

    public function autoCompleteProduto($q){

        $item = new Item();
        $data = $item->completeProduto($q);

        foreach ($data as $row) {
            $row_set[] = array('label' => $row['nome'], 'id' => $row['id'], 'preco' => $row['preco']);
        }
        echo json_encode($row_set);
    }

    public function deletaItem($id){
        $item = new Item();
        $item->delete($id);
    }

    public function tabela_imprime($id){

        $html = '';
        $item = new Item();
        $data = $item->lista($id);
        $total = 0;
        
        foreach ($data as $itens) {

            $total = $total + $itens['subtotal'];

            $html .= '<tr>';
            $html .= '<td> ' . $itens['nome_produto'] . '</td>';
            $html .= '<td> ' . $itens['quantidade'] . '</a></td>';
            $html .= '<td> R$ ' . $itens['preco'] . '</td>';
            $html .= '<td> R$ ' . number_format($itens['subtotal'], 2, ',', '.') . '</td>';
            $html .= '</tr>';
        }
        
            $html .= ' <tr><td  class="text-right h5" colspan="4"><b>Total:</b>';
            $html .= ' R$ ' . number_format($total, 2, ',', '.') . '</td></tr>';
          
            return $html;
    }
    
}
