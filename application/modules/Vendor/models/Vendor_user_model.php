<?php
Class Vendor_user_model extends MY_Model {
     function __construct() {
        parent::__construct();
        $this->has_one['vendor'] = array('foreign_model'=>'Vendor_model','foreign_table'=>'vendor','foreign_key'=>'id','local_key'=>'vendor_id');
    }

    public $table = "vendor_users";
    public $primary_key = "id";
}