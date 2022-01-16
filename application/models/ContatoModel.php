<?php
    include_once APPPATH. 'libraries/Contact.php';
    include_once APPPATH. 'libraries/component/Table.php';

    class ContatoModel extends CI_Model{ 

    public function cria_contato(){
  
        if (sizeof($_POST) == 0) return;

        $this->form_validation->set_rules('contato[nome]', 'Nome', 'trim|required|min_length[2]|max_length[80]');
        $this->form_validation->set_rules('contato[email]', 'E-mail', 'trim|required|valid_email');
        $this->form_validation->set_rules('contato[assunto]', 'Assunto', 'trim|required');
        $this->form_validation->set_rules('contato[mensagem]', 'Mensagem', 'trim|required|min_length[3]|max_length[400]');

        if($this->form_validation->run()){

        $contato = $this->input->post('contato');
        $contact = new Contact();
        $contact->cria($contato); 
        redirect(base_url() . 'index.php/contato?enviado=1');

        }

    }

    public function tabela_contato(){
        $contato = new Contact();
        $data = $contato->lista_contato();
        $label = ['#', 'Nome', 'E-mail','Assunto','Mensagem','Data de envio'];
        $table = new table($data, $label);
    
        $table->useActionButton2();        
        $table->addIdTable('dataTable');        
        $table->addUrlVisualizar('index.php/Contato/visualizar');
        $table->addUrlDelete('index.php/Contato/deletar');
        $table->useBorder();
        $table->smallRow();
        
        return $table->getHTML();
    
      }

      public function detalhe($id) {
       $contact = new Contact();
       $contato = $contact->visualiza_contato($id);
       return $contato;
   }

      public function deletar($id){
        $contato = new Contact();
        $contato->delete($id);
      }    

}