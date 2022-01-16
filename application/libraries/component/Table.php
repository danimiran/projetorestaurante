<?php 

include_once 'Component.php';

class Table extends Component {

    private $data;
    private $label;


    private $header_classes = '';
    private $id_table = '';
    

    private $body_classes = '';

    private $use_action_button = false;
    private $use_action_button2 = false;
    private $use_action_button3 = false;
    private $use_action_button4 = false;

    private $url_visualizar = '';
    private $url_editar = '';
    private $url_deletar = '';
    private $url_edititem = '';
    private $url_imprimir = '';

    function __construct(array $data, array $label) {
        $this->label = $label;
        $this->data = $data;
    }

   
    function getHTML(){
       $html = '<table class="table  '.$this->body_classes.'" id="'.$this->id_table.'" width="100%" cellspacing="0">'; 
       $html .= $this->header();
       $html .= $this->body();
       $html .= '</table>';
       return $html;
    }

    public function addHeaderClass($class) {
        $this->header_classes .= $class.'';
    }
    public function addIdTable($id_tabela) {
        $this->id_table .= $id_tabela.'';
    }

    public function addUrlVisualizar($url) {
        $this->url_visualizar .= $url.'';
    }
    public function addUrlEditar($url) {
        $this->url_editar .= $url.'';
    }

    public function addUrlDelete($url) {
        $this->url_deletar .= $url.'';
    }
    public function addUrlItem($url) {
        $this->url_edititem .= $url.'';
    }
    public function addUrlImprimir($url) {
        $this->url_imprimir .= $url.'';
    }


    private function header() {
        
        $html = '<thead><tr class="text-center">';
        foreach ($this->label as $name) {
            $html .= '<th>'.$name.'</th>';
        }
        if($this->use_action_button) {
            $html .= '<th>Ação</th>';
        }
        else {
            if($this->use_action_button2) {
                $html .= '<th>Ação</th>';
            }
            else {
                if($this->use_action_button3) {
                    $html .= '<th>Ação</th>';
                }
                else {
                    if($this->use_action_button4) {
                        $html .= '<th>Ação</th>';
                    }
                }
            }
        }

        $html .= '</tr></thead>';
        return $html;
    }


    
    private function action_buttons($id) {
        $html = '<div class="tooltipo"><a href="'.base_url($this->url_editar.'/'.$id).'">';
        $html .= '<i  class="fas fa-pencil-alt text-warning mr-2"></i></a><span class="tooltiptexto">Editar</span></div>';
        $html .= '<div class=" ml-3 tooltipo"><a href="'.base_url($this->url_deletar.'/'.$id).'">';
        $html .= '<i class="fas fa-times text-danger"></i></i><span class="tooltiptexto">Deletar</span></div></a>';

        return $html;
    }
    private function action_buttons2($id) {
       
        $html = '<div class="tooltipo"><a href="'.base_url($this->url_visualizar.'/'.$id).'">';
        $html .= '<i  class="fa fa-eye text-black mr-2"></i></a><span class="tooltiptexto">Visualizar</span></div>';
        $html .= '<div class=" ml-2 tooltipo"><a href="'.base_url($this->url_deletar.'/'.$id).'">';
        $html .= '<i class="fas fa-times text-danger"></i></i><span class="tooltiptexto">Deletar</span></div></a>';

        return $html;
    }
   
    private function action_buttons3($id) {
       
       
        $html = '<div class="tooltipo"><a href="'.base_url($this->url_edititem.'/'.$id).'">';
        $html .= '<i  class="fas fa-utensils text-dark mr-1"></i></a><span class="tooltiptexto">Edite pedido</span></div>';
        $html .= '<div class="tooltipo"><a href="'.base_url($this->url_editar.'/'.$id).'">';
        $html .= '<i  class="fas fa-pencil-alt text-warning ml-1"></i></a><span class="tooltiptexto">Edite comanda</span></div>';
        $html .= '<div class="tooltipo"><a href="'.base_url($this->url_imprimir.'/'.$id).'" target="_blank">';
        $html .= '<i  class="fas fa-print text-success ml-1"></i></a><span class="tooltiptexto">Imprimir</span></div>';
        $html .= '<div class=" ml-2 tooltipo"><a href="'.base_url($this->url_deletar.'/'.$id).'">';
        $html .= '<i class="fas fa-times text-danger"></i></i><span class="tooltiptexto">Deletar</span></div></a>';

        return $html;
    }

    private function action_buttons4($id) {
       
        $html = '<div class="tooltipo"><a href="'.base_url($this->url_editar.'/'.$id).'">';
        $html .= '<i  class="fas fa-pencil-alt text-warning mr-2"></i></a><span class="tooltiptexto">Editar</span></div>';
        $html .= '<div class="tooltipo"><a href="'.base_url($this->url_visualizar.'/'.$id).'">';
        $html .= '<i  class="fa fa-eye text-black mr-2"></i></a><span class="tooltiptexto">Visualizar</span></div>';
        $html .= '<div class=" ml-2 tooltipo"><a href="'.base_url($this->url_deletar.'/'.$id).'">';
        $html .= '<i class="fas fa-times text-danger"></i></i><span class="tooltiptexto">Deletar</span></div></a>';

        return $html;
    }

    private function body() {

        $html = '<tbody>';

        foreach($this->data as $row) {
            $html .= '<tr>';


            foreach ($row as $cel) {
                $html .= '<td class ="text-truncate diminui">'.$cel.'</td>';
            }
  
        if($this->use_action_button) {
            $html .= '<td class="text-center ">'.$this->action_buttons($row['id']).'</td>';
        }

        else {
            if($this->use_action_button2) {
            $html .= '<td class="text-center ">'.$this->action_buttons2($row['id']).'</td>';
        }
        else {
            if($this->use_action_button3) {
            $html .= '<td class="text-center ">'.$this->action_buttons3($row['id']).'</td>';
            }
            else {
                if($this->use_action_button4) {
                $html .= '<td class="text-center ">'.$this->action_buttons4($row['id']).'</td>';
                }
             }
         }
        
        }

        
        $html .= '</tr>';

          
        }
        $html .= '</tbody>';
        return $html;

    }

    public function useZebra(){
        $this->body_classes .= 'table-striped ';
    }
    public function useBorder(){
        $this->body_classes .= 'table-bordered ';
    }
    public function useHover(){
        $this->body_classes .= 'table-hover ';
    }
    public function smallRow(){
        $this->body_classes .= 'table-sm';
    }

    public function useActionButton() {
        $this->use_action_button = true;
    }
    public function useActionButton2() {
        $this->use_action_button2 = true;
    }
    public function useActionButton3() {
        $this->use_action_button3 = true;
    }
    public function useActionButton4() {
        $this->use_action_button4 = true;
    }
  

}