<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(dirname(__FILE__).'/Base.php');

class Setting extends Base
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('general');
        $this->load->library('session');
        $this->load->model('setting_model');
        $this->session->set_userdata('menu-active','menu-1');
    }

    public function bagian()
    {
        $this->load->templated_view('setting/bagian_list');
    }

    public function bagian_data()
    {
        $dt = $this->setting_model->getBagian();
        if(!empty($dt)){
            foreach($dt as $row){
                $array [] = array(
                    $row->URUT,
                    $row->BAGIAN,
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

    public function bagian_add(){
        $urut = trim($this->input->post('urut'));
        $bagian = trim($this->input->post('bagian'));
        list($status,$message) = $this->setting_model->addBagian($urut,$bagian);
        echo json_encode(array('status'=>$status,'message'=>$message));
    }

    public function bagian_edit(){
        $urut = trim($this->input->post('urut'));
        $bagian = trim($this->input->post('bagian'));
        $urut_old = trim($this->input->post('urut_old'));
        $bagian_old = trim($this->input->post('bagian_old'));
        list($status,$message) = $this->setting_model->editBagian($urut,$bagian,$urut_old,$bagian_old);
        echo json_encode(array('status'=>$status,'message'=>$message));
    }

    public function bagian_delete(){
        $urut = $this->input->post('urut');
        $bagian = $this->input->post('bagian');
        $status = $this->setting_model->deleteBagian($urut,$bagian);
        echo $status;
    }

    public function jabatan()
    {
        $data = [];
        $data['bagian'] = $this->setting_model->getBagian();
        $this->load->templated_view('setting/jabatan_list', $data);
    }

    public function jabatan_data()
    {
        if($this->input->post('bagian')){
            $bagian = trim($this->input->post('bagian'));
            $dt = $this->setting_model->getJabatan($bagian);
            if(!empty($dt)){
                foreach($dt as $row){
                    $array [] = array(
                        $row->URUT,
                        $row->JABATAN,
                        $row->BAGIAN,
                    );
                }
                $data = array('data'=>$array);
            }
            else {
                $data=array('data'=>[]);
            }
            echo json_encode($data);
        }
        else {
            $data=array('data'=>[]);
            echo json_encode($data);
        }

    }

    public function jabatan_add(){
        $bagian = trim($this->input->post('bagian'));
        $urut = trim($this->input->post('urut'));
        $jabatan = trim($this->input->post('jabatan'));
        list($status,$message) = $this->setting_model->addJabatan($bagian,$urut,$jabatan);
        echo json_encode(array('status'=>$status,'message'=>$message));
    }

    public function jabatan_edit(){
        $bagian = trim($this->input->post('bagian'));
        $urut = trim($this->input->post('urut'));
        $jabatan = trim($this->input->post('jabatan'));
        $urut_old = trim($this->input->post('urut_old'));
        $jabatan_old = trim($this->input->post('jabatan_old'));
        list($status,$message) = $this->setting_model->editJabatan($bagian,$urut,$jabatan,$urut_old,$jabatan_old);
        echo json_encode(array('status'=>$status,'message'=>$message));
    }

    public function jabatan_delete(){
        $urut = $this->input->post('urut');
        $bagian = $this->input->post('bagian');
        $jabatan = $this->input->post('jabatan');
        $status = $this->setting_model->deleteJabatan($urut,$bagian,$jabatan);
        echo $status;
    }

    public function profile()
    {
        $data = [];
        foreach(array('bagian','jabatan','level','regional','cabang') as $key){
            $data[$key] = $this->setting_model->getMaster($key);
        }
        $this->load->templated_view('setting/user_list', ['params'=>$data]);
    }

    public function profile_data()
    {
        $dt = $this->setting_model->getUsers();
        if(!empty($dt)){
            foreach($dt as $row){
                $array [] = array(
                    $row->UID,
                    $row->NAMA,
                    $row->LVL,
                    $row->BAGIAN,
                    $row->JABATAN,
                    $row->ADMINISTRATOR,
                    $row->SETTING,
                    $row->MIF_REGISTRASI,
                    $row->MIF,
                    $row->MIF_APPROVAL,
                    $row->MONITORING,
                    $row->REGULASI,
                    $row->IDREG,
                    $row->IDCAB,
                    $row->ST,
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

    public function profile_add(){
       $params =  array("username","password","fullname");
            $post = [];
            foreach($params as $key){
                if($key == 'password')
                $post[$key] = md5(trim($this->input->post($key)));
                    else
                $post[$key] = $this->input->post($key);
            }
            list($status,$message) = $this->setting_model->addUser($post);
            echo json_encode(array('status'=>$status,'message'=>$message));
    }

    public function profile_delete(){
         $uid = $this->input->post('id');
        if($uid == $this->session->userdata('id')){
            echo json_encode(array('status'=> false,'message'=> 'Tidak boleh delete data sendiri'));
            exit;
        }
        $status = $this->setting_model->deleteUser($uid);
        if($status){
             echo json_encode(array('status'=> true,'message'=> 'Delete data sukses'));
        }
        else {
             echo json_encode(array('status'=>false,'message'=> 'Delet data gagal'));
        }
    }

    public function profile_detail()
    {
        $params = explode(',','UID,NAMA,PASSWORD,LVL,BAGIAN,JABATAN,ADMINISTRATOR,SETTING,MIF_REGISTRASI,MIF,MIF_APPROVAL,MONITORING,REGULASI,IDREG,IDCAB,ST');
        $array = [];
        $uid = $this->input->post('uid');
        if($uid){
            $dt = $this->setting_model->getUserById($uid);
            if(!empty($dt)){
                foreach($params as $key){
                    $array[$key] = isset($dt[0]->{$key})?$dt[0]->{$key}:'';
                }
            }
            $data = array('data'=>$array);
        }
        else {
            $data=array('data'=>[]);
        }
        echo json_encode($data);
    }

     public function profile_edit(){
        $id = $this->input->post('id_admin');
        if($id != '' && $id > 0){
            $params =  array("username","id_admin","fullname");
            $post = [];
            foreach($params as $key){
                if($key == 'password')
                $post[$key] = md5(trim($this->input->post($key)));
                    else
                $post[$key] = $this->input->post($key);
            }
            list($status,$message) = $this->setting_model->editUser($post);
            echo json_encode(array('status'=>$status,'message'=>$message));
        }   
        else {
            echo json_encode(array('status'=>false,'message'=>'Data invalid'));
        }   
        
    }


    public function manage_log()
    {
        $this->session->set_userdata('menu-active','menu-2');
        $data = [];
        $data['users'] = $this->setting_model->getUsersForDdl();
        $data['data'] = $this->setting_model->getLogs();
        $this->load->templated_view('setting/log_list', $data);
    }

    public function upload_web(){
        if(isset($_FILES['file'])){
            $config['upload_path'] = 'public/uploads/web';
            $config['allowed_types'] = '*';
            $config['max_filename'] = '255';
            $config['encrypt_name'] = FALSE;
            $config['max_size'] = '3024'; //3 MB

            $msg = '';
            if (isset($_FILES['file']['name'])) {
                if (0 < $_FILES['file']['error']) {
                    $msg = 'Error during file upload' . $_FILES['file']['error'];
                } else {
                    if (file_exists('public/uploads/web/' .  $_FILES['file']['name'])) {
                        $msg = 'File already exists : ' . $_FILES['file']['name'];
                    } else {
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('file')) {
                            $msg = $this->upload->display_errors();
                        } else {
                            $msg = '';
                        }
                    }
                }
            } else {
                $msg = 'Please choose a file';
            }
            if($msg == ''){
                echo json_encode(['status'=>true,'message'=>"Sukses"]);
            }
            else {
                echo json_encode(['status'=>false,'message'=>$msg]);
            }
        }
        else {
            $this->load->templated_view('setting/upload_web');
        }
    }

    public function upload_mobile(){
        if(isset($_FILES['file'])){
            $config['upload_path'] = 'public/uploads/mobile';
            $config['allowed_types'] = '*';
            $config['max_filename'] = '255';
            $config['encrypt_name'] = FALSE;
            $config['max_size'] = '3024'; //3 MB

            $msg = '';
            if (isset($_FILES['file']['name'])) {
                if (0 < $_FILES['file']['error']) {
                    $msg = 'Error during file upload' . $_FILES['file']['error'];
                } else {
                    if (file_exists('public/uploads/mobile/' .  $_FILES['file']['name'])) {
                        $msg = 'File already exists : ' . $_FILES['file']['name'];
                    } else {
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('file')) {
                            $msg = $this->upload->display_errors();
                        } else {
                            $msg = '';
                        }
                    }
                }
            } else {
                $msg = 'Please choose a file';
            }
            if($msg == ''){
                echo json_encode(['status'=>true,'message'=>"Sukses"]);
            }
            else {
                echo json_encode(['status'=>false,'message'=>$msg]);
            }
        }
        else {
        $this->load->templated_view('setting/upload_mobile');
        }
    }


    public function profile_photo(){
        $this->load->templated_view('setting/upload_photo');
    }

    public function upload_photo(){
        if(isset($_FILES['file'])){
            $config['upload_path'] = 'public/uploads/profile';
            $config['allowed_types'] = 'jpg';
            $config['max_filename'] = '255';
            $config['encrypt_name'] = FALSE;
            $config['max_size'] = '5024'; //5 MB
            $config['overwrite']= TRUE;
            $config['file_name'] = $this->session->userdata('id');
            $msg = '';
            if (isset($_FILES['file']['name'])) {
                if (0 < $_FILES['file']['error']) {
                    $msg = 'Error during file upload' . $_FILES['file']['error'];
                } else {
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
                echo json_encode(['status'=>true,'message'=>"Sukses"]);
            }
            else {
                echo json_encode(['status'=>false,'message'=>$msg]);
            }
        }
        else {
            echo json_encode(['status'=>false,'message'=>'Gagal']);
        }
    }

    function admin(){
        $data = [];
        $data['admin'] = $this->setting_model->getAdmin();
        $this->load->templated_view('setting/admin_list',$data);
    }

}
