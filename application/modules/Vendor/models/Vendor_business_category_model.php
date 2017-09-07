<?php

Class Vendor_business_category_model extends MY_Model {
     function __construct() {
        parent::__construct();
        $this->has_many['vendors'] = array('foreign_model'=>'Vendor_model','foreign_table'=>'vendor','foreign_key'=>'business_catgory','local_key'=>'id');
    }

    public $table = "vendor_category";
    public $primary_key = "id";
    
    function removeVendorBusinessCat($vendor_id){
        if(!empty($vendor_id)){
            $this->db->delete('requeste_vendor_business_category', array('vendor_id' => $vendor_id));
            return true;
        }
        
    }
}
