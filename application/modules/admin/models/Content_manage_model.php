<?php

Class Content_manage_model extends CI_Model {

    function __construct() {
         parent::__construct();
        $this->load->database();
    }

    function getVendorList($id = null) {
   
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('type_id','1');
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return false;
            }
            return false;
       
    }

    function getVendorCategory(){

            $this->db->select('*');
            $query = $this->db->get('vendor_category');
            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return false;
            }
            return false;   
    }

    function getVendorAttributes(){

            $this->db->select('*');
            $query = $this->db->get('vendor_category_attributes');
            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return false;
            }
            return false;      
    }
    function getWedding_itemList(){
        $this->db->select('*');
        $query = $this->db->get('wedding_marketplace_items');
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;
        }
        
        return true;
    }
    function get_allAttributeList(){
        $this->db->select('*');
        $query = $this->db->get('vendor_category_attributes');
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;
        }
        return true;
    }
    function get_vendor_category(){
         $this->db->select('*');
        $query = $this->db->get('vendor_category');
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;
        }
        return true;
    }

    function insert_data($data,$table){

    $this->db->insert($table, $data);
   $insert_id = $this->db->insert_id();

   return  $insert_id;
    }

    function get_valueByid($id,$fields,$table){
        $this->db->select('*');
        $this->db->where($fields,$id);
        $query = $this->db->get($table);
        if($query->num_rows()>0){
        return $query->row_array();
        }else{
        return false;
        }
        return true; 
    }

    function getAllValueByid($id,$fields,$table){
        $this->db->select('*');
        $this->db->where($fields,$id);
        $query = $this->db->get($table);
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;  
        }   
        return true;    
    }
    function getAttributedetails($id,$fields,$table){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join('vendor_category_attributes', 'vendor_attribute_value.vendor_cat_attribute_id = vendor_category_attributes.id');
        $this->db->where($fields,$id);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;  
        }   
        return true;  
    }
    function checkAdminLogin($username,$password){
        $this->db->select('*');
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $query = $this->db->get('admin_login');
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;  
        }   
        return true;    
    }


    function getAllValues($table,$status,$order_by){

        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($status,'1');
        if($order_by!=""){

        $this->db->order_by($order_by,'asc');
        }
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return fasle;
        }
        return true;
    }

    function updateVendorInfo($data,$id,$table){

//    extract($data);
    $this->db->where('id', $id);
    $this->db->update($table,$data);
    return true;
    }


  }

?>