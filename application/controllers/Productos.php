<?php
defined('BASEPATH') OR exit('No direct scrip access allowed');

    class Productos extends CI_Controller{
        /**
         * Obtener TODAla información de este metodo
         * 
         * @return Response
         * 
         */

         public function __construct()
         {
            //  Cargar base de datos en liberías de autocargado

            parent::__construct();
            $this->load->model('Productos_model');
            $this->load->helper('url');
            $this->load->helper('url_helper');
         }

         public function index()
         {
             $productos = new Productos_model;
             $data['data']=$productos->get_productos();
             $this->load->view('plantillas/cabecera');
             $this->load->view('productos/lista',$data);
             $this->load->view('plantillas/pie');
         }

         public function crear(){
             $this->load->view('plantillas/cabecera');
             $this->load->view('productos/crear');
             $this->load->view('plantillas/pie');
         }

        /**
         * 
         * Guardar información desde este método
         * 
         * @return Response
         */

         public function guardar(){
             $productos=new Productos_model;
             $productos->insertar_producto();
             redirect(base_url('index.php/productos'));
         }

         /**
          * Editar información desde este método
          * @return Response
          */

          public function editar($id){
            $producto = $this->db->get_where('productos', array('id'=> $id))->row();
            $this->load->view('plantillas/cabecera');
            $this->load->view('productos/editar',array('producto'=>$producto));
            $this->load->view('plantillas/pie');
          }

          public function actualizar ($id){
              $productos = new Productos_model;
              $productos->actualizar_producto($id);
              redirect(base_url('index.php/productos'));
          }

          public function eliminar($id){
              $this->db->where('id',$id);
              $this->db->delete('productos');
              redirect(base_url('index.php/productos'));
          }
    }
?>