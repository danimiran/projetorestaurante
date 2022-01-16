<?php

include_once APPPATH . 'libraries/Comanda.php';
include_once APPPATH . 'libraries/component/Table.php';

class GerenciaComandaModel extends CI_Model{

    public function tabela_comanda(){
        $html = '';
        $comanda = new Comanda();
        $data = $comanda->get_all();
        foreach ($data as $comanda) {
            $html = $this->table_info($html, $comanda);
        }
        return $html;
    }
    
    public function comanda_hoje(){
        $html = '';
        $comanda = new Comanda();
        $data = $comanda->get_data();
        foreach ($data as $comanda) {
            $html = $this->table_info($html, $comanda);
        }
        return $html;
    }

    public function comanda_status(){
        $html = '';
        $comanda = new Comanda();
        $data = $comanda->get_status();
        foreach ($data as $comanda) {
            $html = $this->table_info($html, $comanda);
        }
        return $html;
    }

    private function table_info($html, $comanda){

        $html .= '<tr>';
        $html .= '<td> ' . $comanda['id'] . '</a></td>';
        $html .= '<td> ' . date('d/m/Y H:i:s', strtotime($comanda['data'])) . '</td>';
        $html .= '<td> ' . $comanda['nome'] . '</a></td>';
        $html .= '<td> ' . $comanda['mesa'] . '</td>';
        $html .= '<td class="text-center ">' . ($comanda['status'] == 1 ?
        $this->action_status($comanda['id']) : $this->action_status2($comanda['id'])) . '</td>';
        $html .= '<td class="text-center"> ' . $this->action_buttons($comanda['id']) . '</td>';
        $html .= '</tr>';
        return $html;
    }

    private function action_buttons($id){
        $html = '<div class="tooltipo"><a href="' . base_url('index.php/pedidos/visualizar/' . $id) . '">';
        $html .= '<i  class="fa fa-eye text-black mr-1"></i></a><span class="tooltiptexto">Visualizar</span></div>';
        $html .= '<div class="tooltipo"><a href="' . base_url('index.php/itens/additem/' . $id) . '">';
        $html .= '<i  class="fas fa-utensils text-dark ml-1"></i></a><span class="tooltiptexto">Edite pedido</span></div>';
        $html .= '<div class="tooltipo"><a href="' . base_url('index.php/pedidos/editar/' . $id) . '">';
        $html .= '<i  class="fas fa-pencil-alt text-warning ml-1"></i></a><span class="tooltiptexto">Edite comanda</span></div>';
        $html .= '<div class="tooltipo"><a href="' . base_url('index.php/pedidos/imprimir/' . $id) . '" target="_blank">';
        $html .= '<i  class="fas fa-print text-success ml-1"></i></a><span class="tooltiptexto">Imprimir</span></div>';
        $html .= '<div class=" ml-2 tooltipo"><a href="' . base_url('index.php/pedidos/deletar/' . $id) . '">';
        $html .= '<i class="fas fa-times text-danger"></i></i><span class="tooltiptexto">Deletar</span></div></a>';
        return $html;
    }

    private function action_status($id){
        $html = '<span class="label p-1 borda-redonda bg-success"><a class="text-white" href="' . base_url('index.php/pedidos/status/' . $id) . '"';
        $html .= 'title="Deixar em aberto">Finalizado</a></span>';
        return $html;
    }

    private function action_status2($id){
        $html = '<span class="label p-1 borda-redonda  bg-warning"><a class="text-white" href="' . base_url('index.php/pedidos/status/' . $id) . '"';
        $html .= 'title="Finalizar">Aberto</a></span>';
        return $html;
    }

    public function status($id){
        $comanda = new Comanda;
        $dados = $comanda->comanda_data($id);

        if ($dados['status'] == 0) {
            $status['status'] = 1;
        } else {
            $status['status'] = 0;
        }
        $comanda->edita_comanda($status, $id);
    }
}
