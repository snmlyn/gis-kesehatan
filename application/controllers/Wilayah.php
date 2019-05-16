<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(dirname(__FILE__).'/Base.php');
class Wilayah extends Base
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('general');
        $this->load->library('session');
        $this->load->model('wilayah_model');
        $this->session->set_userdata('menu-active','menu-2');
    }

    public function kecamatan()
    {
        $this->output->enable_profiler(TRUE);
        $data = [];
        $data['kecamatan'] = $this->wilayah_model->getKecamatan();
        $this->load->templated_view('wilayah/kecamatan_list', $data);
    }


    public function kecamatan_data()
    {
        $array = [];
        $dt = $this->wilayah_model->getKecamatan();
        if(!empty($dt)){
            foreach($dt as $row){
                $array [] = array(
                    $row->kecamatan_id,
                    $row->kode_kecamatan,
                    $row->nama_kecamatan,
                    $row->kecamatan_id,
                );
            }
        }
        $data = array('data'=>$array);
        echo json_encode($data);
    }

    public function kecamatan_detail()
    {
        $array = [];
        $id_kec = $this->input->post('id_kec');
        if($id_kec){
            $dt = $this->wilayah_model->getKecamatanById($id_kec);
            if(!empty($dt)){
                $array [] = array(
                    'id_kab'=>$dt[0]->ID_KAB,
                    'kabupaten'=>$dt[0]->NAMA_KABUPATEN,
                    'id_kec'=>$dt[0]->ID_KEC,
                    'kecamatan'=>$dt[0]->NAMA_KECAMATAN,
                    'kodepos'=>$dt[0]->KODEPOS,
                    'keterangan'=>$dt[0]->KET,
                );
            }
            $data = array('data'=>$array);
        }
        else {
            $data=array('data'=>[]);
        }
        echo json_encode($data);
    }

    public function filter_kecamatan(){
        $kabupaten = $this->input->post('kabupaten');
        $kecs = $this->wilayah_model->getKecamatan($kabupaten);
        $options = '';
        if(!empty($kecs)){
            foreach($kecs as $row){
                $options .='<li><a href="#" class="select-kecamatan" id="'.$row->ID_KEC.'" label="'.$row->NAMA_KECAMATAN.'">'.$row->NAMA_KECAMATAN.'</a></li>';
            }
        }
        echo $options;
    }

    public function filter_kecamatan_modal(){
        $kabupaten = $this->input->post('kabupaten');
        $kecs = $this->wilayah_model->getKecamatan($kabupaten);
        $options ='<option value="">PILIH KECAMATAN</option>';
        if(!empty($kecs)){
            foreach($kecs as $row){
                $options .='<option value="'.$row->ID_KEC.'">'.$row->NAMA_KECAMATAN.'</option>';
            }
        }
        echo $options;
    }

    public function kecamatan_add(){
        $id_kab = trim($this->input->post('id_kab'));
        $id_kec = trim($this->input->post('id_kec'));
        $kecamatan = trim($this->input->post('kecamatan'));
        $kodepos = trim($this->input->post('kodepos'));
        $keterangan = trim($this->input->post('keterangan'));
        list($status,$message) = $this->wilayah_model->addKecamatan($id_kab,$id_kec,$kecamatan,$kodepos,$keterangan);
        echo json_encode(array('status'=>$status,'message'=>$message));
    }

    public function kecamatan_delete(){
        $id_kec = $this->input->post('id_kec');
        $status = $this->wilayah_model->deleteKecamatan($id_kec);
        echo $status;
    }

    public function kecamatan_edit(){
        $id_kab = trim($this->input->post('id_kab'));
        $id_kec = trim($this->input->post('id_kec'));
        $kecamatan = trim($this->input->post('kecamatan'));
        $kodepos = trim($this->input->post('kodepos'));
        $keterangan = trim($this->input->post('keterangan'));
        list($status,$message) = $this->wilayah_model->editKecamatan($id_kab,$id_kec,$kecamatan,$kodepos,$keterangan);
        echo json_encode(array('status'=>$status,'message'=>$message));
    }

    public function kelurahan()
    {
        $data = [];
        $data['kecamatan'] = $this->wilayah_model->getKecamatan();
        $this->load->templated_view('wilayah/kelurahan_list', $data);
    }

    public function kelurahan_data()
    {
        $array = [];
        $kecamatan = $this->input->post('kecamatan');
        if($kecamatan){
            $dt = $this->wilayah_model->getKelurahanByKecamatan($kecamatan);
            if(!empty($dt)){
                foreach($dt as $row){
                    $array [] = array(
                        $row->kelurahan_id,
                        $row->nama_kelurahan,
                        $row->kecamatan_id,
                    );
                }
            }
            $data = array('data'=>$array);
        }
        else {
            $data=array('data'=>[]);
        }
        echo json_encode($data);
    }

    public function kelurahan_add(){
        $id_kec = trim($this->input->post('id_kec'));
        $kelurahan = trim($this->input->post('kelurahan'));
        list($status,$message) = $this->wilayah_model->addKelurahan($id_kec,$kelurahan);
        echo json_encode(array('status'=>$status,'message'=>$message));
    }

    public function kelurahan_delete(){
        $id_kel = $this->input->post('id_kel');
        $status = $this->wilayah_model->deleteKelurahan($id_kel);
        echo $status;
    }

    public function kelurahan_detail()
    {
        $array = [];
        $id_kel = $this->input->post('id_kel');
        if($id_kel){
            $dt = $this->wilayah_model->getKelurahanById($id_kel);
            if(!empty($dt)){
                $array [] = array(
                    'kelurahan_id'=>$dt[0]->kelurahan_id,
                    'kelurahan'=>$dt[0]->nama_kelurahan,
                    ''
                );
            }
            $data = array('data'=>$array);
        }
        else {
            $data=array('data'=>[]);
        }
        echo json_encode($data);
    }

    public function kelurahan_edit(){
        $id_kec = trim($this->input->post('id_kec'));
        $id_kel = trim($this->input->post('id_kel'));
        $kelurahan = trim($this->input->post('kelurahan'));
        list($status,$message) = $this->wilayah_model->editKelurahan($id_kec,$id_kel,$kelurahan);
        echo json_encode(array('status'=>$status,'message'=>$message));
    }

    public function filter_kelurahan(){
        $kecamatan = $this->input->post('kecamatan');
        $kels = $this->wilayah_model->getKelurahanByKecamatan($kecamatan);
        $options ='<option value="">Pilih Kelurahan</option>';
        if(!empty($kels)){
            foreach($kels as $row){
                $options .='<option value="'.$row->kelurahan_id.'" data-x="'.$row->koordinat_x.'" data-y="'.$row->koordinat_y.'">'.$row->nama_kelurahan.'</option>';
            }
        }
        echo $options;
    }

    public function filter_distribusi(){
        $kelurahan = $this->input->post('kelurahan');
        $layanans = $this->wilayah_model->getPelayanByKelurahan($kelurahan);
        $options ='<option value="">Pilih Layanan</option>';
        if(!empty($layanans)){
            foreach($layanans as $row){
                $options .='<option value="'.$row->id.'">'.$row->jenis.' - '.$row->pelayanan.' - ('.$row->x.','.$row->y.')</option>';
            }
        }
        echo $options;
    }

    public function save_koordinat(){
        $id = $this->input->post('distribusi');
        $lat = $this->input->post('lat');
        $long = $this->input->post('long');
        list($status,$message) = $this->wilayah_model->saveKoordinat($id,$lat,$long);
        echo json_encode(array('status'=>$status,'message'=>$message));

    }


}
