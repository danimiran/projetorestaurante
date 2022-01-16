<?php

include_once APPPATH . 'libraries/Comanda.php';
include_once APPPATH . 'libraries/component/Table.php';

class PedidosModel extends CI_Model{

  public function aux(){

    if (sizeof($_POST) == 0) return;
    $this->form_validation->set_rules('comanda[nome]', 'Nome', 'trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('comanda[mesa]', 'Mesa', 'trim|required');

    if ($this->form_validation->run()) {

      $pedido = $this->input->post('comanda');
      $comanda = new Comanda();

      if (is_numeric($id = $comanda->add($pedido, true))) {
        redirect('index.php/itens/additem/'.$id);
      }
    }
  }

  public function edita_comanda($id){

    if (sizeof($_POST) == 0) return;

    $data = $this->input->post('comanda');
    $comanda = new Comanda();
    $comanda->edita_comanda($data, $id);
    redirect('index.php/pedidos?enviado=1');
  }


  public function recupera_id($id){
    $comanda = new Comanda();
    return $comanda->comanda_data($id);
  }

  public function deleta($id){
    $comanda = new Comanda();
    $comanda->delete($id);
  }
}
