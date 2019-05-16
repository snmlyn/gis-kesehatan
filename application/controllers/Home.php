<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('general');
        $this->load->helper('form');
        $this->load->model('wilayah_model');
        $this->load->model('pelayanan_model');
    }

    public function index()
    {
        $data = [];
        $data['sarana'] = $this->wilayah_model->getJenisLayanan();
        $data['sarana_count'] = $this->wilayah_model->getJenisLayananCount();
        $data['comments'] = $this->wilayah_model->getComments();
        $r = [];
        foreach($data['sarana'] as $d){
            $r[$d->nama_layanan] = ['name'=>$d->nama_layanan,'icon'=>base_url().'/public/assets/img/icons/'.$d->icon.'.png'];
        }
        $data['icons'] = json_encode($r);
        $data['kecamatan'] = $this->wilayah_model->getKecamatan();
        $this->load->home_templated_view('home/peta',$data);
    }

    public function peta()
    {
        redirect(base_url());
    }

    public function about()
    {
        $this->load->home_templated_view('home/about');
    }

    public function help()
    {
        $this->load->home_templated_view('home/help');
    }

    public function layanan_data(){
        $kecamatan = ($this->input->get('kecamatan') && $this->input->get('kecamatan') != '')?$this->input->get('kecamatan'):1;
        $layanan = ($this->input->get('layanan') && $this->input->get('layanan') != '')?$this->input->get('layanan'):'all';
        $dt = $this->wilayah_model->getPelayanByKecamatanLayanan($kecamatan,$layanan);
        if(!empty($dt)){
            foreach($dt as $row){
                $array [] = array(
                    $row->kelurahan,
                    $row->jenis.'-'.$row->pelayanan,
                    $row->keterangan,
                );
            }
        }
        $data = array('data'=>$array);
        echo json_encode($data);
    }

    public function filter_kelurahan(){
        $kecamatan = $this->input->post('kecamatan');
        $kels = $this->wilayah_model->getKelurahanByKecamatan($kecamatan);
        $options ='<option value="">Pilih Kelurahan</option>';
        if(!empty($kels)){
            $options .='<option value="all">PILIH SEMUA</option>';
            foreach($kels as $row){
                $options .='<option value="'.$row->kelurahan_id.'" data-x="'.$row->koordinat_x.'" data-y="'.$row->koordinat_y.'">'.$row->nama_kelurahan.'</option>';
            }

        }
        echo $options;
    }

    public function filter_distribusi(){
        $kecamatan = $this->input->post('kecamatan');
        $kelurahan = $this->input->post('kelurahan');
        if($kelurahan == 'all')
            $layanans = $this->wilayah_model->getPelayanByKecamatan($kecamatan);
            else
            $layanans = $this->wilayah_model->getPelayanByKelurahan($kelurahan);
        $json = [];
        if(!empty($layanans)){
            foreach($layanans as $d){
                $json[] =  [$d->jenis,$d->x,$d->y, preg_replace("/[^A-Za-z0-9?!]/"," ",$d->keterangan),$d->id,$d->icon,$d->nama_kelurahan,$d->pelayanan,$d->image];
            }
        }
        echo json_encode($json);
    }

    public function filter_distribusi_bylayanan(){
        $kecamatan = $this->input->post('kecamatan');
        $kelurahan = $this->input->post('kelurahan');
        $layanan = $this->input->post('layanan');
        if($kelurahan == 'all')
            $layanans = $this->wilayah_model->getPelayanByKecamatanJenisLayanan($kecamatan,$layanan);
            else
            $layanans = $this->wilayah_model->getPelayanByKelurahanJenisLayanan($kelurahan,$layanan);
        $json = [];
        if(!empty($layanans)){
            foreach($layanans as $d){
                $json[] =  [$d->jenis,$d->x,$d->y, preg_replace("/[^A-Za-z0-9?!]/"," ",$d->keterangan),$d->id,$d->icon,$d->nama_kelurahan,$d->pelayanan,$d->image];
            }
        }
        echo json_encode($json);
    }

    public function filter_distribusi_byunitlayanan(){
        $kecamatan = $this->input->post('kecamatan');
        $kelurahan = $this->input->post('kelurahan');
        $unitlayanan = $this->input->post('unitlayanan');
        if($kelurahan == 'all')
            $layanans = $this->wilayah_model->getPelayanByKecamatanUnitLayanan($kecamatan,$unitlayanan);
            else
            $layanans = $this->wilayah_model->getPelayanByKelurahanUnitLayanan($kelurahan,$unitlayanan);
        $json = [];
        if(!empty($layanans)){
            foreach($layanans as $d){
                $json[] =  [$d->jenis,$d->x,$d->y, preg_replace("/[^A-Za-z0-9?!]/"," ",$d->keterangan),$d->id,$d->icon,$d->nama_kelurahan,$d->pelayanan,$d->image];
            }
        }
        echo json_encode($json);
    }

    public function search_distribusi(){
        $keyword = $this->input->post('phrase');
        $layanans = $this->wilayah_model->getPelayanByKeyword($keyword);
        $json = [];
        if(!empty($layanans)){
            foreach($layanans as $d){
                $json[] =  ['name'=>$d->pelayanan.' '.$d->jenis,'id'=>$d->id];
            }
        }
        echo json_encode($json);
    }

    public function distribusi(){
        $id = $this->input->post('id');
        $layanans = $this->wilayah_model->getPelayanById($id);
        $json = [];
        if(!empty($layanans)){
            foreach($layanans as $d){
                $json[] =  [$d->jenis,$d->x,$d->y, preg_replace("/[^A-Za-z0-9?!]/"," ",$d->keterangan),$d->id,$d->icon,$d->nama_kelurahan,$d->pelayanan,$d->image];
            }
        }
        echo json_encode($json);
    }

    public function add_comment(){
        $comment = $this->input->post('comment');    
        $username = $this->input->post('username');  
        if($comment != ''){      
            list($status,$message) = $this->wilayah_model->addComment($username,$comment);
        }        
        echo json_encode(array('status'=>$status,'message'=>$message));
    }

}