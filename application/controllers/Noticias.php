<?php
    class Noticias extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('noticias_model');
            $this->load->helper('url_helper');
        }

        public function index(){
            $datos['noticias']=$this->noticias_model->get_noticias();
            $datos['título']='Noticias';

            $this->load->view('plantillas/cabecera', $datos);
            $this->load->view('noticias/index',$datos);
            $this->load->view('plantillas/pie');

        }

        public function Ver($slug=NULL)
        {
            $datos['noticia_item'] = $this->noticias_model->get_noticias($slug);

            if(empty($datos['noticia_item'])){
                show_404();
            }
            
            $datos['título']=$datos['noticia_item']['título'];

            $this->load->view('plantillas/cabecera', $datos);
            $this->load->view('noticias/ver',$datos);
            $this->load->view('plantillas/pie');
        }

        public function crear(){
            $this->load->helper('form');
            $this->load->library('form_validation');

            $datos['título'] = 'Crear uan nueva noticia';
            $this->form_validation->set_rules('título','Título','required');
            $this->form_validation->set_rules('texto','Texto','required');

            if($this->form_validation->run()===FALSE){
                $this->load->view('plantillas/cabecera',$datos);
                $this->load->view('noticias/crear');
                $this->load->view('plantillas/pie');
            }
            else{
                $this->noticias_model->set_noticias();
                $this->load->view('noticias/resultado');
            }
        }

        //         public function ver($slug = NULL)
        // {
        // $datos['noticia_item'] = $this->noticias_model->get_noticias($slug);
        // if (empty($datos['noticia_item']))
        // {
        // show_404();
        // }
        // $datos['título'] = $datos['noticia_item']['título'];
        // $this->load->view('plantillas/cabecera', $datos);
        // $this->load->view('noticias/ver', $datos);
        // $this->load->view('plantillas/pie');
        // }
    }
?>