<?php
include_once APPPATH . 'libraries/Login.php';
include_once APPPATH . 'libraries/Item.php';
include_once APPPATH . 'libraries/Sistema.php';
include_once APPPATH . 'libraries/component/Table.php';

class AdminModel extends CI_Model {

    public function logar() { 

        if (sizeof($_POST) == 0) return;
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required|min_length[6]|max_length[30]');

        $_check_form = $this->form_validation->run();

        if ($_check_form === FALSE) {
            echo "<script>alert( 'preencha todos os campos antes de salvar')</script>";
        } else {
            $email = $this->input->post('email');
            $senha = $this->input->post('senha');
            $login = new Login();
            if ($login->verifica_login($email, $senha)) {
                $session_data = array(
                    'email' => $email
                );
                $this->session->set_userdata($session_data);
                redirect(base_url('index.php/admin'));
            }
        }
        redirect(base_url('index.php/home'));
        return $_check_form;
    }

    public function tabela_faturamento(){

        $item = new Item();
        $data = $item->vendas_mes();
        $label = ['Ano de venda', 'Mês de venda','Faturamento'];
        $table = new table($data, $label);
        $table->addIdTable('dataTable');
        $table->useHover();
        $table->useBorder();
        $table->smallRow();
        
        return $table->getHTML();
    
    }
    
    public function tabela_venda(){

        $item = new Item();
        $data = $item->itens_vendidos();
        $label = ['Ano de referência','Mês da venda','Nome do produto', 'Quantidade Vendida','Faturamento'];
        $table = new table($data, $label);
        $table->addIdTable('tabela');
        $table->useHover();
        $table->useBorder();
        $table->smallRow();
        return $table->getHTML();
    }

    public function contato() {
        $sistema = new Sistema();
        $valor = $sistema->conta_contato();
        return $valor;
    }
    public function cardapio() {
        $sistema = new Sistema();
        $valor = $sistema->conta_cardapio();
        return $valor;
    }
    public function categoria() {
        $sistema = new Sistema();
        $valor = $sistema->conta_categoria();
        return $valor;
    }
    public function comanda() {
        $sistema = new Sistema();
        $valor = $sistema->conta_comanda();
        return $valor;
    }
    
}
