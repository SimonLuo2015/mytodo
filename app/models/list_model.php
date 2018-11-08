<?php 
class List_model extends CI_Model{
    public function get_lists(){
        $query = $this->db->get('lists');
        return $query->result();
    }

    public function get_list($id){
        // $this->db->where('id', $id);
        // $query = $this->db->get('lists');
        // // 你妈啊，这里上面两行写反了，导致get_list函数不管输入
        // // 的id是多少，都直接返回第一条记录。
        // return $query->row();

        // 上面是原来的写法，说是引起程序报错，所以修改成下面的写法。
        // 但是我自己验证了下，上面的写法也是ok的。
        $this->db->select('*');
        $this->db->from('lists');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if($query->num_rows() != 1){
            return FALSE;
        } else {
            return $query->row();
        }
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

    public function get_list_tasks($list_id, $active=TRUE){
        $this->db->select('
                            tasks.task_name,
                            tasks.task_body,
                            tasks.id as task_id,
                            lists.list_name,
                            lists.list_body
                        ');
        $this->db->from('tasks');
        $this->db->join('lists', 'tasks.list_id = lists.id');
        $this->db->where('tasks.list_id', $list_id);
        if($active == TRUE){
            $this->db->where('tasks.is_complete', 0);
        } else {
            $this->db->where('tasks.is_complete', 1);
        }
        $query = $this->db->get();
        if($query->num_rows() < 1){
            return FALSE;
        } 
        return $query->result();
    }
}


?>