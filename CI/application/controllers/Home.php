<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends My_Controller{
    function index(){
        $this->load->view('Home');
    }
}  