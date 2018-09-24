<?php 
class List_model extends CI_Model{
    public function get_lists(){
        $query = $this->db->get('lists');
        return $query->result();
    }
}


?>