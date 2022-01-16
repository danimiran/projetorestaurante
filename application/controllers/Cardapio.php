<?php

class Cardapio extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('CardapioModel','model');
    }

    public function index() {
        
        if($this->session->userdata('email') != ''){
        $html = $this->load->view('usuario/admin/navbarAdmin', null, true); 
        if(isset($_GET['enviado']) && $_GET['enviado']) {
            $html .= $this->load->view('prato/cardapio/sucesso', null, true);    
        }
        $html .= $this->load->view('prato/cardapio/header_tabela', null, true); 
        $data['tabela'] = $this->model->tabela_cardapio(); 
        $html .= $this->load->view('common/tabela',$data,true);
        $this->show($html); 
     } else {
         redirect(base_url('index.php/home'));
     }

    }
    
    public function cadastro() {

        if($this->session->userdata('email') != ''){
        $html = $this->load->view('usuario/admin/navbarAdmin', null, true);
        $select['selecao_categoria'] = $this->model->selecao_categoria(); 
        $data['conteudo'] = $this->load->view('prato/cardapio/upload_prato', null, true);
        $data['conteudo'] .= $this->load->view('prato/cardapio/form_prato', $select, true);
        $this->model->cadastra_produto();
        $html .= $this->load->view('prato/cardapio/form', $data, true);
        $this->show($html);
        } else {
            redirect(base_url('index.php/home'));
        }   
    }

    public function editar($id) {

        if($this->session->userdata('email') != ''){
        $html = $this->load->view('usuario/admin/navbarAdmin', null, true); 
        $data['prato'] = $this->model->recupera_id($id);     
        $select['selecao_categoria'] = $this->model->selecao_categoria(); 
        $form['conteudo'] = $this->load->view('prato/cardapio/upload_prato', $data, true);
        $form['conteudo'] .= $this->load->view('prato/cardapio/form_prato', $select, true);
        $this->model->edita_cardapio($id);
        $html .= $this->load->view('prato/cardapio/form', $form, true);
        $this->show($html);
        } else {
            redirect(base_url('index.php/home'));
        }

    }

    public function visualizar($id) {

        if($this->session->userdata('email') != ''){
        $html = $this->load->view('usuario/admin/navbarAdmin', null, true);   
        $data['produto'] = $this->model->detalhe($id); 
        $html .= $this->load->view('prato/cardapio/detalhe',$data,true);
        $this->show($html);  
        } else {
            redirect(base_url('index.php/home'));
        }
    }

    public function deletar($id) {

        if($this->session->userdata('email') != ''){
        $this->model->deletar($id);
        redirect(base_url() . 'index.php/cardapio');    
        } else {
            redirect(base_url('index.php/home'));
        }
        
    }

}