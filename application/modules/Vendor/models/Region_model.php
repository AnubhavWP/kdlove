<?php

Class Region_model extends MY_Model {
     function __construct() {
        parent::__construct();
        $this->has_many['vendors'] = array('foreign_model'=>'Vendor_model','foreign_table'=>'vendor','foreign_key'=>'region','local_key'=>'id');
    }

    public $table = "region";
    public $primary_key = "id";
}