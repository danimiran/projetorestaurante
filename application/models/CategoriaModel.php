<?php

include_once APPPATH . 'libraries/Tipo.php';
include_once APPPATH . 'libraries/Produto.php';
include_once APPPATH. 'libraries/component/Table.php';

class CategoriaModel extends CI_Model{

  public function lista_categoria(){

    $html = '';
    $tipo = new Tipo();
    $v = $tipo->get_all();

    foreach ($v as $categoria) {
      $html .= $this->tipo_display($categoria);
    }    
    return $html;
  }

  private function tipo_display($categoria){

    $html = '
        <li class="nav-item ml-2">
          <a class="nav-link lead"  href="' . base_url('index.php/categoria/detalhe/' . $categoria['id']) . '" 
           >' . $categoria['nome_categoria'] . '</a>
        </li>
        ';
    return $html;
  }

  public function tabela_categoria(){

    $tipo = new Tipo();
    $data = $tipo->get_all();
    $label = ['#', 'Nome', 'Data de Criação'];
    $table = new table($data, $label);

    $table->useActionButton();
    $table->addIdTable('dataTable');
    $table->addUrlEditar('index.php/Categoria/editar');
    $table->addUrlDelete('index.php/Categoria/deletar');
    $table->useBorder();
    $table->smallRow();  
    return $table->getHTML();
}
 
  public function nome_categoria($id_categoria){
    $tipo = new Tipo();
    return $tipo->get_name($id_categoria);
  }

  public function lista_cardapio($id_categoria){
    $html = '';
    $tipo = new Tipo();
    $lista = $tipo->lista_cardapio($id_categoria);

    foreach ($lista as $produtos) {
      $html .= $this->produto_display($produtos);
    }
    return $html;
  }

  private function produto_display($produtos){

    $html = '
      <div class="jumbotron text-center white col-md-6 p-4">
        <div class="row">
          <div class="col-md-5 offset-md-1 mx-3 my-3">
            <div class="view overlay">
              <img src="'.base_url('uploads/prato/'.$produtos['foto']).'" class="img-fluid" alt="'.$produtos['nome'].'">
              <p class="mt-0 text-secondary"><small>(Imagem ilustrativa)</small></p>
              <a>
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
          </div>
          <div class="col-md-5 text-md-left ml-3 mt-3">
            <a href="" class="texto-vermelho">
              <h6 class="h6 pb-1"><i class="fas fa-utensils pr-1"></i> ' . $produtos['nome_categoria'] . '</h6>
            </a>
            <h5 class="h5 mb-3">' . $produtos['nome'] . '</h4>
            <p class="font-weight-normal text-justify">' . $produtos['descricao'] . '</p>
            <a class="btn darken-4 text-white" style="background-color: #426D49" target="_blank"
            href="">
            Peça no APP</a>
         </div>
        </div>
      </div>';
    return $html;
  }

  public function cria_categoria(){
    if (sizeof($_POST) == 0) return;

    $categoria = $this->input->post('categoria');
    $tipo = new Tipo();
    $tipo->cria($categoria);
    redirect('index.php/categoria/gerenciar?enviado=1');
 
  }
    
  public function edita_categoria($id) {
    if( sizeof($_POST) == 0) return;

    $data = $this->input->post('categoria');
    $tipo = new Tipo();
    $tipo->edita_categoria($data,$id);
    redirect('index.php/categoria/gerenciar?enviado=1');
  }

  public function recupera_id($id) {
    $tipo = new Tipo();
    return $tipo->categoria_data($id);
  }

  public function deletar($id){
    $tipo = new Tipo();
    $tipo->delete($id);
  }
  
}
