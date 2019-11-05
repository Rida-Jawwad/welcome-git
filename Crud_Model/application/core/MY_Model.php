<?php
class MY_Model extends CI_Model{
    public $table_name;
    function retrievingData($id = ""){
        if(empty($id)){
            $getQuery = $this->db->get($this->table_name);
            $result = $getQuery->result();
            if($getQuery){
                return $result;
            }
            else{
                return $this->db->error();
            }
        }
        else{
            $where = ['id' => $id];
            $getQuery = $this->db->get($this->table_name,$where);
            $result = $getQuery->result();
            if($getQuery){
                return $result;
            }
            else{
                return $this->db->error();
            }
        }
    }

    function insertion(array $data){
        $insertQuery = $this->db->insert($this->table_name,$data);
        if($insertQuery){
            return "Record Inserted";
        }
        else{
            return $this->db->error();
        }
    }

    function updating(array $data, int $id){
        if(!empty($data) && !empty($id)){
            $where = ['id'=> $id];
            $updatingQuery = $this->db->update($this->table_name, $data, $where);
            if($updatingQuery){
                return "Record Updated";
            }
            else{
                return $this->db->error();
            }
        }
    }

    function delete(int $id){
        $where = ['id'=> $id];
        $deletingQuery = $this->db->delete($this->table_name,$where);
        if($deletingQuery){
            return "Record Deleted";
        }
        else{
            return $this->db->error();
        }
    }
}