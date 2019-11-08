<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends My_Controller{
    
    function index(){
        $this->load->model('User_Model');
        $this->User_Model->table_name = 'products';
        $result = $this->User_Model->retrievingData($id = "");

        $data['view'] = 'products';

        $data['result'] = $result;
        $this->load->view('layout',$data);
    }

    function insertFunction(){
        $this->load->model('User_Model');
        $this->User_Model->table_name = 'products';

        $arrayToInsert = [
            'product_name'=>'Blanket',
            'price'=>10000,
            'color' => 'red',
        ];

        $result = $this->User_Model->insertion($arrayToInsert);

        $data['view'] = 'insert';
        $data['result'] = $result;
        $this->load->view('layout',$data);
    }

    function updateFunction($id){
        $this->load->model('User_Model');
        $this->User_Model->table_name = 'products';

        $arrayToEdit = [
            'product_name'=>'Bedsheet',
            'price'=>1000,
            'color' => 'pink',
        ];
        $result = $this->User_Model->updating($arrayToEdit,$id);

        $data['view'] = 'update';
        $data['result'] = $result;
        $this->load->view('layout',$data);
    }

    function deleteFunction($id){
        $this->load->model('User_Model');
        $this->User_Model->table_name = 'products';

        $result = $this->User_Model->delete($id);

        $data['view'] = 'delete';
        $data['result'] = $result;
        $this->load->view('layout',$data);
    }
}