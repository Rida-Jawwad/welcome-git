<?php

class User_Model extends MY_Model{
    public function fetch_data(){
        $query = $this->db->query("Select id,name,email,phone_number from useraccounts");
        return $query;
    }
}