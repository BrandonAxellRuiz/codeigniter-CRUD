<?php
    class Productos_model extends CI_Model{
        public function __construct()
        {
            $this->load->database();
        }

        public function get_productos(){
            if(!empty($this->input->get("search"))){
                $this->db->like('title', $this->input->get("search"));
                $this->db->or_like('description', $this->input->get("search")); 
              }
              $query = $this->db->get("productos");
              return $query->result();
        }

        public function insertar_producto(){
            $data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description')
            );
            return $this->db->insert('productos', $data);
        }

        public function actualizar_producto($id) 
        {
            $data=array(
                'title' => $this->input->post('title'),
                'description'=> $this->input->post('description')
            );
            if($id==0){
                return $this->db->insert('producto',$data);
            }else{
                $this->db->where('id',$id);
                return $this->db->update('productos',$data);
            }        
        }
                
    }
