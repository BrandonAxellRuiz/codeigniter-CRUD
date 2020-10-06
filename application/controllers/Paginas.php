<?php
    class Paginas extends CI_Controller {
        public function ver($pagina='Inicio')
        {
            if(!file_exists(APPPATH.'views/paginas/'.$pagina.'.php')){
                // Demonios, no tenemos página para eso
                show_404();
            }

            $datos['título']=ucfirst($pagina); //Capitaliza la primera letra

            $this->load->view('plantillas/cabecera',$datos);
            $this->load->view('paginas/'.$pagina,$datos);
            $this->load->view('plantillas/pie', $datos);
        }
    }
?>