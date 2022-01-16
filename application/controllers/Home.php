<?php

class Home extends MY_Controller {
    
    public function index() {
        $html = $this->load->view('home/navbar', null, true);
        $html .= $this->load->view('home/inicial/jumbotron', null, true);
        $html .= $this->load->view('home/inicial/modal_horario', null, true);
        $html .= $this->load->view('home/inicial/modal_adm', null, true);
        $html .= $this->load->view('home/inicial/historia', null, true);
        $html .= $this->load->view('home/inicial/ifood', null, true);
        $html .= $this->load->view('home/rodape', null, true);
        $this->show($html);
    }
    public function galeria() {
        $html = $this->load->view('home/navbar', null, true);
        $html .= $this->load->view('home/inicial/modal_adm', null, true);
        $html .= $this->load->view('home/galeria/carousel', null, true);
        $html .= $this->load->view('home/galeria/galeria', null, true);
        $html .= $this->load->view('home/rodape', null, true);
        $this->show($html);
    }

}
