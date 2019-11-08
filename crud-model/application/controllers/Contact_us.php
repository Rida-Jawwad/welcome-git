<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Contact_us extends MY_Controller{
        public function index(){
            $data['view'] = 'Contact_us';
            $this->load->view('layout',$data);
        }
    }

?>