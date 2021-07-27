<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('reservasi');
        
    }

    public function index(){
        $data['title'] = "Home Page Admin";
        $data['user'] = $this->db->get_where('user' ,['email'=> $this->session->userdata('email')])->row_array();
        $data['pendapatan'] = $this->reservasi->pendapatan();
        $data['kota'] = $this->reservasi->banyakKotaTujuan();
        $data['pengguna'] = $this->reservasi->jumlahUser();
        $this->load->view('templete/header',$data);
        $this->load->view('templete/sidebar_admin');
        $this->load->view('templete/topbar', $data);
        $this->load->view('admin/admin', $data);
        $this->load->view('templete/footer');
    }

    public function kotaTujuan(){
        $data['title'] = "Kota Tujuan";
        $data['user'] = $this->db->get_where('user' ,['email'=> $this->session->userdata('email')])->row_array();
        $data['kota'] = $this->db->query("SELECT*FROM kota_tujuan");
        $this->load->view('templete/header',$data);
        $this->load->view('templete/sidebar_admin');
        $this->load->view('templete/topbar', $data);
        $this->load->view('admin/kota_tujuan',$data);
        $this->load->view('templete/footer');
    }

    public function reservasi(){
        $data['title'] = "Reservasi";
        $data['user'] = $this->db->get_where('user' ,['email'=> $this->session->userdata('email')])->row_array();
        $data['reservasi'] = $this->reservasi->allreservasi();
        $this->load->view('templete/header',$data);
        $this->load->view('templete/sidebar_admin');
        $this->load->view('templete/topbar', $data);
        $this->load->view('admin/reservasi');
        $this->load->view('templete/footer');
    }

    public function pembayaran(){
        $data['title'] = "Pembayaran";
        $data['user'] = $this->db->get_where('user' ,['email'=> $this->session->userdata('email')])->row_array();
        $data['reservasi'] = $this->reservasi->allreservasi();
        $this->load->view('templete/header',$data);
        $this->load->view('templete/sidebar_admin');
        $this->load->view('templete/topbar', $data);
        $this->load->view('admin/pembayaran');
        $this->load->view('templete/footer');
    }
}