<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(dirname(__FILE__).'/Base.php');
class Peta extends Base
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('general');
        $this->load->library('session');
        $this->load->model('wilayah_model');
        $this->load->model('pelayanan_model');
        $this->session->set_userdata('menu-active','menu-4');
    }

    public function index()
    {
        $data = [];
        $data['kecamatan'] = $this->wilayah_model->getKecamatan();
        $this->load->templated_view('peta/index', $data);
    }

}
