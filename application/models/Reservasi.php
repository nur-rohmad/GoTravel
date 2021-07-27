<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Reservasi extends CI_Model
{
    public function getReservasi($userId){
        $query = "select reservasi.id, reservasi.nama,reservasi.alamat_penjemputan,reservasi.jumlah_orang, 
        reservasi.tgl_berangkat, reservasi.uang_muka, reservasi.total_bayar,reservasi.status_pembayaran, kota_tujuan.name_kota 
        from reservasi join kota_tujuan on reservasi.id_kota_tujuan=kota_tujuan.id where reservasi.id_user=".$userId;
        return $this->db->query($query)->result_array();
    }

    public function allreservasi(){
        $query = "select status_pembayaran.*, reservasi.id, reservasi.nama,reservasi.alamat_penjemputan,reservasi.jumlah_orang, 
        reservasi.tgl_berangkat, reservasi.uang_muka, reservasi.total_bayar,reservasi.status_pembayaran, kota_tujuan.name_kota 
        from reservasi join kota_tujuan on reservasi.id_kota_tujuan=kota_tujuan.id join status_pembayaran 
        on reservasi.status_pembayaran=status_pembayaran.id_status";
        return $this->db->query($query)->result_array();
    }

    public function addReservasi()
    {
        $id_user = $this->session->userdata('id');
        $nama =     $this->session->userdata('nama');
        $kota_tujuan = $this->input->post('kota_tujuan',true);
        $jumlah_orang = $this->input->post('jumlah_orang', true);
        $alamat_penjemputan = $this->input->post('alamat_penjemputan', true);
        $tgl_berangkat = $this->input->post('tgl_berangkat');
        $totalBayar = $this->totalBayar();
        $uangMuka = 0.1*$totalBayar;
        $status = 0;
        $date_order = date('y-m-d');
        $data = [
            'id_user' => $id_user,
            'nama' => $nama,
            'id_kota_tujuan' => $kota_tujuan,
            'jumlah_orang' => $jumlah_orang,
            'alamat_penjemputan' => $alamat_penjemputan,
            'tgl_berangkat' => $tgl_berangkat,
            'total_bayar' => $totalBayar,
            'uang_muka' => $uangMuka,
            'status_pembayaran' => $status,
            'date_order' => $date_order
        ];
       return $this->db->insert('reservasi', $data);
    }

    public function totalBayar(){
        $id = $this->input->post('kota_tujuan');
        $harga = $this->getHarga($id);
        return $this->input->post('jumlah_orang')*$harga;
    }

    public function getHarga($id){
        
        $query="SELECT harga FROM kota_tujuan WHERE id=".$id;
        $harga = $this->db->query($query)->row_array();
        return ($harga['harga']);
    }

    public function getKotaTujuan(){
        $query = "select*from kota_tujuan";
        return $this->db->query($query)->result_array();
    }

    public function getTagihan($id){
        $query = "select reservasi.*, user.email, user.alamat, kota_tujuan.name_kota from reservasi join user  on reservasi.id_user=user.id join kota_tujuan on reservasi.id_kota_tujuan=kota_tujuan.id  where reservasi.id=".$id;
        return $this->db->query($query)->row_array();
    }

    public function getLastIDReservasi(){
        $query = "SELECT max(LAST_INSERT_ID(id)) FROM reservasi";
        return $this->db->query($query);
    }  

    public function addPembayaran(){
        $id_reservasi = $this->input->post('id_reservasi',true);
        $tanggal_bayar = date('y-m-d');
        $image = $this->_uploadImage();
        $data = [
            'id_reservasi' => $id_reservasi,
            'tgl_bayar' => $tanggal_bayar,
            'image'  => $image
        ];

        return $this->db->insert('pembayaran', $data);
        // $this->updateStatusPembayaran($id_reservasi);
    }

    public function _uploadImage(){
    $config['upload_path']          = './asset/img/upload/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['file_name']            = $this->id_reservasi;
    $config['overwrite']            = true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('image')) {
      return $this->upload->data("file_name");
    }
    // print_r($this->upload->display_errors());   
    return "default.jpg";
    }

    public function updateStatusPembayaran($id_reservasi){
            return $this->db->query("UPDATE reservasi set status_pembayaran=1 where id=".$id_reservasi);
    }

   public function pendapatan(){
       $query = "SELECT SUM(total_bayar) as  hasil, COUNT(id) as total from reservasi";
       return $this->db->query($query)->row_array();
   } 

   public function banyakKotaTujuan(){
       return $this->db->query("SELECT COUNT(id) as jumlah from kota_tujuan")->row_array();
   }

   public function jumlahUser(){
    return $this->db->query("SELECT COUNT(id) as user from user where role_id=1")->row_array(); 
   }
}