<?php

class Contato extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('ContatoModel','model');
    }

    public function index() {  

        $html = $this->load->view('home/navbar', null, true); 
        $html .= $this->load->view('home/inicial/modal_adm', null, true);
        $this->model->cria_contato();
        $html .= $this->load->view('home/contato/mapa', null, true);   
        if(isset($_GET['enviado']) && $_GET['enviado']) {
            $html .= $this->load->view('prato/cardapio/sucesso', null, true);  
        }      
        $html .= $this->load->view('home/contato/formulario', null, true);
        $html .= $this->load->view('home/rodape', null, true); 
        $this->show($html);  
    }

    public function lista() {

        if($this->session->userdata('email') != ''){
        $html = $this->load->view('usuario/admin/navbarAdmin', null, true); 
        $data['tabela'] = $this->model->tabela_contato(); 
        $html .= $this->load->view('home/contato/header_lista', null, true);
        $html .= $this->load->view('common/tabela',$data,true);
        $this->show($html);
        } else {
            redirect(base_url('index.php/home'));
        } 
    }

    public function visualizar($id) {

        if($this->session->userdata('email') != ''){
        $html = $this->load->view('usuario/admin/navbarAdmin', null, true);  
        $data['contato'] = $this->model->detalhe($id); 
        $html .= $this->load->view('home/contato/detalhe',$data,true);
        $this->show($html); 
        } else {
            redirect(base_url('index.php/home'));
        }  
    }
    
    public function deletar($id) {
        
        if($this->session->userdata('email') != ''){
        $this->model->deletar($id);
        redirect('index.php/contato/lista');
        } else {
            redirect(base_url('index.php/home'));
        }  
    }   

}