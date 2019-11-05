<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_info extends My_Controller{
    
    function index($id){
        $this->load->model('User_Model');
        $this->User_Model->table_name = 'useraccounts';
        $result = $this->User_Model->retrievingData($id = "");

        $data['view'] = 'data_listing';

        $data['result'] = $result;
        $this->load->view('layout',$data);
    }

    function insertFunction(){
        $this->load->model('User_Model');
        $this->User_Model->table_name = 'useraccounts';

        $arrayToInsert = [
            'name'=>'Farwa',
            'email'=>'farwa@gmail.com',
            'password' => '1234',
            'phone_number'=>'123456789'
        ];

        $result = $this->User_Model->insertion($arrayToInsert);

        $data['view'] = 'insert';
        $data['result'] = $result;
        $this->load->view('layout',$data);
    }

    function updateFunction($id){
        $this->load->model('User_Model');
        $this->User_Model->table_name = 'useraccounts';

        $arrayToEdit = [
            'name'=>'Muhammad',
            'email'=>'mohd@gmail.com',
            'password' => '12345',
            'phone_number'=>'1234567890'
        ];
        $result = $this->User_Model->updating($arrayToEdit,$id);

        $data['view'] = 'update';
        $data['result'] = $result;
        $this->load->view('layout',$data);
    }

    function deleteFunction($id){
        $this->load->model('User_Model');
        $this->User_Model->table_name = 'useraccounts';

        $result = $this->User_Model->delete($id);

        $data['view'] = 'delete';
        $data['result'] = $result;
        $this->load->view('layout',$data);
    }
}