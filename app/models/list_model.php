<?php 
class List_model extends CI_Model{
    public function get_lists(){
        $query = $this->db->get('lists');
        return $query->result();
    }

    public function get_list($id){
        $this->db->where('id', $id);
        $query = $this->db->get('lists');
        // 你妈啊，这里上面两行写反了，导致get_list函数不管输入
        // 的id是多少，都直接返回第一条记录。
        return $query->row();
    }

    public function create_list($data){
        $insert = $this->db->insert('lists', $data);
        return $insert;
    }

    public function edit_list($list_id, $data){
        $this->db->where('id', $list_id);
        $this->db->update('lists', $data);
        return TRUE;
    }

    public function get_list_data($list_id){
        $this->db->where('id', $list_id);
        $query = $this->db->get('lists');
        return $query->row();
    }

    public function delete_list($list_id){
        $this->db->where('id', $list_id);
        $this->db->delete('lists');
        // $this->delete_tasks_of_list($list_id);
        return;
    }

    public function get_all_lists($user_id){
        $this->db->where('list_user_id', $user_id);
        $this->db->order_by('create_date', 'asc');
        $query = $this->db->get('lists');
        return $query->result();
    }
}


?>