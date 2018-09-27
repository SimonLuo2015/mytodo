<?php
class Tasks extends CI_Controller{
    public function show($id){
        $data['task'] = $this->Task_model->get_task($id);
        // check if markded complete
        $data['is_complete'] = $this->Task_model->check_if_complete($id);
        // Load view and layout
        $data['main_content'] = 'tasks/show';
        $this->load->view('layouts/main', $data);
    }

    public function add($list_id = null){
        $this->form_validation->set_rules('task_name', 'Task Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('task_body', 'Task body', 'trim|xss_clean');
        if($this->form_validation->run() == false){
            // Get list name for view
            $data['list_name'] = $this->Task_model->get_list_name($list_id);
            // Load view and layout
            $data['main_content'] = 'tasks/add_task';
            $this->load->view('layouts/main', $data);
        } else {
            // Post values to array
            $data = array(
                'task_name' => $this->input->post('task_name'),
                'task_body' => $this->input->post('task_body'),
                'due_date'  => $this->input->post('due_date'),
                'list_id'   => $list_id
            );

            if($this->Task_model->create_task($data)){
                $this->session->set_flashdata('task_created', 'Your task has been created');
                // Redirect to index page with error above.
                redirect('lists/show/'.$list_id.'');
            }
        }

    }
}