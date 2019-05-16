<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(dirname(__FILE__).'/Base.php');

class Welcome extends Base {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('setting_model');
    }

	public function index()
	{
        $data = [];
        $data['admin'] = $this->setting_model->getAdmin();
        $this->load->templated_view('welcome/index',$data);
	}
}
