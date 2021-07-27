<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penumpang extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('reservasi');
    }

    public function index(){
        $data['title'] = "Home Page";
        $data['user'] = $this->db->get_where('user' ,['email'=> $this->session->userdata('email')])->row_array();
        $this->load->view('templete/header',$data);
        $this->load->view('templete/sidebar');
        $this->load->view('templete/topbar', $data);
        $this->load->view('penumpang/penumpang');
        $this->load->view('templete/footer');

    }

    public function kotaTujuan(){
        $data['title'] = "Kota Tujuan";
        $data['user'] = $this->db->get_where('user' ,['email'=> $this->session->userdata('email')])->row_array();
        $data['kota'] = $this->db->query("SELECT*FROM kota_tujuan");
        $this->load->view('templete/header',$data);
        $this->load->view('templete/sidebar');
        $this->load->view('templete/topbar', $data);
        $this->load->view('penumpang/kota_tujuan',$data);
        $this->load->view('templete/footer');
    }

    public function reservasi(){
        $data['title'] = "Reservasi";
        $data['user'] = $this->db->get_where('user' ,['email'=> $this->session->userdata('email')])->row_array();
        $data['reservasi'] = $this->reservasi->getReservasi($this->session->userdata('id'));
        $this->load->view('templete/header',$data);
        $this->load->view('templete/sidebar');
        $this->load->view('templete/topbar', $data);
        $this->load->view('penumpang/reservasi');
        $this->load->view('templete/footer');
    }

    public function tambahReservasi(){
        $this->form_validation->set_rules('kota_tujuan', 'kotaTujuan','required');
        $this->form_validation->set_rules('jumlah_orang','Jumlah Orang','required');
        $this->form_validation->set_rules('alamat_penjemputan','Alamat Penjemputan','required');
        $this->form_validation->set_rules('tgl_berangkat','Tanggal berangkat','required');
        if($this->form_validation->run()){
            $this->reservasi->addReservasi();
            redirect('penumpang/reservasi');
        }
        $data['title'] = "New Reservasi";
        $data['user'] = $this->db->get_where('user' ,['email'=> $this->session->userdata('email')])->row_array();
        $data['kotaTujuan'] = $this->reservasi->getKotaTujuan();
        $this->load->view('templete/header',$data);
        $this->load->view('templete/sidebar');
        $this->load->view('templete/topbar', $data);
        $this->load->view('penumpang/add_Reservasi',$data);
        $this->load->view('templete/footer');
    } 

    public function cetak_invoice($id_reservasi){
        $data['title'] = "Cetak Invoice";
        $data['invoice'] = $this->reservasi->getTagihan($id_reservasi);
        $this->load->view('templete/header',$data);
        $this->load->view('penumpang/print_tagihan');
    }

    public function pembayaran(){
        $data['title'] = "Pembayaran";
        $data['user'] = $this->db->get_where('user' ,['email'=> $this->session->userdata('email')])->row_array();
        $data['reservasi'] = $this->reservasi->getReservasi($this->session->userdata('id'));
        $this->load->view('templete/header',$data);
        $this->load->view('templete/sidebar');
        $this->load->view('templete/topbar', $data);
        $this->load->view('penumpang/pembayaran');
        $this->load->view('templete/footer');
    }

    public function addPembayaran($id){
        $this->form_validation->set_rules('id_reservasi', 'Id Reservasi','required');
        $this->form_validation->set_rules('image', 'Image','required');
        if($this->form_validation->run()){
            $this->reservasi->addPembayaran();
            redirect('penumpang/pembayaran');
        }
        $data['title'] = 'Bayar Tagihan';
        $data['user'] = $this->db->get_where('user' ,['email'=> $this->session->userdata('email')])->row_array();
        $data['invoice'] = $this->reservasi->getTagihan($id);
        $this->load->view('templete/header',$data);
        $this->load->view('templete/sidebar');
        $this->load->view('templete/topbar', $data);
        $this->load->view('penumpang/add_Pembayaran');
        $this->load->view('templete/footer');
        
    }  

}