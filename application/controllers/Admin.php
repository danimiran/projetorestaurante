<?php

class Admin extends MY_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('AdminModel','model');
        $this->load->model('GerenciaComandaModel','comanda');
    }

    public function index(){

        if($this->session->userdata('email') != ''){
        $html = $this->load->view('usuario/admin/navbarAdmin', null, true);
        $data['tabela'] = $this->comanda->comanda_status(); 
        $venda['venda'] = $this->model->tabela_venda(); 
        $venda['faturamento'] = $this->model->tabela_faturamento(); 
        $contagem['contato'] = $this->model->contato(); 
        $contagem['categoria'] = $this->model->categoria(); 
        $contagem['cardapio'] = $this->model->cardapio(); 
        $contagem['comanda'] = $this->model->comanda(); 
        $html .= $this->load->view('usuario/admin/card_lista', null, true);
        $html .= $this->load->view('usuario/admin/table_status', $data, true);
        $html .= $this->load->view('usuario/admin/admin_faturamento', $venda, true);
        $html .= $this->load->view('usuario/admin/painel_admin', $contagem, true);
        $this->show($html);
        } else{
            redirect('index.php/home');
        }
    }

    public function login_sessao() {  
            $this->model->logar();
    }
    
    public function logout() {
        if($this->session->userdata('email') != ''){
        $this->session->sess_destroy();
        redirect('index.php/home');
        }else{
            redirect('index.php/home');
        }
    }
}
