<?php

Class Frontend_model extends CI_Model {

    function __construct() {
         parent::__construct();
        $this->load->database();
    }

    function getVendorList($id = null) {
   
            $this->db->select('*');
            $query = $this->db->get('vendor_info');
            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return false;
            }
            return false;
       
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

 

    function get_loginUser($email,$password){
        $this->db->select('*');
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $query = $this->db->get('users');
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

    function is_UserExist($password){

         $this->db->select('*');
        $this->db->where('password',$password);
        $query = $this->db->get('users');
        if($query->num_rows()>0){
         return $query->row_array();
        }else{
         return false;
        }
         return true;        

    }

     function fetch_data($id,$fields,$table,$limit){
        $this->db->limit($limit);
        $this->db->where($fields, $id);
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
        $data[] = $row;
        }
        return $data;
        }
        return false;
    }
    function getAllValues($table,$order_by){
        $this->db->select('*');
        $this->db->from($table);
        if($order_by!=""){

        $this->db->order_by($order_by,'asc');
        }
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;  
        }   
        return true;   
    }

    function getpromotions(){
        $this->db->select('*');
        $this->db->from('promotion');
        $this->db->where('status','1');
        $this->db->order_by('position','asc');
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;  
        }   
        return true;   

    }

    function getreommendation(){
        $this->db->select('*');
        $this->db->from('recommendation');
        $this->db->where('status','1');
        $this->db->order_by('position','asc');
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;  
        }   
        return true;   

    }
    function get_categoryBysubmenu($id){
        $this->db->select('*');
        $this->db->from('sub_menu_category');
        $this->db->join('magzine_category', 'magzine_category.id = sub_menu_category.cat_id');
        $this->db->where('sub_menu_category.status','1');
        $this->db->where('sub_menu_category.sub_menu_id',$id);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;  
        }   
        return true;  
    }
    function get_vendorCategoryBysubmenu($id){
        $this->db->select('*');
        $this->db->from('sub_menu_category');
        $this->db->join('vendor_category', 'vendor_category.id = sub_menu_category.cat_id');
        $this->db->where('sub_menu_category.status','1');
        $this->db->where('sub_menu_category.sub_menu_id',$id);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;  
        }   
        return true;  
    }

    // Count all record of table "contact_info" in database.
    function record_count($field,$id) {

        $this->db->where($field,$id);

        $this->db->from("wedding_marketplace_items");
        return $this->db->count_all_results();
    }

    function get_userConfirm($id,$data){
    
    $this->db->where('id',$id); //which row want to upgrade  
    if( $this->db->update('users',$data))
     {
        return true;
      }
      else
      {
        return false;
      }
    }


    function update_userProfile($id,$data){
    
    $this->db->where('id',$id); //which row want to upgrade  
    if( $this->db->update('users',$data))
     {
        return true;
      }
      else
      {
        return false;
      }
    }

    

    function update_weddingDetails($id,$data){
    
    $this->db->where('user_id',$id); //which row want to upgrade  
    if( $this->db->update('wedding_details',$data))
     {
        return true;
      }
      else
      {
        return false;
      }
    }

function updateData($id,$table,$data){
    
    $this->db->where('id',$id); //which row want to upgrade  
    if( $this->db->update($table,$data))
     {
        return true;
      }
      else
      {
        return false;
      }
    }


function update_note($id,$table,$data){
    
    $this->db->where('checklist_id',$id); //which row want to upgrade  
    if( $this->db->update($table,$data))
     {
        return true;
      }
      else
      {
        return false;
      }
    }


    function update_email($pass,$email,$data){

     $this->db->where('password',$pass); //which row want to upgrade  
     $this->db->where('email',$email); //which row want to upgrade  
    if( $this->db->update('users',$data))
     {
        return true;
      }
      else
      {
        return false;
      } 
    }

    function update_password($id,$update_password){

     $this->db->where('id',$id); //which row want to upgrade  
     if( $this->db->update('users',$update_password))
     {
        return true;
      }
      else
      {
        return false;
      }

    }

    function update_image($id,$update_image){

     $this->db->where('id',$id); //which row want to upgrade  
     if( $this->db->update('users',$update_image))
     {
        return true;
      }
      else
      {
        return false;
      }

    }
    function get_checklist($cat_id){

        $this->db->select('*');
        $this->db->where('check_cat_id',$cat_id);
        $this->db->where('status','1');
        $query = $this->db->get('checklist_values');
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
         return false;  
        }   
          return true;       
    }

    function get_checklist_done($cat_id){

        $this->db->select('*');
        $this->db->from('checklist_values');
        $this->db->join('checklist_task','checklist_task.check_value_id=checklist_values.id');
        $this->db->where('checklist_values.check_cat_id',$cat_id);
        $this->db->where('checklist_task.is_done','1');
         $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
         return false;  
        }   
          return true;       

    }

    function get_vendorReviews(){
        $this->db->select('*');
        $this->db->from('vendor_review');
        $this->db->join('users','users.id = vendor_review.user_id');
        $this->db->where('users.type_id','2');
        $this->db->order_by('vendor_review.location');
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;
        }
        return true;
    }

  }

?>