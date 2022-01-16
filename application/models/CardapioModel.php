<?php

include APPPATH . 'libraries/Produto.php';
include APPPATH . 'libraries/Tipo.php';
include_once APPPATH . 'libraries/component/Table.php';

class CardapioModel extends CI_Model {
  
   private function upload_foto() {

    $config['upload_path']           = './uploads/prato/';
    $config['allowed_types']         ='png|jpg|jpeg|bmp';
    $config['encrypt_name']         = true;

    return $config;
  }

  public function cadastra_produto(){

    if (sizeof($_POST) == 0) return;
    $this->form_validation->set_rules('cardapio[nome]', 'Nome do Prato', 'trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('cardapio[categoria]', 'Categoria', 'trim|required');
    $this->form_validation->set_rules('cardapio[descricao]', 'Descricao do Prato', 'trim|required|min_length[3]|max_length[200]');
    $this->form_validation->set_rules('cardapio[preco]', 'Preço', 'trim|required|min_length[4]|max_length[6]');
    if (empty($_FILES['foto']['name'])) {$this->form_validation->set_rules('foto', 'foto', 'trim|required');}


    if ($this->form_validation->run() === true) {
      $cardapio = $this->input->post('cardapio');
      $this->load->library('upload', $this->upload_foto());

      if ($this->upload->do_upload("foto")) {
        $info_arquivo = $this->upload->data();
        $info_arquivo = $info_arquivo['file_name'];
        $cardapio['foto'] = $info_arquivo;
        $produto = new Produto();
        $produto->cria($cardapio);
        redirect('index.php/cardapio?enviado=1');
      }
    }
  }

  public function edita_cardapio($id) {

    $produto = new Produto();
    $cardapio = $produto->cardapio_data($id);

      if (sizeof($_POST) == 0) return;
      $data = $this->input->post('cardapio');
      $this->load->library('upload', $this->upload_foto());

      if ($this->upload->do_upload("foto")) {
        $arquivo = './uploads/prato/' . $cardapio['foto'];
        if(file_exists($arquivo)) {
          unlink($arquivo);
        }
        $info_arquivo = $this->upload->data();
        $info_arquivo = $info_arquivo['file_name'];
        $data['foto'] = $info_arquivo;
      }
      $produto->edita_cardapio($data, $id);
      redirect('index.php/cardapio?enviado=1');   
  }

  public function recupera_id($id) {
    $produto = new Produto();
    return $produto->cardapio_data($id);
}

  public function tabela_cardapio() {

    $produto = new Produto();
    $data = $produto->lista_cardapio();
    $label = ['#', 'Nome', 'Categoria', 'Descrição', 'Preço'];
    $table = new table($data, $label);

    $table->useActionButton4();
    $table->addIdTable('dataTable');
    $table->addUrlVisualizar('index.php/Cardapio/visualizar');
    $table->addUrlEditar('index.php/Cardapio/editar');
    $table->addUrlDelete('index.php/Cardapio/deletar');
    $table->useBorder();
    $table->smallRow();
    return $table->getHTML();
  }
 
  public function selecao_categoria() {

    $html = '';
    $categoria = new Tipo();
    $produto = new Produto();
    $select = $categoria->select();
    //$cardapio = $produto->cardapio_data($id);

    foreach ($select as $categoria) {
      $html .= $this->selecao_lista($categoria);
    }
    return $html;
  }
  
  private function selecao_lista($categoria) {
   // $html = ' <option '.($cardapio['categoria'] == $categoria['id'] ? 'selected' : false) . ''.' value="'.$categoria['id'] . '">' . $categoria['nome_categoria'] . '</option>';
    $html = ' <option value="'.$categoria['id'] . '">' . $categoria['nome_categoria'] . '</option>';
    return $html;
  }

  public function detalhe($id) {
    $produto = new Produto();
    $cardapio = $produto->detalhes($id);
    return $cardapio;
}

  public function deletar($id) {
    $produto = new Produto();
    $cardapio = $produto->cardapio_data($id);
    $arquivo = './uploads/prato/' . $cardapio['foto'];
    if(file_exists($arquivo)) {
      unlink($arquivo);
    }
    $produto->delete($id);
  }
}
