<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library(['session', 'upload']);
        $this->load->helper(['url', 'form']);
    }

    public function index() {
        $this->load->view('login_view');
    }

    public function register() {
        $this->load->view('register_view');
    }

    public function register_user() {
        $config = [
            'upload_path' => FCPATH . 'uploads/',
            'allowed_types' => 'jpg|png|jpeg|gif|webp',
            'max_size' => 2048
        ];
        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, true);
        }

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('image')) {
            echo "Upload error: " . $this->upload->display_errors();
            return;
        }

        $upload_data = $this->upload->data();
		$password = $this->input->post('password');

        $data = [
            'name'     => $this->input->post('name'),
            'email'    => $this->input->post('email'),
           // 'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
		   'password' => password_hash($password, PASSWORD_DEFAULT),
    'plain_password' => $password, // for development use only
            'gender'   => $this->input->post('gender'),
            'image'    => $upload_data['file_name'],
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->User_model->insert_user($data);
        redirect('user/index');
    }

    public function login_user() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->User_model->get_user_by_email($email);

        if ($user && password_verify($password, $user->password)) {
            $this->session->set_userdata('user_id', $user->id);
            redirect('user/dashboard');
        } else {
            echo "<h3 style='color:red;'>❌ Invalid email or password.</h3>";
        }
    }

    public function dashboard() {
        if (!$this->session->userdata('user_id')) {
            echo "⚠️ Session not found. Please login.";
            return;
        }

        $data['users'] = $this->User_model->get_all_users();
        $this->load->view('dashboard_view', $data);
    }

    public function edit($id) {
        $data['user'] = $this->User_model->get_user_by_id($id);
        $this->load->view('edit_view', $data);
    }

    public function update_user($id) {
        $data = [
            'name'   => $this->input->post('name'),
            'email'  => $this->input->post('email'),
            'gender' => $this->input->post('gender')
        ];

        $this->User_model->update_user($id, $data);
        redirect('user/dashboard');
    }

    public function delete($id) {
        $this->User_model->delete_user($id);
        redirect('user/dashboard');
    }

    public function report() {
        $data['users'] = $this->User_model->get_all_users();
        $this->load->view('report_view', $data);
    }

    public function logout() {
        $this->session->unset_userdata('user_id');
        redirect('user/index');
    }
}
