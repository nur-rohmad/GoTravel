<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

    }
    public function index()
    {
        if($this->session->userdata('email')){
            redirect('penumpang');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if($this->form_validation->run() == false){
            $data['title']="Login";
            $this->load->view('templete/header_auth', $data);
            $this->load->view('auth/login');
            $this->load->view('templete/footer_auth');
        }else
        {
            $this->_login();

        }
       
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user',['email' => $email])->row_array();
      
        if($user)
        {
            //jika berhasil login
            if($password == $user['password']){
                //jika cocok
                $data = [
                    'email' => $user['email'],
                    'role_id' => $user['role_id'],
                    'id' => $user['id'],
                    'nama' => $user['name']
                ];
                $this->session->set_userdata($data);
                var_dump($data['id']);
                // redirect('penumpang');
                if($data['role_id'] == 1){
                    $this->uri->segment(1)=='penumpang';
                    redirect('penumpang');

                }else{
                    $this->uri->segment(1)=='admin';
                    redirect('admin');
                }
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                Password Salah 
              </div>');
              redirect('auth');
            }

        }else
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email Belum Terdaftar
          </div>');
            redirect('auth');

        // echo "<script>
        // Swal.fire('salah')
        // </script>";
        }
        
    }

    public function logout() {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }

}
