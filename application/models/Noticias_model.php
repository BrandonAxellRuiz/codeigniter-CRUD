<?php
    class Noticias_model extends CI_Model {
        public function __construct()
        {
            $this->load->database();
        }

        public function get_noticias($slug=FALSE)
        {
            if($slug===FALSE)
            {
                $query = $this->db->get('noticias');
                return $query->result_array();
            }

            $query=$this->db->get_where('noticias',array('slug'=>$slug));
            return $query->row_array();
        }

        public function set_noticias(){
            $this->load->helper('url');

            $slug=url_title($this->input->post('título'),'dash',TRUE);

            $datos = array(
                'título'=>$this->input->post('título'),
                'slug'=>$slug,
                'texto'=>$this->input->post('texto')
            );

            return $this->db->insert('noticias',$datos);
        }
    }
?>