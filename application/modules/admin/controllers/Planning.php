<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Planning extends MY_Controller {

function __construct() {
        parent::__construct();

        $this->load->library('pagination');
        $this->load->model('Frontend_model');
    }

  public function index()
   {   
    
	 }
   public function budget_calculator(){


      $this->site_data['main_page'] = 'front/welcome_budget';
      $this->load->view('main_template', $this->site_data);  
   }
   public function checklist(){

      $this->site_data['main_page'] = 'front/welcome_checklist';
      $this->load->view('main_template', $this->site_data);  
   }

   public function guestlist_manager(){

      $this->site_data['main_page'] = 'front/welcome_guestlist';
      $this->load->view('main_template', $this->site_data);  
   }

   public function checklist_task(){

      $check_val_id = $this->input->post('id');
      $user_id = $this->input->post('user_id');
      print_r($this->input->post());  
      $data = array(
        'check_value_id'=>isset($check_val_id)?$check_val_id:"",
        'user_id'=>isset($user_id)?$user_id:"",
        'is_done'=>'1'
        );

      $check_insert_id = $this->Frontend_model->insert_data($data,'checklist_task');
   }


}

?>