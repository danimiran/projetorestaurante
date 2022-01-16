<?php
class Pedidos extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('PedidosModel', 'model');
        $this->load->model('ItemModel', 'item');
        $this->load->model('GerenciaComandaModel', 'comanda');
    }

    public function index() {

        if($this->session->userdata('email') != ''){
        $html = $this->load->view('usuario/admin/navbarAdmin', null, true);  
        $data['tabela'] = $this->comanda->comanda_hoje(); 
        $data['lista_geral'] = $this->comanda->tabela_comanda(); 
        $html .= $this->load->view('prato/comanda/header_lista',null,true);
        if(isset($_GET['enviado']) && $_GET['enviado']) {
            $html .= $this->load->view('prato/cardapio/sucesso', null, true);    
        }
        $html .= $this->load->view('prato/comanda/table_comanda',$data,true);
        $this->show($html); 
        } else {
            redirect(base_url('index.php/home'));
        }   
    }

    public function status($id) {

        if($this->session->userdata('email') != ''){
        $this->comanda->status($id);
        $volte = "<script>window.open(document.referrer,'_self');</script>";
        echo $volte;
        } else {
            redirect(base_url('index.php/home'));
        } 
    }

    public function adiciona() {

        if($this->session->userdata('email') != ''){
        $html = $this->load->view('usuario/admin/navbarAdmin', null, true);
        $this->model->aux();
        $html .= $this->load->view('prato/comanda/adicionaComanda', null, true);
        $this->show($html);
        } else {
            redirect(base_url('index.php/home'));
        } 
    }

    public function editar($id) {
       
        if($this->session->userdata('email') != ''){
        $html = $this->load->view('usuario/admin/navbarAdmin', null, true);
        $data['comanda'] = $this->model->recupera_id($id);
        $html .= $this->load->view('prato/comanda/gerencia', null, true);
        $html .= $this->load->view('prato/comanda/adicionaComanda', $data, true);
        $this->model->edita_comanda($id);
        $this->show($html);
        } else {
            redirect(base_url('index.php/home'));
        }
    }

    
    public function visualizar($id) {

        if($this->session->userdata('email') != ''){
        $html = $this->load->view('usuario/admin/navbarAdmin', null, true); 
        $data['comanda'] = $this->model->recupera_id($id);
        $data['item'] = $this->item->tabela_imprime($id); 
        $html .= $this->load->view('prato/comanda/gerencia', null, true);
        $html .= $this->load->view('prato/comanda/detalhe',$data,true);
        $this->show($html);  
        } else {
            redirect(base_url('index.php/home'));
        }
    }

    public function imprimir($id) {

        if($this->session->userdata('email') != ''){
        $data['comanda'] = $this->model->recupera_id($id);
        $data['item'] = $this->item->tabela_imprime($id);
        $html = $this->load->view('prato/comanda/imprimir', $data, true);
        $this->show($html);
        } else {
            redirect(base_url('index.php/home'));
        }
    }

    public function deletar($id) {

        if($this->session->userdata('email') != ''){
        $this->model->deleta($id);
        $volte = "<script>window.open(document.referrer,'_self');</script>";
        echo $volte;
        } else {
            redirect(base_url('index.php/home'));
        }
    }
   
}
