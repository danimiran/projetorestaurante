<?php
class Categoria extends MY_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('CategoriaModel', 'model');
    }

    public function index(){

        $html = $this->load->view('home/navbar', null, true);
        $html .= $this->load->view('home/inicial/modal_adm', null, true);
        $data['categoria'] = $this->model->lista_categoria();
        $html .= $this->load->view('prato/categoria/lista', $data, true);
        $html .= '<h4 class="text-center my-5">Selecione uma categoria para visualizar os pratos</h4>';
        $html .= $this->load->view('home/rodape', null, true);
        $this->show($html);
    }

    public function detalhe($id_categoria){

        $html = $this->load->view('home/navbar', null, true);
        $cat['categoria'] = $this->model->lista_categoria();
        $html .= $this->load->view('prato/categoria/lista', $cat, true);
        $data['nome_categoria'] = $this->model->nome_categoria($id_categoria);
        $data['produto'] = $this->model->lista_cardapio($id_categoria);
        $html .= $this->load->view('home/inicial/modal_adm', null, true);
        $html .= $this->load->view('prato/categoria/detalhe', $data, true);
        $html .= $this->load->view('home/rodape', null, true);
        $this->show($html);
    }

    public function gerenciar(){

        if ($this->session->userdata('email') != '') {
            $html = $this->load->view('usuario/admin/navbarAdmin', null, true);
            if (isset($_GET['enviado']) && $_GET['enviado']) {
                $html .= $this->load->view('prato/cardapio/sucesso', null, true);
            }
            $html .= $this->load->view('prato/categoria/header_lista', null, true);
            $data['tabela'] = $this->model->tabela_categoria();
            $html .= $this->load->view('common/tabela.php', $data, true);
            $this->show($html);
        } else {
            redirect(base_url('index.php/home'));
        }
    }

    public function cadastro(){

        if ($this->session->userdata('email') != '') {
        $html = $this->load->view('usuario/admin/navbarAdmin', null, true);
        $this->model->cria_categoria();
        $html .= $this->load->view('prato/categoria/form', null, true);
        $this->show($html);
        } else {
            redirect(base_url('index.php/home'));
        }

    }

    public function editar($id){

        if ($this->session->userdata('email') != '') {
        $html = $this->load->view('usuario/admin/navbarAdmin', null, true);
        $data['categoria'] = $this->model->recupera_id($id);
        $html .= $this->load->view('prato/categoria/form', $data, true);
        $this->model->edita_categoria($id);
        $this->show($html);
        } else {
            redirect(base_url('index.php/home'));
        }
    }

    public function deletar($id){

        if ($this->session->userdata('email') != '') {
        $this->model->deletar($id);
        redirect('index.php/Categoria/gerenciar');
        }else {
            redirect(base_url('index.php/home'));
        }
    }
}
