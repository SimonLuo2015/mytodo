<?php
class Task_model extends CI_Model{
    public function get_task($id){
        $query = $this->db->get('tasks');
        $this->db->where('id', $id);
        return $query->row();
    }

    public function check_if_complete($id){
        $query = $this->db->get('tasks');
        $this->db->where('id', $id);
        return $query->row()->is_complete;
    }

    public function get_list_name($list_id){
        $this->db->where('id', $list_id);
        $query = $this->db->get('lists');
        return $query->row()->list_name;
    }

    public function create_task($data){
        $insert = $this->db->insert('tasks', $data);
        return $insert;
    }
}