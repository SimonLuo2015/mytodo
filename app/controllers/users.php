<?php
class Users extends CI_Controller{
    public function register(){
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|max_length[50]|min_length[2]|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|max_length[50]|min_length[2]|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[100]|min_length[5]|xss_clean|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]|min_length[6]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[20]|min_length[6]|xss_clean');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|max_length[50]|min_length[2]|xss_clean|matches[password]');

        if($this->form_validation->run() == FALSE){
            $data['main_content'] = 'users/register';
            $this->load->view('layouts/main', $data);
        } else{
            // 先在这里根据需要写出伪代码，然后命名model和function，最后再到对应的model文件夹下编写model代码文件。
            if($this->User_model->create_member()){
                $this->session->set_flashdata('registered', 'You are now registered and can login.');
                redirect('home/index');
            }

        }

    }
}

?>