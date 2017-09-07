<?php

Class Product_manage_model extends CI_Model {

    function __construct() {
         parent::__construct();
        $this->load->database();
    }


        function getProductAttributes(){

            $this->db->select('*');
            $query = $this->db->get('product_attribute');
            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return false;
            }
            return false;   
    }

    function get_Allvalues($table){
            $this->db->select('*');
            $query = $this->db->get($table);
            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return false;
            }
            return false;   
    }
    function getProductCategory(){

    		$this->db->select('*');
            $query = $this->db->get('product_category');
            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return false;
            }
            return false;  	
    }
    function get_product_category(){
    	  $this->db->select('*');
            $query = $this->db->get('product_category');
            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return false;
            }
            return false;   
    }

    function getValuesByid($id){
    	$this->db->select('*');
		$this->db->from('product_attribute a'); 
		$this->db->join('product_attribute_values b', 'b.category_id=a.category_id');
	    $this->db->where('a.category_id',$id);
        //$this->db->group_by('a.attribute_name');
        $query = $this->db->get();
        if($query->num_rows()>0){
        return $query->result_array();
        }else{
        return false;
        }
        return true; 
    }
    function get_attributeByid($id,$field,$table){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field,$id);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result_array();
            }else{
                return false;
            }
            return true;
        }

    function getAll_attributeByid($cat_id,$attr_id){
        $this->db->select('*');
        $this->db->from('product_attribute_values');
        $this->db->where('category_id',$cat_id);
        $this->db->where('attribute_id',$attr_id);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result_array();
            }else{
                return false;
            }
            return true;
    }   

    function get_producDetailByid($id){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('id',$id);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->row_array();
        }else{
            return false;
        }
        return true;
    }

    function getAllattributeDetails($id){
        $this->db->select('*');
        $this->db->from('product_attribute_values');
        $this->db->where('id',$id);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->row_array();
        }else{
            return false;
        }
        return true;
    }

    function getdetailsByid($id,$table){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id',$id);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->row_array();
        }else{
            return false;
        }
        return true;
    }

    function deleteProductByid($id,$table){
    $this->db->where('id', $id);
    $this->db->delete($table);
    }

    function update_productImage($id,$data,$table){
     $this->db->where('token', $id);
    $this->db->update($table,$data);
    return true;
    }
}
?>