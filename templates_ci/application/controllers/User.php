<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class User extends MY_Controller{
        public function index(){
            $this->load->model('User_Model');
            $data['fetch_data'] = $this->User_Model->fetch_data();
            $data['view'] = 'User';
            $this->load->view('layout',$data);
        }
    }

?>