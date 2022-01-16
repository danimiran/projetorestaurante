<?php
class Itens extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('PedidosModel', 'pedido');
        $this->load->model('ItemModel', 'item');
    }

    public function index(){
        if($this->session->userdata('email') != ''){
        redirect(base_url('index.php/pedidos/'));
        } else {
            redirect(base_url('index.php/home'));
        } 
    }

     public function addItem($id) {
       
        if($this->session->userdata('email') != ''){
        $html = $this->load->view('usuario/admin/navbarAdmin', null, true);
        $data['comanda'] = $this->pedido->recupera_id($id);
        $this->item->addProduto();
        $html .= $this->load->view('prato/comanda/gerencia', null, true);
        $html .= $this->load->view('prato/comanda/itens_pedidos', $data, true);
        $dat['tabela'] = $this->item->gera_tabela($id);
        $html .= $this->load->view('prato/comanda/table_item', $dat, true);
        $this->show($html);
        } else {
            redirect(base_url('index.php/home'));
        } 
    }

    public function autoCompleteProduto() {

        if($this->session->userdata('email') != ''){
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->item->autoCompleteProduto($q);
        }
        } else {
            redirect(base_url('index.php/home'));
        } 
    }

    public function deletar($id) {

        if($this->session->userdata('email') != ''){
        $this->item->deletaItem($id);
        $volte = "<script>window.open(document.referrer,'_self');</script>";
        echo $volte;
        } else {
            redirect(base_url('index.php/home'));
        } 
    }
}
