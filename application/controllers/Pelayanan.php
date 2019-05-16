<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(dirname(__FILE__).'/Base.php');
class Pelayanan extends Base
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('general');
        $this->load->library('session');
        $this->load->model('pelayanan_model');
        $this->load->model('wilayah_model');
        $this->session->set_userdata('menu-active','menu-3');
    }

    public function index()
    {
        $data = [];
        $data['data'] = $this->pelayanan_model->getPelayanan();
        $data['sarana'] = $this->wilayah_model->getJenisLayanan();
        $data['kecamatan'] = $this->wilayah_model->getKecamatan();
        $this->load->templated_view('pelayanan/index', $data);
    }

    public function save(){
        $kel = $this->input->post('kel');
        $jenis = $this->input->post('jenis');
        $nama = $this->input->post('nama');
        $x = $this->input->post('x');
        $y = $this->input->post('y');
        $ket  = $this->input->post('ket');
        $dis_id = ($this->input->post('dis_id'))?$this->input->post('dis_id'):'';
        if($dis_id != ''){
       list($status,$message) = $this->pelayanan_model->editPelayanan($dis_id,$kel,$jenis,$nama,$x,$y,$ket);
        }else {
        list($status,$message) = $this->pelayanan_model->savePelayanan($kel,$jenis,$nama,$x,$y,$ket);
        }
        echo json_encode(array('status'=>$status,'message'=>$message));
    }

    public function delete(){
        $id = $this->input->post('id');
        list($status,$message) = $this->pelayanan_model->deletePelayanan($id);
        echo json_encode(array('status'=>$status,'message'=>$message));
    }

     public function deleteImage($id){        
        list($status,$message) = $this->pelayanan_model->deleteImage($id);
            if($status){               
                $this->session->set_flashdata('msg', 'success'); 
            }
            else {
                $this->session->set_flashdata('msg', $message); 
            }
                       
        redirect('pelayanan','refresh');   
    }

    public function upload($id){
        if($_FILES){
            $config['upload_path'] = 'public/uploads/layanan';
            $config['allowed_types'] = '*';
            $config['max_filename'] = '255';
            $config['encrypt_name'] = FALSE;
            $config['max_size'] = '5024'; //3 MB
            $new_name =  str_replace(' ', '_', $_FILES['file']['name']);
            $new_name =  str_replace('&','_', $new_name);            
            $msg = '';            
            if (isset($_FILES['file']['name'])) {
               // die("2");
               // print_r($config);die;
                if (0 < $_FILES['file']['error']) {
                    $msg = 'Error during file upload' . $_FILES['file']['error'];
                } else {
                    //die("3");
                    if (file_exists('public/uploads/layanan/' .  $new_name)) {
                        $new_name =date('mdy').$new_name;
                    } 
                    $config['file_name'] = $new_name;
                     //chmod ($_SERVER[''], "0777");
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('file')) {
                            $msg = $this->upload->display_errors();
                        } else {
                            $msg = '';
                        }
                }
            } else {               
                $msg = 'Please choose a file';
            }

            if($msg == ''){
                $this->pelayanan_model->editImage($new_name,$id);
                $this->session->set_flashdata('msg', 'success'); 
            }
            else {
                $this->session->set_flashdata('msg', $msg); 
            }
                       
        }
       
        redirect('pelayanan','refresh');        
        
    }






}